<?php
require_once '../config/config.php';

if (isset($_POST['create_post'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post

        //Input the fields
        $fields = [
            'topic'          => $_POST['topic'], //or 'name =>$_POST['name'],'
            'message'          => $_POST['message'],
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'topic' => [
                'required' => true,
            ],
            'message' => [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'topic'       => $_POST['topic'], //or $_POST['name']
                'message'       => $_POST['message'],
                'user_id'       => $_POST['user_id']
            ]; //put it in array before saving

            $save = save('posts', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Post Created Successfully'); //set message
                redirect('citizen_forum'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('citizen_forum'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('citizen_forum', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
