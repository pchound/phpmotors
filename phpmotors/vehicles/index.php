<?php
//Vehicles controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the PHP Motors model for use as needed
require_once '../model/vehicles-model.php';

require_once '../model/class-model.php';

// Get the functions library
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();



// Build a navigation bar using the $classifications array

$navList = '<ul class="navigation">';
$navList .= "<li class='ham'><a class='ham_link' href='#'><span class='ham_text'>&equiv; MENU</span></a></li>";
$navList .= "<li><a href='/phpmotors/index.php' class='nav_link' title='View the PHP Motors home page'><span class='link_text'>Home</span></a></li>";
foreach ($classifications as $classification) {
$navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName']). "' class='nav_link'  title='View our $classification[classificationName] product line'><span class='link_text'>$classification[classificationName]</span></a></li>";
}
$navList .= '</ul>';


//The drop down classification list
/*$dropList = '<select class="drop_down" name="classificationId">';
$dropList .= '<option value="">Choose a class</option>';
foreach ($classifications as $classification)
{
   $dropList .= "<option value = ".urlencode($classification['classificationId'])."required>".urlencode($classification['classificationName']) . "</option>";
   
}
$dropList .= '</select>';*/


/*$dropList = '<select class="drop_down" name="classificationId">';
$dropList .= '<option value="">Choose a class</option>';
foreach ($classifications as $classification)
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



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
   $action = filter_input(INPUT_GET, 'action');
}


switch ($action)
{



case 'new_vehicle':
   $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
   $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

   //echo $classificationId, "<br>", $invMake, $invModel ,$invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor;

if(empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor))
   {
     /* echo $classificationId, $invMake, $invModel ,$invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor;
      exit;*/
      $message = '<p>Please provide information for all empty form fields.</p>';
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-vehicle.php';
      exit;
   }

$regOutcomeVehicle = regVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);

   if($regOutcomeVehicle === 1)
   {
      $message = "<p>Success!</p>";
      //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/vehicle-management.php';
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-vehicle.php';
      exit;
   }
   else 
   {
      $message = "<p>Registration failed. Please try again.</p>";
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-vehicle.php';
      exit;
   }
   break;






   case 'new_classification':
      $classificationName = filter_input(INPUT_POST, 'classificationName');

      //echo $classificationName;
      
      if(empty($classificationName))
      {
     
         $message = '<p>You must put in a classification name</p>';
         include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-classification.php';
         exit;
      }

      $regClassOutcome = regClass($classificationName);

         if($regClassOutcome === 1)
         {
            //$message = "<p>Success!</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-classification.php';
            //$classificationName = '';
            exit;
         }
         else 
         {
            $message = "<p>Registration failed. Please try again.</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-classification.php';
            exit;
         }
      break;







   case 'add-classification-page':
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-classification.php';
   break;
   
   case 'add-vehicle-page':
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-vehicle.php';
   break;
   
   




default:
   include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/vehicle-management.php';
break;
}

?>