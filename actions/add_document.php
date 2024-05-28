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

function extractTextFromUploadedFile($file)
{
    $tesseract = new TesseractOCR($file);
    return $tesseract->run();
}

if (!isTesseractInstalled()) {
    die('Error: Tesseract OCR is not installed or not found in PATH.');
}

if (isset($_FILES['uploadedFiles']) && !empty($_FILES['uploadedFiles']['name'][0])) {
    $uploadedFiles = $_FILES['uploadedFiles'];

    foreach ($uploadedFiles['tmp_name'] as $key => $tmp_name) {
        $fileName = $uploadedFiles['name'][$key];
        $fileTmpPath = $uploadedFiles['tmp_name'][$key];
        $fileSize = $uploadedFiles['size'][$key];
        $fileType = $uploadedFiles['type'][$key];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $extractedText = extractTextFromUploadedFile($dest_path);

                echo '<h3>Extracted Text from ' . htmlspecialchars($fileName) . ':</h3>';
                echo '<pre>' . htmlspecialchars($extractedText) . '</pre>';
            } else {
                setFlash('failed', 'There was an error moving the uploaded file.');
                redirect('add_resolution');
            }
        } else {
            setFlash('failed', 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
            redirect('add_resolution');
        }
    }
} else {
    setFlash('failed', 'Please select at least one file to upload.');
    redirect('add_resolution');
}
?>
