<?php
require_once '../config/config.php';

if (isset($_GET['delete_resolution']) && $_GET['delete_resolution'] == 'delete') :
    $delete = delete('resolutions', ['resolution_id' => $_GET['resolution_id']]);
    if ($delete) {
        setFlash('success', 'Deleted Successfuly');
        redirect('admin_resolution', ['manage' => '']);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_resolution', ['manage' => '']);
    }
endif;

if (isset($_GET['delete_ordinance']) && $_GET['delete_ordinance'] == 'delete') :
    $delete = delete('ordinances', ['ordinance_id' => $_GET['ordinance_id']]);
    if ($delete) {
        setFlash('success', 'Deleted Successfuly');
        redirect('admin_ordinance', ['manage' => '']);
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_ordinance', ['manage' => '']);
    }
endif;

if (isset($_GET['delete_tag']) && $_GET['delete_tag'] == 'delete') :
    $delete = delete('tags', ['tag_id' => $_GET['tag_id']]);
    if ($delete) {
        setFlash('success', 'Deleted Successfuly');
        redirect('admin_tag');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_tag');
    }
endif;

if (isset($_GET['delete_user']) && $_GET['delete_user'] == 'delete') :
    $delete = delete('users', ['user_id' => $_GET['user_id']]);
    if ($delete) {
        setFlash('success', 'Deleted Successfuly');
        redirect('admin_user_management');
    } else {
        setFlash('failed', 'Delete Failed');
        redirect('admin_user_management');
    }
endif;