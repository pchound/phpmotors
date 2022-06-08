<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/header.php'; ?>
<?php
if (isset($message)) 
{echo $message;}
?>
<h1>Add Classification</h1>

<form action="/phpmotors/vehicles/index.php" method="post">
    <label for="classificationName"><b>New Classification</b></label>
    <input type="text" name="classificationName" class="form_box" id="classificationName"
    <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?> required>
    <br>
    <input type="submit" name="submit" id="submit" value="new_classification">
<input type="hidden" name="action" value="new_classification">
</form>




<?php
include("footer.php");
?>