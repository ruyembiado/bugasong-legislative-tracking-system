<?php
require_once '../config/config.php';

// Add Resolution
if (isset($_POST['add_resolution'])) : //check if the button is click

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

// Add Ordinance
if (isset($_POST['add_ordinance'])) : // check if the button is clicked

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

            $save = save('ordinances', $data); // $save = save('table_name', ['column_name' => $username]); if there is one data to save use this

            if ($save) {
                removeValue(); // remove the retain value in inputs
                setFlash('success', 'Ordinance Added Successfully'); // set message
                redirect('admin_add_ordinance'); // shortcut for header('location:index.php');
            } else {
                retainValue(); // retain value even if there are errors or refresh
                setFlash('failed', 'Add Failed'); // set message
                redirect('admin_add_ordinance'); // shortcut for header('location:index.php');
            }
        } else {
            retainValue(); // retain value even if there are errors or refresh
            redirect('admin_add_ordinance', $errors); // shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;


// Add new user
if (isset($_POST['add_user'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post

        //get the value POST
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirm_password'];
        $email = $_POST['email'];

        //Input the fields
        $fields = [
            'name'          => $name, //or 'name =>$_POST['name'],'
            'username'      => $username,
            'password'      => $password,
            'confirm_password'  => $confpassword,
            'email'         => $email,
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'name' => [
                'required' => true,
                'min_length' => 2,
                'max_length' => 100
            ],
            'username' => [
                'required' => true,
                'min_length' => 5,
                'max_length' => 50,
                'unique' => [
                    [
                        'fieldName' => 'username',
                        'tableName' => 'users'
                    ],
                ],
            ],
            'email'    => [
                'required'  => true,
                'email'     => true,
                'unique'    => [
                    'fieldName' => 'email',
                    'tableName' => 'users'
                ],
            ],
            'password' => [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ],
            'confirm_password' => [
                'required' => true,
                'match' => 'password'
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'name'  => $name, //or $_POST['name']
                'username'  => $username,
                'password'  => password_hash($password, PASSWORD_DEFAULT), //encrypt the password like md5
                'email'     => $email,
                'user_type'      => 'citizen',
            ]; //put it in array before saving

            $save = save('users', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Registered Successfully'); //set message
                redirect('admin_add_user'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Register Failed'); //set message
                redirect('admin_add_user'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_user', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
