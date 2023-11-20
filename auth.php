<form name="frmUser" method="post" action="myauth.php">
    <div class="tblLogin">
        <?php
        $message = null;
        if (isset($_REQUEST['message'])) {
            $message = $_REQUEST['message'];
        }
        if ($message) {
            ?>
            <p style="color:red;">
                <?php echo $message; ?>
            </p>
        <?php } ?>
        <div class="tableheader">Enter Your OTP</div>
        <input type="hidden" id="token" name="token" readonly value="<?php echo $_REQUEST['token']; ?>"><br/>
        <div class="tablerow"><input type="number" name="otp" class="login-input" required></div>
        <div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div>
    </div>
</form>