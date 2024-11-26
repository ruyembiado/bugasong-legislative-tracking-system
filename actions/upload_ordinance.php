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

function parseOrdinanceText($text)
{
    $ordinanceData = [
        'ordinanceNo' => '',
        'title' => '',
        'preamble' => '',
        'enactingClause' => '',
        'body' => '',
        'repealingClause' => '',
        'effectivityClause' => '',
        'enactmentDetails' => '',
    ];

    if (preg_match('/Ordinance No.\s*(.+?)\s*\n/', $text, $matches)) {
        $ordinanceData['ordinanceNo'] = trim($matches[0]);
    }

    if (preg_match('/AN ORDINANCE \s*(.+?)\s*\n\n/s', $text, $matches)) {
        $ordinanceData['title'] = trim($matches[0]);
    }

    if (preg_match_all('/WHEREAS\s*(.+?)(?=(WHEREAS|WHEREFORE|$))/s', $text, $matches)) {
        if (!empty($matches[0]) && is_array($matches[0])) {
            $preamble = array_map('trim', $matches[0]);
            $ordinanceData['preamble'] = implode("\n\n", $preamble);
        }
    }

    if (preg_match('/WHEREFORE\s*(.+?)\s*(?=Section)/s', $text, $matches)) {
        $ordinanceData['enactingClause'] = trim($matches[0]);
    }

    if (preg_match('/Section\s*(.*?)\s(?=UNANIMOUSLY)/s', $text, $matches)) {
        $ordinanceData['body'] = trim($matches[0]);
    }

    if (preg_match('/REPEALING CLAUSE\s*(.+?)\s*EFFECTIVITY CLAUSE/s', $text, $matches)) {
        $ordinanceData['repealingClause'] = trim($matches[0]);
    }

    if (preg_match('/EFFECTIVITY CLAUSE\s*(.+?)\s*ENACTMENT DETAILS/s', $text, $matches)) {
        $ordinanceData['effectivityClause'] = trim($matches[0]);
    }

    if (preg_match('/ENACTMENT DETAILS\s*(.+)/s', $text, $matches)) {
        $ordinanceData['enactmentDetails'] = trim($matches[0]);
    }

    return $ordinanceData;
}

if (!isTesseractInstalled()) {
    echo json_encode([
        'success' => false,
        'message' => 'Tesseract OCR is not installed or not found in PATH.'
    ]);
}

if (!isPdftoppmInstalled()) {
    echo json_encode([
        'success' => false,
        'message' => 'pdftoppm is not installed or not found in PATH.'
    ]);
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
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            $ordinance_file = get_file_by_filename('ordinances', $dest_path);

            if ($ordinance_file && $dest_path == $ordinance_file['file']) {
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
    $ordinanceData = parseOrdinanceText($allExtractedText);

    echo json_encode([
        'success' => true,
        'ordinanceData' => $ordinanceData,
        'extractedText' => $allExtractedText, // Include combined extracted text in the response
        'uploadedFileUrls' => $uploadedFileUrls, // Include URLs of uploaded files
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Please select at least one file to upload.'
    ]);
}
