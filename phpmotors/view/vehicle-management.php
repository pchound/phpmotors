<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/header.php'; ?>
<?php
if (isset($message)) 
{echo $message;}
?>
  <a href = "/phpmotors/vehicles/index.php?action=add-classification-page">Add classification</a>
  <a href = "/phpmotors/vehicles/index.php?action=add-vehicle-page">Add vehicle</a>

<?php
include("footer.php");
?>