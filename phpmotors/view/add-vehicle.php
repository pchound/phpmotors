<?php
//$dropList = '<select class="drop_down" name="classificationId">';
//$dropList .= '<option value="">Choose a class</option>';
/*foreach ($classifications as $classification)
{
   $dropList .= "<option value = ".urlencode($classification['classificationId']);
   if(isset($classificationId)){
     if($classification['classificationId'] === $classificationId){
       $dropList .= ' selected ';
     }
    }
   $dropList .= ">".urlencode($classification['classificationName']) . "</option>";
}
$dropList .= '</select>';*/




$dropList = '<select class="drop_down" name="classificationId">';
//$dropList .= '<option value="">Choose a class</option>';
foreach ($classifications as $classification)
{
   $dropList .= "<option value='$classification[classificationId]'";
   if(isset($classificationId)){
     if($classification['classificationId'] === $classificationId){
       $dropList .= ' selected ';
     }
    }
   $dropList .= ">$classification[classificationName]</option>";
}
$dropList .= '</select>';
//lil15003@byui.edu
?><?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/header.php';?>








<?php
if (isset($message)) 
{echo $message;}
?>
<h1>Add Vehicle</h1>

<form action="/phpmotors/vehicles/index.php" method="post"><br>

<?php
 echo $dropList;
  echo "<br><br>"
?>

   

    <label for="invMake"><b>Make</b></label>
    <input type="date" id="invMake" name="invMake" 
    <?php if(isset($invMake)){echo "value='$invMake'";}  ?>required><br>

    <label for="invModel"><b>Model</b></label>
    <input type="text" placeholder="Model" name="invModel" class="form_box" id="invModel" maxlength="50" 
    <?php if(isset($invModel)){echo "value='$invModel'";}  ?>required><br>

    <label for="invDescription"><b>Description</b></label>
    <textarea id="invDescription" placeholder="500 character max" name="invDescription" class="form_box" rows="4" cols="50">
    <?php /*if(isset($invDescription))
    {echo"value='$invDescription'";}*/ ?></textarea><br>

    <label for="invImage"><b>Image Path</b></label>
    <input type="text" name="invImage" class="form_box" id="invImage" value="/phpmotors/images/no-image.png" 
    <?php if(isset($invImage)){echo "value='$invImage'";}  ?>required><br>

    <label for="invThumbnail"><b>Image Path</b></label>
    <input type="text" name="invThumbnail" class="form_box" id="invThumbnail" value="/phpmotors/images/no-image.png" 
    <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>required><br>

    <label for="invPrice"><b>Price</b></label>
    <input type="text" placeholder="" name="invPrice" class="form_box" id="invPrice" 
    <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>required><br>

    <label for="invStock"><b>Stock</b></label>
    <input type="number" name="invStock" class="form_box" id="invStock" 
    <?php if(isset($invStock)){echo "value='$invStock'";}  ?>required><br>

    <label for="invColor"><b>Color</b></label>
    <input type="text" placeholder="" name="invColor" class="form_box" id="invColor" 
    <?php if(isset($invColor)){echo "value='$invColor'";}  ?>required><br>

    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="hidden" name="action" value="new_vehicle">
</form><br>


<?php
include("footer.php");
?>