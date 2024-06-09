<?php
require_once '../config/config.php';


// Update Resolution
if (isset($_POST['update_resolution'])) : //check if the button is click

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
            $errors['resolution_id'] =  $_POST['resolution_id'];
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

    if (isset($_GET['ordinance_id'])) {
        $data = [
            'status' => $status,
        ];
        $update = update('ordinances',  ['ordinance_id' => $_GET['ordinance_id']], $data);

        if ($update) {
            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Status Updated Successfully'); //set message
            redirect('admin_ordinance', ['publish' => '']); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('admin_ordinance', ['publish' => '']); //shortcut for header('location:index.php ');
        }
    }

endif;

if (isset($_POST['update_tag'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'tag_name' => $_POST['tag_name'],
        ];

        $validations = [
            'tag_name' => [
                'required' => false,
                'unique' => [
                    [
                        'fieldName' => 'tag_name',
                        'tableName' => 'tags'
                    ],
                ],

            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'tag_name' => $_POST['tag_name'],
            ]; //put it in array before saving

            $update = update('tags', ['tag_id' => $_POST['tag_id']], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Ordinance Updated Successfully'); //set message
                redirect('admin_update_ordinance', ['ordinance_id' => $_POST['ordinance_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_ordinance', ['ordinance_id' => $_POST['ordinance_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['ordinance_id'] =  $_POST['ordinance_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_update_ordinance', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;

// Update Ordinance
if (isset($_POST['update_ordinance'])) : // check if the button is clicked

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // check if the method is post 

        $fields = [
            'ordinanceNo' => $_POST['ordinanceNo'],
            'title' => $_POST['title'],
            'preamble' => $_POST['preamble'],
            'enactingClause' => $_POST['enactingClause'],
            'body' => $_POST['body'],
            'repealingClause' => $_POST['repealingClause'],
            'effectivityClause' => $_POST['effectivityClause'],
            'enactmentDetails' => $_POST['enactmentDetails'],
        ];

        $validations = [
            'ordinanceNo' => [
                'required' => true,
            ],
            'title' => [
                'required' => true,
            ],
            'preamble' => [
                'required' => true,
            ],
            'enactingClause' => [
                'required' => true,
            ],
            'body' => [
                'required' => true,
            ],
            'repealingClause' => [
                'required' => true,
            ],
            'effectivityClause' => [
                'required' => true,
            ],
            'enactmentDetails' => [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); // activate the validation

        if (empty($errors)) { // check if the errors are empty
            $data = [
                'tag_id' => $_POST['tag'],
                'ordinanceNo' => $_POST['ordinanceNo'],
                'title' => $_POST['title'],
                'preamble' => $_POST['preamble'],
                'enactingClause' => $_POST['enactingClause'],
                'body' => $_POST['body'],
                'repealingClause' => $_POST['repealingClause'],
                'effectivityClause' => $_POST['effectivityClause'],
                'enactmentDetails' => $_POST['enactmentDetails'],
                'file' => $_POST['file'],
                'user_id' => $_POST['user_id']
            ]; // put it in an array before saving

            $update = update('ordinances', ['ordinance_id' => $_POST['ordinance_id']], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Ordinance Updated Successfully'); //set message
                redirect('admin_update_ordinance', ['ordinance_id' => $_POST['ordinance_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_ordinance', ['ordinance_id' => $_POST['ordinance_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['ordinance_id'] =  $_POST['ordinance_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_update_ordinance', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;