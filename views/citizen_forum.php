<?php
@include('header.php');
redirectNotLogin();

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php @include('top_navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Feedback Forum</h1>
            </div>

            <!-- Content Row -->
            <div class="container-fluid p-0">
                <div class="row main-content">
                    <div class="forum-post col-12 col-sm-8 order-2 order-sm-1">
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="forum">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    test
                                </div>
                                <div class="card-body">
                                    test
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-forum col-12 col-sm-4 order-1 order-sm-2">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
                            </div>
                            <form action="" method="POST" class="p-2">
                                <div class="d-flex flex-column">
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Topic</label>
                                        <div class="d-flex align-items-center">
                                            <input class="form-control" type="text" name="topic" value="<?php echo getValue('topic'); ?>" placeholder="Enter your topic">
                                        </div>
                                        <?php if (showError('topic')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('topic'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Message</label>
                                        <div class="d-flex align-items-center">
                                            <textarea class="form-control" name="message" placeholder="Enter your message"><?php echo getValue('message'); ?></textarea>
                                        </div>
                                        <?php if (showError('message')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('message'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="m-1 mb-4">
                                    <button type="submit" name="user_login" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Bugasong Legislative Tracking System 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<?php
@include('footer.php');
?>