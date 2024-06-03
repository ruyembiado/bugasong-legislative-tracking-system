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

        <?php if (isAdmin()) : ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add Tag</h1>
                </div>
                <div class="back-button mb-3">
                    <a href="admin_tag.php" class="btn btn-primary">Back</a>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4 col-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tag Information</h6>
                    </div>
                    <div class="card-body">
                        <div id="ocrResults">
                            <?php $tag = getTagByID($_GET['tag_id']) ?>
                            <form id="tagForm" action="../actions/admin_update.php" method="POST" enctype="multipart/form-data">
                                <label class="mt-2" for="TagName">Tag:</label>
                                <input rows="1" class="form-control text-gray-800" id="tag_name" name="tag_name" value="<?php echo $tag['tag_name']; ?>">
                                <?php if (showError('tag_name')) : ?>
                                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('tag_name'); ?></p>
                                <?php endif; ?>

                                <div class="mb-0 mt-2 d-flex justify-content-end">
                                    <input type="hidden" name="tag_id" value="<?php echo $tag['tag_id']; ?>">
                                    <button type="submit" name="update_tag" class="btn btn-primary" value="update_tag">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        <?php else : redirect('dashboard', ''); ?>
        <?php endif; ?>

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