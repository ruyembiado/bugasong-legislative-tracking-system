<?php
require_once '../config/config.php';

if (isset($_GET['delete_comment']) && $_GET['delete_comment'] == 'delete') :
    $post = getPostByID($_GET['post_id']);
    $_SESSION['post_topic'] = $post['topic'];
    $delete = delete('post_comments', ['post_comment_id' => $_GET['comment_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Comment', $_SESSION['post_topic']);
        unset($_SESSION['post_topic']);
        setFlash('success', 'Comment Deleted Successfully');
        redirect('view_post', ['post_id' => $_GET['post_id']]);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('view_post', ['post_id' => $_GET['post_id']]);
    }
endif;

if (isset($_GET['delete_post']) && $_GET['delete_post'] == 'delete') :
    $post = getPostByID($_GET['post_id']);
    $_SESSION['post_topic'] = $post['topic'];
    $delete = delete('posts', ['post_id' => $_GET['post_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Post', $_SESSION['post_topic']);
        unset($_SESSION['post_topic']);
        setFlash('success', 'Post Deleted Successfully');
        redirect('citizen_post');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('citizen_post');
    }
endif;
