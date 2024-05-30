
<?php
require_once '../config/config.php';
require '../vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

function isTesseractInstalled()
{
    $output = null;
    $retval = null;
    exec('tesseract -v', $output, $retval);
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
    return (new TesseractOCR($imagePath))->run();
}

function extractTextFromPdf($pdfPath)
{
    $outputDir = '../uploads/temp_images';

    if (!file_exists($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    convertPdfToImages($pdfPath, $outputDir);
    $fullText = '';
    $files = glob($outputDir . '/*.png');
    foreach ($files as $file) {
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
        'resolvingClause' => '',
        'optionalClauses' => '',
        'approvalDetails' => ''
    ];

    if (preg_match('/Resolution No.(.+?)\n/', $text, $matches)) {
        $resolutionData['resolutionNo'] = $matches[0];
    }

    if (preg_match('/A RESOLUTION(.+?)\n\n/s', $text, $matches)) {
        $resolutionData['title'] = trim($matches[0]);
    }

    if (preg_match('/WHEREAS(.+?)RESOLVED/s', $text, $matches)) {
        $resolutionData['whereasClauses'] = trim($matches[0]);
    }

    if (preg_match('/RESOLVED(.+?)(?:UNANIMOUSLY|APPROVED)/s', $text, $matches)) {
        $resolutionData['resolvingClause'] = trim($matches[0]);
    }

    if (preg_match('/UNANIMOUSLY(.+?)(?:APPROVED)/s', $text, $matches)) {
        $resolutionData['optionalClauses'] = trim($matches[0]);
    }

    if (preg_match('/APPROVED(.+)/s', $text, $matches)) {
        $resolutionData['approvalDetails'] = trim($matches[0]);
    }

    return $resolutionData;
}

if (!isTesseractInstalled()) {
    die('Error: Tesseract OCR is not installed or not found in PATH.');
}

if (!isPdftoppmInstalled()) {
    die('Error: pdftoppm is not installed or not found in PATH.');
}

if (isset($_FILES['uploadedFiles']) && !empty($_FILES['uploadedFiles']['name'][0])) {
    $uploadedFiles = $_FILES['uploadedFiles'];
    $uploadedFileUrls = []; // Initialize array to store uploaded file URLs
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
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadedFileUrls[] = $dest_path; // Collect the URL of the uploaded file
                $extractedText = ''; // Define extracted text variable
                if ($fileExtension === 'pdf') {
                    // Extract text from PDF
                    $extractedText = extractTextFromPdf($dest_path);
                } else {
                    // Extract text from image
                    $extractedText = extractTextFromImage($dest_path);
                }
                // Add a marker indicating the order of extraction
                $extractedTextWithMarker = "<h6 class='text-primary'>Extracted Texts " . ($key + 1) . ":</h6>\n<p class ='text-gray-800'>" . $extractedText . "</p>\n";
                // Concatenate extracted text from each image
                $allExtractedText .= $extractedTextWithMarker;
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
        'uploadedFileUrls' => $uploadedFileUrls // Include URLs of uploaded files
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Please select at least one file to upload.'
    ]);
}

?>