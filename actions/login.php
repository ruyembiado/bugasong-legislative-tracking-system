<?php
require_once '../config/config.php';

if (isset($_POST['user_login'])) : // Check if the button is clicked
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if the method is POST

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sample $first = first('users', ['username'=>$username]);  return the first value find
        if ($user = first('users', ['username' => $username])) { // Find the first value or row of the query where username=$username
            if ($user['status'] == 0) { // Check if the account is active
                if (password_verify($password, $user['password'])) { // password_verify built-in PHP function to compare hashed passwords

                    $session = [
                        'user_id'    => $user['user_id'],
                        'name'       => $user['name'],
                        'username'   => $user['username'],
                        'user_type'  => $user['user_type'],
                        'isLogin'    => true,
                    ];

                    $session = setSession($session); // Set the $session array
                    // var_dump($_SESSION); // Use to test the session variables

                    // Log History
                    $userData = getUserData($user['user_id']);
                    $log_history = [
                        'user'     => $userData['user_type'],
                        'log_type'     => 'Login',
                        'log_description'     => $userData['name'].' '.'logged to the system.',
                    ];
                    save('log_history', $log_history);

                    setFlash('success', 'Welcome ' . $user['name']); // Set message
                    if ($user['user_type'] == 'admin') {
                        redirect('admin_home'); // Shortcut for header('location:index.php'); // Uncomment to use if you have a page to redirect to
                    }

                    redirect('citizen_home');
                } else {
                    retainValue();
                    $errors['password'] = 'Incorrect password';
                    redirect('login', $errors);
                }
            } else {
                setFlash('failed', 'Your account is deactivated. Please contact the administrator.');
                redirect('login');
            }
        } else {
            retainValue();
            $errors['username'] = 'Username does not exist';
            redirect('login', $errors);
        }
    }
endif;
