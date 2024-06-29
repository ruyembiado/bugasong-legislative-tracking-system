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
                    <h1 class="h3 mb-0 text-gray-800">System Settings</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-body system-logo d-flex p-1 flex-wrap">
                        <div class="col-3 p-2">
                            <label for="">System Logo:</label>
                            <div class="setting mb-2">
                                <?php echo (!empty(getSystemSettings()['system_logo'])) ? '<img width="100px" class="img-fluid" src="' . getSystemSettings()['system_logo'] . '">' : '<img width="100px" class="img-fluid" src="../uploads/placeholder.png" alt="placeholder">'; ?>
                            </div>
                            <form action="../actions/system_setting.php" method="post" enctype="multipart/form-data">
                                <div class="d-flex flex-column">
                                    <input type="file" class="" name="system_logo">
                                    <?php if (showError('system_logo')) : ?>
                                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('system_logo'); ?></p>
                                    <?php endif; ?>
                                    <button class="btn btn-primary mt-2" name="update_logo" value="update_logo">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->

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