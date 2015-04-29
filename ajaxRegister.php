<?php
require('./class/init.php');
$user = Users::getInstance();
 	if(isset($_POST['username'])){
    	$array=array('username'=>$_POST['username']);
        $registerCheck=$user->registerCheck($array);
		echo json_encode($registerCheck);
	}
?>