<?php
include("header.php");
?>
<h2 class="center_text">Registration</h2>
<div class="anyform">


<?php
if (isset($message)) 
{echo $message;}
?>

    <form action="/phpmotors/accounts/index.php" method="post"><br>



    <label for="clientFirstname"><b>First Name</b></label>
        <input type="text" placeholder="First Name" name="clientFirstname" class="form_box" id="clientFirstname" 
        <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>required><br>
        

        <label for="clientLastname"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name" name="clientLastname" class="form_box" id="clientLastname" 
        <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>required><br>

        <label for="clientEmail"><b>Email</b></label>
        <input type="email" placeholder="Email Address" name="clientEmail" class="form_box" id="clientEmail"
        <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>required><br>

        <label for="clientPassword"><b>Password</b></label>
        <input type="password" placeholder="Password" name="clientPassword" class="form_box" id="clientPassword" required><br>

        <input type="submit" name="submit" id="submit" value="register">
        <input type="hidden" name="action" value="new_client">
    </form><br>
</div>   
<?php
include("footer.php");
?>