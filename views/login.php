<?php
@include 'header.php';
?>

<?php if (!isLogin()): ?>
    <div class="login-container vh-100" style="background: url('../uploads/blts-bg.jpg') no-repeat center center / cover;">
        <div class="col-11 col-md-6 col-lg-4 mx-auto mt-5 mb-5 p-4 p-sm-5 rounded border shadow bg-light">
            <!-- <div class="position-absolute w-100 h-100"
                style="background-color: rgba(0, 0, 0, .25); z-index: 1; border-radius: inherit; top: 0; left: 0;"></div>
            <div class="position-relative" style="z-index: 2;"> -->
                <div class="text-center mx-auto my-2 mb-3">
                    <?php echo (!empty(getSystemSettings()['system_logo'])) ? '<img class="img-fluid" src="' . getSystemSettings()['system_logo'] . '">' : '<img class="img-fluid" src="../uploads/placeholder.png" alt="placeholder">'; ?>
                </div>
                <h4 class="">Login</h4>
                <h5 class="mb-2" style="font-size: 13px;">Please login to continue</h5>
                <form action="../actions/login.php" method="POST">
                    <div class="m-1">
                        <label class="label" style="font-size: 13px;">Username</label>
                        <div class="d-flex align-items-center">
                            <i style="font-size: 14px;"
                                class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                            <input class="form-control" style="text-indent: 21px;" type="text" name="username"
                                value="<?php echo getValue('username'); ?>" placeholder="Enter your username">
                        </div>
                        <?php if (showError('username')): ?>
                            <p class="error text-danger text-start m-0" style="font-size: 12px;">
                                <?php echo showError('username'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="m-1 mb-3">
                        <label class="label" style="font-size: 13px;">Password</label>
                        <div class="d-flex align-items-center">
                            <i style="font-size: 14px;"
                                class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                            <input class="form-control" style="text-indent: 21px;" type="password" name="password"
                                placeholder="Enter your password">
                        </div>
                        <?php if (showError('password')): ?>
                            <p class="error text-danger text-start m-0" style="font-size: 12px;">
                                <?php echo showError('password'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="m-1 mb-4">
                        <button type="submit" name="user_login" class="button-size form-control btn-primary rounded"
                            style="font-size: 14px;">Login</button>
                    </div>
                    <div class="register-container">
                        <span class="">Don't have an account? </span><a class="" href="register.php">Register here</a>
                    </div>
                    <div class="forgot-container">
                        <a class="" href="reset_form.php">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
@include 'footer.php';
?>