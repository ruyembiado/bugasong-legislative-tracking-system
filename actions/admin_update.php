<?php
require_once '../config/config.php';

#EXAMPLE
// if (isset($_POST['update_campus'])) :
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
//         //get the value POST
//         $campus_name = $_POST['campus_name'];
//         $campus_ID = $_POST['campus_ID'];

//         //Input the fields
//         $fields = [
//             'campus_name'          => $campus_name, //or 'name =>$_POST['name'],'
//         ];
//         //Create Validation if you want to see the choices ..go to database.php
//         $validations = [
//             'campus_name' => [
//                 'required' => true,
//                 'unique' => [[
//                     'fieldName' => 'campus_name',
//                     'tableName' => 'campus'
//                 ]]
//             ],
//         ];

//         $errors = validate($fields, $validations); //activate the validation

//         if (empty($errors)) { //check if the errors is empty
//             $data = [
//                 'campus_name'       => $campus_name, //or $_POST['name']
//             ]; //put it in array before saving

//             $update = update('campus',  ['campus_ID' => $campus_ID], $data);

//             if ($update) {
//                 removeValue(); //remove the retain value in inputs
//                 setFlash('success', 'Updated Successfully'); //set message
//                 redirect('admin_manage_campus'); //shortcut for header('location:index.php ');
//             } else {
//                 retainValue(); //retain value even if there is errors or refresh
//                 setFlash('failed', 'Update Failed'); //set message
//                 redirect('admin_update_campus'); //shortcut for header('location:index.php ');
//             }
//         } else {
//             retainValue(); //retain value even if there is errors or refresh
//             $errors['edit_campus'] = $campus_ID;
//             redirect('admin_update_campus', $errors); //shortcut for header('location:register.php?errors=$errors');
//         }
//     }
// endif;