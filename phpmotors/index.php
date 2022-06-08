<?php
//Main controller

   $action = filter_input(INPUT_POST, 'action');
   if ($action == NULL)
   {
      $action = filter_input(INPUT_GET, 'action');
   }

// Get the database connection file
require_once 'library/connections.php';

// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';


// Get the array of classifications
$classifications = getClassifications();


$navList = '<ul class="navigation">';
$navList .= "<li class='ham'><a class='ham_link' href='#'><span class='ham_text'>&equiv; MENU</span></a></li>";
$navList .= "<li><a href='/phpmotors/index.php' class='nav_link' title='View the PHP Motors home page'><span class='link_text'>Home</span></a></li>";
foreach ($classifications as $classification) {
$navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName']). "' class='nav_link'  title='View our $classification[classificationName] product line'><span class='link_text'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';


   switch ($action)
   {
      default:
      include 'view/home.php';
   }


?>