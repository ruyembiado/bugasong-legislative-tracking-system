<?php
require_once '../config/config.php';


// Update Resolution
if (isset($_POST['update_resolution'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'resolution_category' => $_POST['resolution_category'],
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
                'resolution_cat_id' => $_POST['resolution_category'],
                'resolutionNo' => $_POST['resolutionNo'],
                'title' => $_POST['title'],
                'whereasClauses' => $_POST['whereasClauses'],
                'resolvingClauses' => $_POST['resolvingClauses'],
                'optionalClauses' => $_POST['optionalClauses'],
                'approvalDetails' => $_POST['approvalDetails'],
            ]; //put it in array before saving

            $update = update('resolutions',  ['resolution_id' => $_POST['resolution_id']], $data);

            if ($update) {
                $resolution = getResolutionByID($_POST['resolution_id']);
                // Log History
                create_log_history($_SESSION['user_id'], 'Update Resolution', $resolution['title']);

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
    if ($_GET['update_status'] == '0') {
        $status = 1;
        $status_name = "Published";
    } else {
        $status = 0;
        $status_name = "Unpublished";
    }

    // Update resolution status
    if ($_GET['resolution_id']) {

        $data = [
            'status' => $status,
            'date_publish' => date('Y-m-d H:i:s'),
        ];
        $update = update('resolutions',  ['resolution_id' => $_GET['resolution_id']], $data);

        if ($update) {
            $resolution = getResolutionByID($_GET['resolution_id']);
            $additional = '' . $resolution['resolutionNo'] . '`s status to ' . $status_name;
            // Log History
            create_log_history($_SESSION['user_id'], 'Update Resolution', $additional);

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
            'date_publish' => date('Y-m-d H:i:s'),
        ];
        $update = update('ordinances',  ['ordinance_id' => $_GET['ordinance_id']], $data);

        if ($update) {
            $ordinance = getOrdinanceByID($_GET['ordinance_id']);
            $additional = $ordinance['ordinanceNo'] . '`s status to ' . $status_name;
            // Log History
            create_log_history($_SESSION['user_id'], 'Update Ordinance', $additional);

            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Status Updated Successfully'); //set message
            redirect('admin_ordinance', ['publish' => '']); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('admin_ordinance', ['publish' => '']); //shortcut for header('location:index.php ');
        }
    }

    if (isset($_GET['user_id'])) {

        if ($_GET['update_status'] == '0') {
            $user_status = "Active";
        } else {
            $user_status = "Inactive";
        }

        $data = [
            'status' => $status,
        ];
        $update = update('users',  ['user_id' => $_GET['user_id']], $data);

        if ($update) {
            $user = getUserDataByID($_GET['user_id']);
            $additional = $user['name'] . '`s status to ' . $user_status;
            // Log History
            create_log_history($_SESSION['user_id'], 'Update User', $additional);

            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Status Updated Successfully'); //set message
            redirect('admin_user_management'); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('admin_user_management'); //shortcut for header('location:index.php ');
        }
    }

    if (isset($_GET['post_id'])) {
        $post_status = '';
        if ($_GET['update_status'] == '0') {
            $post_status = "Published";
        } else {
            $post_status = "Unpublished";
        }

        $data = [
            'status' => $status,
        ];

        $update = update('posts',  ['post_id' => $_GET['post_id']], $data);

        if ($update) {
            $post = getPostByID($_GET['post_id']);
            $additional = $post['topic'] . ' status to ' . $post_status;
            // Log History
            create_log_history($_SESSION['user_id'], 'Update Post', $additional);
            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Status Updated Successfully'); //set message

            if ($_GET['view'] === 'true') {
                redirect('view_post.php?post_id=' . $_GET['post_id']);
            }
            redirect('admin_forum'); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('admin_forum'); //shortcut for header('location:index.php ');
        }
    }

endif;


// Update Resolution Category
if (isset($_POST['update_resolution_category'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'resolution_category_name' => $_POST['resolution_category_name'],
        ];

        $validations = [
            'resolution_category_name' => [
                'required' => false,
                'unique' => [
                    [
                        'fieldName' => 'resolution_category_name',
                        'tableName' => 'resolution_cat'
                    ],
                ],

            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'resolution_category_name' => $_POST['resolution_category_name'],
            ]; //put it in array before saving
            $category = getResolutionCatByID($_POST['resolution_cat_id']);

            $update = update('resolution_cat', ['resolution_cat_id' => $_POST['resolution_cat_id']], $data);
            if ($update) {
                $additional = 'name ' . $category['resolution_category_name'] . ' to ' . $_POST['resolution_category_name'];
                // Log History
                create_log_history($_SESSION['user_id'], 'Update Category', $additional);

                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Resolution Category Updated Successfully'); //set message
                redirect('admin_resolution_category'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_resolution_category'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['resolution_cat_id'] =  $_POST['resolution_cat_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_update_resolution_cat', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;

// Update Ordinance Category
if (isset($_POST['update_ordinance_category'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'ordinance_category_name' => $_POST['ordinance_category_name'],
        ];

        $validations = [
            'ordinance_category_name' => [
                'required' => false,
                'unique' => [
                    [
                        'fieldName' => 'ordinance_category_name',
                        'tableName' => 'ordinance_cat'
                    ],
                ],

            ]
        ];

        $errors = validate($fields, $validations); //activate the validation
        $category = getOrdinanceCatByID($_POST['ordinance_cat_id']);

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'ordinance_category_name' => $_POST['ordinance_category_name'],
            ]; //put it in array before saving

            $update = update('ordinance_cat', ['ordinance_cat_id' => $_POST['ordinance_cat_id']], $data);

            if ($update) {
                $additional = 'name ' . $category['ordinance_category_name'] . ' to ' . $_POST['ordinance_category_name'];
                // Log History
                create_log_history($_SESSION['user_id'], 'Update Category', $additional);
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Resolution Category Updated Successfully'); //set message
                redirect('admin_ordinance_category'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_ordinance_category'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['ordinance_cat_id'] =  $_POST['ordinance_cat_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_update_ordinance_cat', $errors); //shortcut for header('location:register.php?errors=$errors');
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
                'ordinance_cat_id' => $_POST['ordinance_category'],
                'ordinanceNo' => $_POST['ordinanceNo'],
                'title' => $_POST['title'],
                'preamble' => $_POST['preamble'],
                'enactingClause' => $_POST['enactingClause'],
                'body' => $_POST['body'],
                'repealingClause' => $_POST['repealingClause'],
                'effectivityClause' => $_POST['effectivityClause'],
                'enactmentDetails' => $_POST['enactmentDetails'],
                'user_id' => $_POST['user_id']
            ]; // put it in an array before saving

            $update = update('ordinances', ['ordinance_id' => $_POST['ordinance_id']], $data);

            if ($update) {
                // Log History
                create_log_history($_SESSION['user_id'], 'Update Ordinance', $_POST['ordinanceNo']);
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

// Update new user
if (isset($_POST['update_user'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if the method is POST

        // Get the value POST
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirm_password'];
        $email = $_POST['email'];

        // Input the fields
        $fields = [
            'name'          => $name,
            'username'      => $username,
            'email'         => $email,
        ];

        if (!empty($password)) {
            $fields['password'] = $password;
            $fields['confirm_password'] = $confpassword;
        }

        // Create validation rules
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
            ],
            'email' => [
                'required' => true,
                'email' => true,
                'unique' => [
                    'fieldName' => 'email',
                    'tableName' => 'users'
                ],
            ],
        ];

        if (!empty($password)) {
            $validations['password'] = [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ];
            $validations['confirm_password'] = [
                'required' => true,
                'match' => 'password'
            ];
        }

        $errors = validate($fields, $validations); // Activate the validation

        if (empty($errors)) { // Check if the errors are empty
            $data = [
                'name' => $name,
                'username' => $username,
                'email' => $email,
            ];

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password
            }

            $save = update('users', ['user_id' => $_POST['user_id']], $data);

            if ($save) {
                // Log History
                create_log_history($_SESSION['user_id'], 'Update User', $name);
                removeValue(); // Remove the retained value in inputs
                setFlash('success', 'User Updated Successfully'); // Set message
                redirect('admin_update_user', ['user_id' => $_POST['user_id']]); // Shortcut for header('location:index.php');
            } else {
                retainValue(); // Retain value even if there are errors or refresh
                setFlash('failed', 'Update Failed'); // Set message
                redirect('admin_update_user', ['user_id' => $_POST['user_id']]); // Shortcut for header('location:index.php');
            }
        } else {
            $errors['user_id'] = $_POST['user_id'];
            retainValue(); // Retain value even if there are errors or refresh
            redirect('admin_update_user', $errors); // Shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
