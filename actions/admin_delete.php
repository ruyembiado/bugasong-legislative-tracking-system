<?php
require_once '../config/config.php';

if (isset($_GET['delete_resolution']) && $_GET['delete_resolution'] == 'delete') :
    $resolution = getResolutionByID($_GET['resolution_id']);
    $_SESSION['resolutionNo'] = $category['resolutionNo'];
    $delete = delete('resolutions', ['resolution_id' => $_GET['resolution_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Resolution', $_SESSION['resolutionNo']);
        unset($_SESSION['resolutionNo']);
        setFlash('success', ' Resolution Deleted Successfully');
        redirect('admin_resolution', ['manage' => '']);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_resolution', ['manage' => '']);
    }
endif;

if (isset($_GET['delete_ordinance']) && $_GET['delete_ordinance'] == 'delete') :
    $ordinance = getOrdinanceByID($_GET['ordinance_id']);
    $_SESSION['ordinanceNo'] = $category['ordinanceNo'];
    $delete = delete('ordinances', ['ordinance_id' => $_GET['ordinance_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Ordinance', $_SESSION['ordinanceNo']);
        unset($_SESSION['ordinanceNo']);
        setFlash('success', 'Ordinance Deleted Successfully');
        redirect('admin_ordinance', ['manage' => '']);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_ordinance', ['manage' => '']);
    }
endif;

if (isset($_GET['resolution_cat']) && $_GET['resolution_cat'] == 'delete') :
    $category = getResolutionCatByID($_GET['resolution_cat_id']);
    $_SESSION['resolution_category_name'] = $category['resolution_category_name'];
    $delete = delete('resolution_cat', ['resolution_cat_id' => $_GET['resolution_cat_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Category', $_SESSION['resolution_category_name']);
        unset($_SESSION['resolution_category_name']);
        setFlash('success', 'Category Deleted Successfully');
        redirect('admin_resolution_category');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_resolution_category');
    }
endif;

if (isset($_GET['ordinance_cat']) && $_GET['ordinance_cat'] == 'delete') :
    $category = getOrdinanceCatByID($_GET['ordinance_cat_id']);
    $_SESSION['ordinance_category_name'] = $category['ordinance_category_name'];
    $delete = delete('ordinance_cat', ['ordinance_cat_id' => $_GET['ordinance_cat_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete Category', $_SESSION['ordinance_category_name']);
        unset($_SESSION['ordinance_category_name']);
        setFlash('success', 'Category Deleted Successfully');
        redirect('admin_ordinance_category');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_ordinance_category');
    }
endif;

if (isset($_GET['delete_user']) && $_GET['delete_user'] == 'delete') :
    $user = getUserDataByID($_GET['user_id']);
    $_SESSION['delete_user'] = $user['name'];
    $delete = delete('users', ['user_id' => $_GET['user_id']]);
    if ($delete) {
        // Log History
        create_log_history($_SESSION['user_id'], 'Delete User', $_SESSION['delete_user']);
        unset($_SESSION['delete_user']);
        setFlash('success', 'User Deleted Successfully');
        redirect('admin_user_management');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_user_management');
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
        redirect('admin_forum');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_forum');
    }
endif;
