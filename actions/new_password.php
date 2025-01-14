<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_password'])) {

    //Input the fields
    $fields = [
        'password'      => $_POST['password'],
        'confirm_password'  => $_POST['confirm_password'],
    ];
    //Create Validation if you want to see the choices ..go to database.php
    $validations = [
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
            'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT), //encrypt the password like md5
        ]; //put it in array before saving

        $update = update('users', ['email' => $_POST['email']], $data); // $update = update('table_name', ['colum_name'=>$username]); if there is one data to update use this

        if ($update) {
            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Password Updated Successfully'); //set message
            redirect('index'); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('reset_password'); //shortcut for header('location:index.php ');
        }
    } else {
        retainValue(); //retain value even if there is errors or refresh
        redirect('reset_password', $errors); //shortcut for header('location:register.php?errors=$errors');
    }
}
