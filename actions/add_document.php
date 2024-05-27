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

if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $extractedText = extractTextFromUploadedFile($dest_path);

            echo '<h3>Extracted Text:</h3>';
            echo '<pre>' . htmlspecialchars($extractedText) . '</pre>';
        } else {
            setFlash('failed', 'There was an error moving the uploaded file.');
            redirect('add_resolution');
        }
    } else {
        setFlash('failed', 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
        redirect('add_resolution');
    }
} else {
    setFlash('failed', 'There was an error with the file upload.');
    redirect('add_resolution');
}
