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
