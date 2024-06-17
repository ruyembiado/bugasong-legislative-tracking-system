<?php
require_once '../config/config.php';


// Update Comment
if (isset($_POST['update_comment'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'comment' => $_POST['post_comment'],
        ];

        $validations = [
            'comment' => [
                'required' => false,
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'post_comment' => $_POST['post_comment'],
            ]; //put it in array before saving

            $update = update('post_comments',  ['post_comment_id' => $_POST['post_comment_id']], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Comment Updated Successfully'); //set message
                redirect('view_post', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('view_post', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['post_id'] =  $_POST['post_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('view_post', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;

// Update Post
if (isset($_POST['update_post'])) : //check if the button is click

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post 

        $fields = [
            'topic' => $_POST['topic'],
            'message' => $_POST['message'],
        ];

        $validations = [
            'comment' => [
                'required' => true,
            ],
            'message' => [
                'required' => true,
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'topic' => $_POST['topic'],
                'message' => $_POST['message'],
            ]; //put it in array before saving

            $update = update('posts',  ['post_id' => $_POST['post_id']], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Post Updated Successfully'); //set message
                redirect('citizen_post_update', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('citizen_post_update', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['post_id'] =  $_POST['post_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('citizen_post_update', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;
