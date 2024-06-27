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
                    <h1 class="h3 mb-0 text-gray-800">Add User</h1>
                </div>
                <div class="back-button mb-3">
                    <a href="admin_user_management.php" class="btn btn-primary">Back</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
                            </div>
                            <div class="card-body">
                                <form action="../actions/admin_add.php" method="POST">
                                    <div class="my-1">
                                        <label class="label">Name</label>
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                                            <input class="form-control" style="text-indent: 21px;" type="text" name="name" value="<?php echo getValue('name'); ?>" placeholder="Enter your name">
                                        </div>
                                        <?php if (showError('name')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('name'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="my-1">
                                        <label class="label">Email</label>
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 14px;" class="fas fa-envelope position-absolute pl-2 border-end border-secondary"></i>
                                            <input class="form-control" style="text-indent: 21px;" type="text" name="email" value="<?php echo getValue('email'); ?>" placeholder="Enter your email">
                                        </div>
                                        <?php if (showError('email')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('email'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="my-1">
                                        <label class="label">Username</label>
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                                            <input class="form-control" style="text-indent: 21px;" type="text" name="username" value="<?php echo getValue('username'); ?>" placeholder="Enter your username">
                                        </div>
                                        <?php if (showError('username')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('username'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="my-1">
                                        <label class="label">Password</label>
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                                            <input class="form-control" style="text-indent: 21px;" type="password" name="password" placeholder="Enter your password">
                                        </div>
                                        <?php if (showError('password')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('password'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="my-1 mb-3">
                                        <label class="label">Confirm Password</label>
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                                            <input class="form-control" style="text-indent: 21px;" type="password" name="confirm_password" placeholder="Confirm your password">
                                        </div>
                                        <?php if (showError('confirm_password')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('confirm_password'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="my-1 mb-4">
                                        <button type="submit" name="add_user" value="add_user" class="button-size form-control btn-primary rounded">Register</button>
                                    </div>
                                </form>
                            </div>
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