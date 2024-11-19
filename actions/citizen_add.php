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
                'user_id'       => $_POST['user_id'],
                'status'        => 0,
            ]; //put it in array before saving

            $save = save('posts', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                $analyzepost = AnalyzePost($_POST['topic'], $_POST['message']);
                if ($analyzepost) {
                    $latestpost = getLatestPost();
                    if ($analyzepost['status'] === "pending") {
                        update('posts', ['post_id' => $latestpost['post_id']], ['reason' => $analyzepost['reason']]);
                    }
                    $notif_data = [
                        'post_id' => $latestpost['post_id'],
                        'user_id' => $latestpost['user_id'],
                        'notification_content' => $analyzepost['reason'],
                        'is_read' => 0,
                    ];
                    save('notification', $notif_data);
                }
                // Log History
                create_log_history($_SESSION['user_id'], 'Create Post', $_POST['topic']);

                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Your topic is being checked. You will be notified once it is diplayed on the forum.'); //set message
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

if (isset($_POST['create_comment'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post

        //Input the fields
        $fields = [
            'comment'          => $_POST['comment'],
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'comment' => [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'post_id'       => $_POST['post_id'], //or $_POST['name']
                'user_id'       => $_POST['user_id'], //or $_POST['name']
                'post_comment'       => $_POST['comment'],
            ]; //put it in array before saving

            $save = save('post_comments', $data);

            $post = getPostByID($_POST['post_id']);

            if ($save) {
                // Log History
                create_log_history($_SESSION['user_id'], 'Create Comment', $post['topic']);

                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Comment Added Successfully'); //set message
                redirect('view_post', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('view_post', ['post_id' => $_POST['post_id']]); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['post_id'] =  $_POST['post_id'];
            retainValue(); //retain value even if there is errors or refresh
            redirect('view_post', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
