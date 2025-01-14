<?php
@include('header.php');
?>
<?php if (!isLogin()) : ?>
    <div class="login-container">
        <div class="col-10 col-md-4 mx-auto my-4 p-5 rounded border shadow">
            <div class="col-12 text-center my-2 mb-3">
                <img src="../img/blts.png" alt="" class="img-fluid">
            </div>
            <h4 class="">Register</h4>
            <!-- <h5 class="mb-2" style="font-size: 13px;"></h5> -->
            <form action="../actions/register.php" method="POST">
                <div class="m-1">
                    <label class="label" style="font-size: 13px;">Name</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="text" name="name" value="<?php echo getValue('name'); ?>" placeholder="Enter your name">
                    </div>
                    <?php if (showError('name')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('name'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <label class="label" style="font-size: 13px;">Email</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-envelope position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="text" name="email" value="<?php echo getValue('email'); ?>" placeholder="Enter your email">
                    </div>
                    <?php if (showError('email')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('email'); ?></p>
                    <?php endif; ?>
                </div>
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
                <div class="m-1">
                    <label class="label" style="font-size: 13px;">Password</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="password" name="password" placeholder="Enter your password">
                    </div>
                    <?php if (showError('password')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('password'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1 mb-3">
                    <label class="label" style="font-size: 13px;">Confirm Password</label>
                    <div class="d-flex align-items-center">
                        <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                        <input class="form-control" style="text-indent: 21px;" type="password" name="confirm_password" placeholder="Confirm your password">
                    </div>
                    <?php if (showError('confirm_password')) : ?>
                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('confirm_password'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1 mb-4">
                    <button type="submit" name="user_register" value="user_register" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Register</button>
                </div>
                <div class="register-container">
                    <span>Have an account? </span><a href="login.php">Login here</a>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php

@include('footer.php');

?>