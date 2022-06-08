<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/header.php'; ?>
<h2 class="center_text">Login</h2>
<div class = "anyform">

<?php
if (isset($message)) 
{echo $message;}
?>
    <form method="POST"><br>

        <label for="clientEmail"><b>Email</b></label>
        <input type="text" placeholder="Email Address" name="clientEmail" class="form_box" id="clientEmail"
        <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required><br>

        <label for="clientPassword"><b>Password</b></label>
        <input type="password" placeholder="Password" name="clientPassword" class="form_box" id="clientPassword" required><br>

        <input type="submit" name="submit" id="submit" value="Submit">
        <input type="hidden" name="action" value="login">
    </form><br>
    Don't have an account?<br>
    <a href= "/phpmotors/accounts/index.php?action=register_page">Register</a>
</div>

<?php
include("footer.php");
?>