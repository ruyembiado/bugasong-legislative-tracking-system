<?php
require_once '../config/config.php';


// Update Resolution
if (isset($_POST['update_resolution'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'resolutionNo' => $_POST['resolutionNo'],
            'title' => $_POST['title'],
            'whereasClauses' => $_POST['whereasClauses'],
            'resolvingClauses' => $_POST['resolvingClauses'],
            'optionalClauses' => $_POST['optionalClauses'],
            'approvalDetails' => $_POST['approvalDetails']
        ];

        $validations = [
            'resolutionNo' => [
                'required' => false,
            ],
            'resolutionNo' => [
                'required' => true,
            ],
            'title' => [
                'required' => true,
            ],
            'whereasClauses' => [
                'required' => true,
            ],
            'resolvingClauses' => [
                'required' => true,
            ],
            'optionalClauses' => [],
            'approvalDetails' => [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'tag' => $_POST['tag'],
                'resolutionNo' => $_POST['resolutionNo'],
                'title' => $_POST['title'],
                'whereasClauses' => $_POST['whereasClauses'],
                'resolvingClauses' => $_POST['resolvingClauses'],
                'optionalClauses' => $_POST['optionalClauses'],
                'approvalDetails' => $_POST['approvalDetails'],
            ]; //put it in array before saving

            $update = update('resolutions',  ['resolution_id' => $_POST['resolution_id']], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Resolution Updated Successfully'); //set message
                redirect('admin_update_resolution', ['resolution_id' => $_POST['resolution_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_resolution', ['resolution_id' => $_POST['resolution_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors = ['resolution_id' => $_POST['resolution_id']];
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_update_resolution', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;

if (isset($_GET['update_status'])) : //check if the button is click

    $status = '';
    if ($_GET['update_status'] == '0')
        echo $status = 1;
    else {
        echo $status = 0;
    }

    // Update resolution status
    if ($_GET['resolution_id']) {

        $data = [
            'status' => $status,
        ];
        $update = update('resolutions',  ['resolution_id' => $_GET['resolution_id']], $data);

        if ($update) {
            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Status Updated Successfully'); //set message
            redirect('admin_resolution', ['publish' => '']); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('admin_resolution', ['publish' => '']); //shortcut for header('location:index.php ');
        }
    }

endif;
