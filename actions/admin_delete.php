<?php
require_once '../config/config.php';

#EXAMPLE
// if (isset($_GET['delete_department'])) :
//     $department_ID = $_GET['delete_department'];
//     $delete = delete('department', ['department_ID' => $department_ID]);
//     if ($delete) {
//         setFlash('success', 'Deleted Sucessfully'); //set message
//         redirect('admin_manage_department');
//     } else {
//         setFlash('failed', 'Deletion failed'); //set message
//         redirect('admin_manage_department');
//     }
// endif;