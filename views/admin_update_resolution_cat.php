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
                    <h1 class="h3 mb-0 text-gray-800">Update Resolution Category</h1>
                </div>
                <div class="back-button mb-3">
                    <a href="admin_resolution_category.php" class="btn btn-primary m-1">Back</a>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4 col-12 col-lg-6 col-md-12 col-xl-4 p-0">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                    </div>
                    <div class="card-body">
                        <div id="ocrResults">
                            <?php $res_cat = getResolutionCatByID($_GET['resolution_cat_id']) ?>
                            <form id="tagForm" action="../actions/admin_update.php" method="POST" enctype="multipart/form-data">
                                <label class="mt-2" for="TagName">Category Name:</label>
                                <input rows="1" class="form-control text-gray-800" id="resolution_category_name" name="resolution_category_name" value="<?php echo $res_cat['resolution_category_name']; ?>">
                                <?php if (showError('resolution_category_name')) : ?>
                                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('resolution_category_name'); ?></p>
                                <?php endif; ?>

                                <div class="mb-0 mt-2 d-flex justify-content-end">
                                    <input type="hidden" name="resolution_cat_id" value="<?php echo $res_cat['resolution_cat_id']; ?>">
                                    <button type="submit" name="update_resolution_category" class="btn btn-primary" value="update_resolution_category">Update</button>
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