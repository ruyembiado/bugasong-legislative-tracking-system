<?php
@include('header.php');
?>

<div class="login-container">
    <div class="col-10 col-md-4 mx-auto mt-5 p-5 rounded border shadow">
        <div class="text-center mx-auto my-2 mb-3">
            <img src="../img/blts.png" alt="" class="img-fluid">
        </div>
        <h4 class="">Reset your password</h4>
        <h5 class="mb-2" style="font-size: 13px;">Enter the email address you used to register with.</h5>
        <form action="../actions/reset_password.php" method="POST">
            <div class="m-1 mb-2">
                <label class="label" style="font-size: 13px;">Email</label>
                <div class="d-flex align-items-center">
                    <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                    <input class="form-control" style="text-indent: 21px;" type="text" name="email" value="<?php echo getValue('email'); ?>" placeholder="Enter your email address">
                </div>
                <?php if (showError('email')) : ?>
                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('email'); ?></p>
                <?php endif; ?>
            </div>
            <div class="m-1 mb-4">
                <button type="submit" name="reset_password" value="reset_password" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Submit</button>
            </div>
            <div class="register-container">
                <span>Have an account? </span><a href="index.php">Login here</a>
            </div>
        </form>
    </div>
</div>

<?php
@include('footer.php');
?>