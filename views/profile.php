<?php
include('../config/functions.php');

if (isAdmin()) {
    @include('header.php');
} else {
    @include('citizen_header.php');
}
redirectNotLogin();

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php if (isAdmin()) { ?>
            <?php @include('top_navbar.php'); ?>
        <?php } ?>
        <!-- End of Topbar -->

        <?php if (isMember()) : ?>
            <div class="back-button col-8 mb-3">
                <a href="<?php echo isAdmin() ? 'admin_home.php' : 'citizen_home.php' ?>" class="float-right btn btn-primary m-1"><i class="fas fa-arrow-left"></i></a>
            </div>
        <?php endif; ?>

        <?php if (isAdmin() || isMember()) : ?>
            <!-- Begin Page Content -->

            <div class="container-fluid <?php echo isMember() ? 'd-flex justify-content-center pt-4' : ''; ?>">
                <?php if (isAdmin()) : ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
                <?php endif; ?>

                <!-- Content Row -->
                <div class="card col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 mb-4 px-0">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                    </div>
                    <div class="card-body">
                        <form action="../actions/update_profile.php" method="POST">
                            <?php $user = getUserDataByID($_SESSION['user_id']); ?>
                            <div class="my-1">
                                <label class="label">Name</label>
                                <div class="d-flex align-items-center">
                                    <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                                    <input class="form-control" style="text-indent: 21px;" type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Enter your name">
                                </div>
                                <?php if (showError('name')) : ?>
                                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('name'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="my-1">
                                <label class="label">Email</label>
                                <div class="d-flex align-items-center">
                                    <i style="font-size: 14px;" class="fas fa-envelope position-absolute pl-2 border-end border-secondary"></i>
                                    <input class="form-control" style="text-indent: 21px;" type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter your email">
                                </div>
                                <?php if (showError('email')) : ?>
                                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('email'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="my-1">
                                <label class="label">Username</label>
                                <div class="d-flex align-items-center">
                                    <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                                    <input class="form-control" style="text-indent: 21px;" type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="Enter your username">
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
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <button type="submit" name="update_profile" value="update_profile" class="button-size form-control btn-primary rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Content Row -->

            </div>
            <!-- /.container-fluid -->
        <?php else :
            redirect('dashboard', ''); ?>
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
if (isAdmin() || isMember()) {
    @include('footer.php');
}
?>