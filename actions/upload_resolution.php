<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 0); // don’t print HTML errors
ini_set('log_errors', 1);     // log errors to a file instead
ini_set('error_log', __DIR__ . '/error.log'); // error log path

require_once '../config/config.php';
require '../vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

function isTesseractInstalled()
{
    $output = null;
    $retval = null;
    exec('"C:\\Program Files\\Tesseract-OCR\\tesseract.exe" -v', $output, $retval);
    return $retval === 0;
}

function isPdftoppmInstalled()
{
    $output = null;
    $retval = null;
    exec('"C:\\Program Files\\poppler\\Library\\bin\\pdftoppm" -v', $output, $retval);
    return $retval === 0;
}

function convertPdfToImages($pdfPath, $outputDir)
{
    $outputPattern = $outputDir . '/page';
    $command = '"C:\\Program Files\\poppler\\Library\\bin\\pdftoppm" -png ' . escapeshellarg($pdfPath) . ' ' . escapeshellarg($outputPattern);
    exec($command);
}

function extractTextFromImage($imagePath)
{
    return (new TesseractOCR($imagePath))->executable('C:\\Program Files\\Tesseract-OCR\\tesseract.exe')->run();
}

function extractTextFromPdf($pdfPath, $pdftoimageUrls)
{
    $outputDir = '../uploads/temp_images';

    if (!file_exists($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    convertPdfToImages($pdfPath, $outputDir);
    $fullText = '';
    $files = glob($outputDir . '/*.png');
    foreach ($files as $file) {
        $pdftoimageUrls[] = $file; // Collect the URL of the generated image
        $fullText .= extractTextFromImage($file) . "\n";
    }
    array_map('unlink', glob("$outputDir/*.*"));
    return $fullText;
}

function parseResolutionText($text)
{
    $resolutionData = [
        'resolutionNo' => '',
        'title' => '',
        'whereasClauses' => '',
        'resolvingClauses' => '',
        'optionalClauses' => '',
        'approvalDetails' => ''
    ];

    if (preg_match('/Resolution No.(.+?)\n/', $text, $matches)) {
        $resolutionData['resolutionNo'] = trim($matches[0]);
    }

    if (preg_match('/A RESOLUTION(.+?)\n\n/s', $text, $matches)) {
        $resolutionData['title'] = trim($matches[0]);
    }

    if (preg_match('/WHEREAS(.+?)RESOLVED/s', $text, $matches)) {
        $resolutionData['whereasClauses'] = trim($matches[0]);
    }

    if (preg_match('/RESOLVED(.+?)(?:UNANIMOUSLY|APPROVED)/s', $text, $matches)) {
        $resolutionData['resolvingClauses'] = trim($matches[0]);
    }

    if (preg_match('/APPROVED(.+?)(?:APPROVED)/s', $text, $matches)) {
        $resolutionData['optionalClauses'] = trim($matches[0]);
    }

    if (preg_match('/UNANIMOUSLY(.+)/s', $text, $matches)) {
        $resolutionData['approvalDetails'] = trim($matches[0]);
    }

    return $resolutionData;
}

if (!isTesseractInstalled()) {
    echo json_encode([
        'success' => false,
        'message' => 'Tesseract OCR is not installed or not found in PATH.'
    ]);
    exit;
}

if (!isPdftoppmInstalled()) {
    echo json_encode([
        'success' => false,
        'message' => 'pdftoppm is not installed or not found in PATH.'
    ]);
    exit;
}

if (isset($_FILES['uploadedFiles']) && !empty($_FILES['uploadedFiles']['name'][0])) {
    $uploadedFiles = $_FILES['uploadedFiles'];
    $uploadedFileUrls = []; // Initialize array to store uploaded file URLs
    $pdftoimageUrls = []; // Initialize array to store URLs of images generated from PDFs
    $allExtractedText = ''; // Initialize variable to store all extracted text

    foreach ($uploadedFiles['tmp_name'] as $key => $tmp_name) {
        $fileName = $uploadedFiles['name'][$key];
        $fileTmpPath = $uploadedFiles['tmp_name'][$key];
        $fileSize = $uploadedFiles['size'][$key];
        $fileType = $_FILES['uploadedFiles']['type'][$key];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = __DIR__ . '/../uploads/'; // safer: absolute path

            // Check if uploads folder exists, if not create it
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true); // creates the folder with full permissions
            }

            $dest_path = $uploadFileDir . $fileName;

            $resolution_file = get_file_by_filename('resolutions', $dest_path);

            if ($resolution_file && $dest_path == $resolution_file['file']) {
                echo json_encode([
                    'success' => false,
                    'message' => 'The file uploaded already exists in the system. Please rename the file or choose a different one.'
                ]);
                exit;
            }

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadedFileUrls[] = $dest_path; // Collect the URL of the uploaded file
                $extractedText = ''; // Define extracted text variable

                if ($fileExtension === 'pdf') {
                    // Extract text from PDF
                    $extractedText = extractTextFromPdf($dest_path, $pdftoimageUrls);
                } else {
                    // Extract text from image
                    $extractedText = extractTextFromImage($dest_path);
                }

                // Clean the extracted text
                $cleanExtractedText = $extractedText;
                // Add a marker indicating the order of extraction
                $extractedTextWithMarker = "<h6 class='text-primary'>Extracted Texts " . ($key + 1) . ":</h6>\n<p class='text-gray-800'>" . $cleanExtractedText . "</p>\n";
                // Concatenate extracted text from each image
                $allExtractedText .= htmlspecialchars(trim(strip_tags($extractedTextWithMarker)));
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'There was an error moving the uploaded file.'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions)
            ]);
            exit;
        }
    }

    // After looping through all images, parse the combined extracted text
    $resolutionData = parseResolutionText($allExtractedText);

    echo json_encode([
        'success' => true,
        'resolutionData' => $resolutionData,
        'extractedText' => $allExtractedText, // Include combined extracted text in the response
        'uploadedFileUrls' => $uploadedFileUrls, // Include URLs of uploaded files
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Please select at least one file to upload.'
    ]);
}
