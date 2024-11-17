<?php

require_once '../config/config.php';

// Update new user
if (isset($_POST['update_profile'])) :
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

            $additional;

            if ($save) {
                // Log History
                create_log_history($_SESSION['user_id'], 'Update Profile', '');

                removeValue(); // Remove the retained value in inputs
                setFlash('success', 'Profile Updated Successfully'); // Set message
                redirect('profile', ['user_id' => $_POST['user_id']]); // Shortcut for header('location:index.php');
            } else {
                retainValue(); // Retain value even if there are errors or refresh
                setFlash('failed', 'Update Failed'); // Set message
                redirect('profile', ['user_id' => $_POST['user_id']]); // Shortcut for header('location:index.php');
            }
        } else {
            $errors['user_id'] = $_POST['user_id'];
            retainValue(); // Retain value even if there are errors or refresh
            redirect('profile', $errors); // Shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
