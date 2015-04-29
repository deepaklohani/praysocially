<?php
require('./class/init.php');
//create object for session class
$session=$init->getSession();
//Starting Session
$session->startSession();
//create object for user class
$user = Users::getInstance();
 	if(isset($_POST['username'])){ 
    	$array=array('username'=>$_POST['username'],'password'=>$_POST['password']);
        $login=$user->login($array);
		$session->__set("id",$login['id']);
		$session->__set("username",$login['username']);
		$session->__set("email",$login['email']);
		if($login)
		{
			$success=true;
		}
		else{
			$success=false;
		}
		echo json_encode($success);
	}
?>