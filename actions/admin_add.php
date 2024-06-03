<?php
require_once '../config/config.php';

// Add Resolution
if (isset($_POST['add_resolution'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'tag' => $_POST['tag'],
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
                'tag_id' => $_POST['tag'],
                'resolutionNo' => $_POST['resolutionNo'],
                'title' => $_POST['title'],
                'whereasClauses' => $_POST['whereasClauses'],
                'resolvingClauses' => $_POST['resolvingClauses'],
                'optionalClauses' => $_POST['optionalClauses'],
                'approvalDetails' => $_POST['approvalDetails'],
                'file' => $_POST['file'],
                'user_id' => $_POST['user_id']
            ]; //put it in array before saving

            $save = save('resolutions', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Resolution Added Successfully'); //set message
                redirect('admin_add_resolution'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_resolution'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_resolution', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;

// Add Tag
if (isset($_POST['add_tag'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'tag_name' => $_POST['tag_name'],
        ];

        $validations = [
            'tag_name' => [
                'required' => false,
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'tag_name' => $_POST['tag_name'],
            ]; //put it in array before saving

            $save = save('tags', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Tag Added Successfully'); //set message
                redirect('admin_add_tag'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_tag'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_tag', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;
