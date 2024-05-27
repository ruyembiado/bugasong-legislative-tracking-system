<?php
@include('header.php');
?>

<?php if (!isLogin()) : ?>
    <div class="login-container">
        <div class="col-10 col-md-4 mx-auto mt-5 p-5 rounded border shadow">
            <div class="col-7 mx-auto my-2 mb-3">
                <img src="" alt="" class="img-fluid">
            </div>
            <h4 class="">Login</h4>
            <h5 class="mb-2" style="font-size: 13px;">Please login to continue</h5>
            <form action="../actions/login.php" method="POST">
                <div class="m-1">
                    <label class="label" style="font-size: 13px;">Username</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="text" name="username" value="<?php echo getValue('username'); ?>" placeholder="Enter your username">
                    </div>
                    <?php if (showError('username')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('username'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1 mb-3">
                    <label class="label" style="font-size: 13px;">Password</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="password" name="password" placeholder="Enter your password">
                    </div>
                    <?php if (showError('password')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('password'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1 mb-4">
                    <button type="submit" name="user_login" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Login</button>
                </div>
                <div class="register-container">
                    <span>Don't have an account? </span><a href="register.php">Register here</a>
                </div>
                <div class="forgot-container">
                    <a href="#">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php
@include('footer.php');
?>