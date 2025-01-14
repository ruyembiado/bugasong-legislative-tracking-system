<?php
include('../config/config.php');

ob_start(); // Start output buffering

clearFormSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLTS</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/datatable.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

</head>

<body id="page-top" class="citizen-bg">

    <!-- Header -->
    <?php @include('citizen_top_navbar.php'); ?>
    <div class="">
        <h1 class="text-dark text-center">Bugasong Legislative Tracking System</h1>
    </div>

    <?php if (isHomePage()) : ?>    
        <div class="search-section my-4">
            <form action="citizen_legislative.php?search" method="get" class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="col-12 col-md-10 col-lg-4 input-group m-auto">
                    <input type="text" name="keyword" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="search_document" value="search_document" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
    <!-- End Header -->
    <!-- Page Wrapper -->
<<<<<<< HEAD
    <div id="wrapper" class="" style="min-height: 52vh">
=======
    <div id="" class="" style="min-height: 52vh">
>>>>>>> master
