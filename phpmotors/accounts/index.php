<?php
//Accounts controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul class="navigation">';
$navList .= "<li class='ham'><a class='ham_link' href='#'><span class='ham_text'>&equiv; MENU</span></a></li>";
$navList .= "<li><a href='/phpmotors/index.php' class='nav_link' title='View the PHP Motors home page'><span class='link_text'>Home</span></a></li>";
foreach ($classifications as $classification) 
{
   $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName']). "' class='nav_link'  title='View our $classification[classificationName] product line'><span class='link_text'>$classification[classificationName]</span></a></li>";
}
$navList .= '</ul>';

//Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
$action = filter_input(INPUT_GET, 'action');
}  





   switch ($action)
   {
            case 'new_client':
               
               $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
               $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
               $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
               $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

               //Calling verification functions
               $clientEmail = checkEmail($clientEmail);
               $checkPassword = checkPassword($clientPassword);


               // Check for missing data
               if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) 
               {
                  $message = '<p>Please provide information for all empty form fields.</p>';
                  include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/register.php';
                  exit; 
               }

               // Hash the checked password
               $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

               // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);


               // Check and report the result
               if($regOutcome === 1)
               {
                  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
                  include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
                  exit;
               } 
               else 
               {
                  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
                  include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/register.php';
                  exit;
               }
               break;
            

      case 'login':
         case 'new_client':
         
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            //Calling verification functions
            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);


            // Check for missing data
            if (empty($clientEmail) || empty($checkPassword)) 
            {
               $message = '<p>Please provide information for all empty form fields.</p>';
               include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
               exit; 
            }
         break;

      
            case 'login_page':
               include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
            break;
      
            case 'register_page':
               include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/register.php';
            break;



      default:
         include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
      break;
   }
?>