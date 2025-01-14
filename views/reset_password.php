<?php
@include('header.php');
?>

<?php if (isset($_SESSION['reset_verified'])) { ?>
    <div class="login-container">
        <div class="col-10 col-md-4 mx-auto mt-5 p-5 rounded border shadow">
            <div class="text-center mx-auto my-2 mb-3">
                <img src="../img/blts.png" alt="" class="img-fluid">
            </div>
            <h4 class="">Enter your new password</h4>
            <form action="../actions/new_password.php" method="POST">
                <div class="m-1">
                    <label class="label" style="font-size: 13px;">New Password</label>
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
                    <input type="hidden" name="email" value="<?php echo $_SESSION['email_address']; ?>">
                    <button type="submit" name="new_password" value="new_password" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Update</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <?php redirect('index'); ?>
<?php } ?>

<?php
@include('footer.php');
?>