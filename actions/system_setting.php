<?php
require_once '../config/config.php';

if (isset($_POST['update_logo'])) : // Check if the button is clicked

    if ($_SERVER['REQUEST_METHOD'] === 'POST') : // Check if the method is POST 

        $errors = [];

        // Validate file upload
        if (isset($_FILES['system_logo']) && $_FILES['system_logo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['system_logo']['tmp_name'];
            $fileName = $_FILES['system_logo']['name'];
            $fileSize = $_FILES['system_logo']['size'];
            $fileType = $_FILES['system_logo']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Sanitize file name to prevent security issues
            $safeFileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $fileName);

            // Check if file type is allowed
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];
            if (in_array($fileExtension, $allowedfileExtensions)) {
                // Directory in which the uploaded file will be moved
                $uploadFileDir = '../uploads/';
                $dest_path = $uploadFileDir . $safeFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $data = [
                        'system_logo' => $dest_path,
                    ]; // Prepare data to be saved
                    $id = 1;

                    $save = update('system_settings', ['system_setting_id' => $id], $data); // Save to the database

                    if ($save) {
                        removeValue(); // Remove the retain value in inputs
                        setFlash('success', 'System Logo Updated Successfully'); // Set success message
                        redirect('admin_system_setting'); // Redirect
                    } else {
                        retainValue(); // Retain value even if there are errors or refresh
                        setFlash('failed', 'Update Failed'); // Set failure message
                        redirect('admin_system_setting'); // Redirect
                    }
                } else {
                    $errors['system_logo'] = 'There was an error moving the uploaded file.';
                }
            } else {
                $errors['system_logo'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
        } else {
            $errors['system_logo'] = 'There is no file uploaded or there was an upload error.';
        }

        // Validate other fields (if any)
        $fields = [
            'system_logo' => $fileName, // Use the uploaded file name for validation
        ];

        $validations = [
            'system_logo' => [
                'required' => true,
            ]
        ];

        $errors = array_merge($errors, validate($fields, $validations)); // Activate the validation and merge with file errors

        if (empty($errors)) : // Check if there are no errors
            $data = [
                'system_logo' => $dest_path, // Save the file path
            ]; // Prepare data to be saved
            $id = 1;

            $save = update('system_settings', ['system_setting_id' => $id], $data); // Save to the database

            if ($save) {
                // Log History
                create_log_history($_SESSION['user_id'], 'System Setting', 'logo');

                removeValue(); // Remove the retain value in inputs
                setFlash('success', 'System Logo Updated Successfully'); // Set success message
                redirect('admin_system_setting'); // Redirect
            } else {
                retainValue(); // Retain value even if there are errors or refresh
                setFlash('failed', 'Update Failed'); // Set failure message
                redirect('admin_system_setting'); // Redirect
            }
        else :
            retainValue(); // Retain value even if there are errors or refresh
            redirect('admin_system_setting', $errors); // Redirect with errors
        endif;
    endif;
endif;
