<?php
@include('header.php');

?>
<div class="col-10 col-md-4 mx-auto mt-5 p-5 rounded border shadow">
    <div class="text-center mx-auto my-2 mb-3">
        <img src="../img/blts.png" alt="" class="img-fluid">
    </div>
    <h4 class="">Enter OTP to Reset Your Password</h4>
    <form action="../actions/verify_otp.php" method="POST">
        <div class="m-1 mb-3">
            <label class="label" style="font-size: 13px;">OTP</label>
            <div class="otp-input">
                <input class="form-control" type="text" name="digit1" maxlength="1" required>
                <input class="form-control" type="text" name="digit2" maxlength="1" required>
                <input class="form-control" type="text" name="digit3" maxlength="1" required>
                <input class="form-control" type="text" name="digit4" maxlength="1" required>
                <input class="form-control" type="text" name="digit5" maxlength="1" required>
                <input class="form-control" type="text" name="digit6" maxlength="1" required>
            </div>
        </div>
        <div class="m-1 mb-4">
            <button type="submit" name="verify_otp" value="verify_otp" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Verify OTP</button>
        </div>
    </form>
</div>
<?php

@include('footer.php');
?>