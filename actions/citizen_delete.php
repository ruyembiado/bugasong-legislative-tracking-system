<?php
require_once '../config/config.php';

if (isset($_GET['delete_comment']) && $_GET['delete_comment'] == 'delete') :
    $delete = delete('post_comments', ['post_comment_id' => $_GET['comment_id']]);
    if ($delete) {
        setFlash('success', 'Deleted Successfuly');
        redirect('view_post', ['post_id' => $_GET['post_id']]);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('view_post', ['post_id' => $_GET['post_id']]);
    }
endif;
