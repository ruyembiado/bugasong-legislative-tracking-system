<?php
require_once '../config/config.php';

if (isset($_GET['read_notification'])) {
    $notification_id = $_GET['read_notification'];
    $post_id = $_GET['post_id'];
    read_notification($notification_id);
    redirect('view_post', ['post_id' => $post_id]);
}
