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
                <h1 class="h3 mb-0 text-gray-800">Update Post</h1>
            </div>
            <div class="back-button mb-3">
                <a href="citizen_post.php" class="btn btn-primary m-1">Back</a>
            </div>

            <!-- Content Row -->
            <div class="container-fluid p-0 d-flex flex-row">
                <div class="col-12 col-sm-8 p-0">
                    <!-- Post Form -->
                    <div class="create-forum col-12 p-0">
                        <div class="card shadow mb-3">
                            <?php $post = viewTopic($_GET['post_id']); ?>
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Update Post</h6>
                            </div> -->
                            <form action="../actions/citizen_update.php" method="POST" class="p-2">
                                <div class="d-flex flex-column">
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Topic</label>
                                        <div class="d-flex align-items-center">
                                            <input class="form-control text-gray-800" type="text" name="topic" value="<?php echo $post['topic']; ?>" placeholder="Enter your topic">
                                        </div>
                                        <?php if (showError('topic')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('topic'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Message</label>
                                        <div class="d-flex align-items-center">
                                            <textarea class="form-control text-gray-800" name="message" placeholder="Enter your message"><?php echo $post['message']; ?></textarea>
                                        </div>
                                        <?php if (showError('message')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('message'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="m-1 mb-2 d-flex justify-content-end">
                                    <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
                                    <input type="hidden" name="user_id" id="" value="<?php echo user_id(); ?>">
                                    <button type="submit" name="update_post" value="update_post" class="button-size form-control btn-primary rounded col-4 col-lg-2 col-md-3 col-sm-4">Update</button>
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