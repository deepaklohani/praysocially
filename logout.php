<?php
// include init class
require('class/init.php'); 
//Create object for redirect class
$redirect = $init->getRedirect();
//Create object for object class
$users = Users::getInstance();
//create object for session class
$session=$init->getSession();
//Starting Session
$session->startSession();
//distory all value in session
$session->destroy();

$redirect->redirect("index.php");

?>
