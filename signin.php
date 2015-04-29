<?php
require('./class/init.php');
	//Creating object of user entity
    $user    = Users::getInstance();
    //Getting redirect object
    $redirect=$init->getRedirect();
    //Getting redirect object
    $session=$init->getSession();
    //Starting Session
    $session->startSession();
    //check session  
    //echo '<pre>';print_r($_SESSION);die("aa");
    if($session->__get("username"))
    {
      $redirect->redirect("index.php");
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Praysocially ::</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

		$('.login').click(function (e) { 
			e.preventDefault();
			var data = {};
			data.username=$(".username").val();
			data.password=$(".password").val();
			
			$.ajax({
				type: "POST",
				url: "ajaxSignin.php",
				data: data,
				//cache: false,
				success: function (response) {
					//alert(response);
					if(response=="true"){
            window.location.replace("index.php"); 
           }
					else{
							alert("please enter Valid username and password")
					 }
				}
			}); 
		  return false;
	 });
  });
</script>

</head>

<body>
<div class="signin_page">
	<div class="login_register_logo">
    	<a href="#"><img src="images/logo_login.png" alt="" /></a>
    </div>
    <div class="form_box">
    	<h2>Already have an account!</h2>
        <div class="facebook_btn">
        	<a href="#"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
            <p>-- or --</p>
        </div>
        <form method="post" action="" id="signinfrm">
        <div class="form_inr">
        <div class="form_field">
       	  <input type="text" class="username" placeholder="Username" name="username" required/>
          </div>
          <div class="form_field">
          <input type="password" class="password" name="password" placeholder="Password" required/>
          </div>
          <div class="form_btn">
          <input type="submit" class="login" name="login" id="login" value="Sign in" />
          </div>
           <p>Don't have an account? <a href="signup.php">Register Now!</a></p>
        </div>
        </form>
    </div>
    <div class="footer">
    	<div class="left_link">Copyright &copy; PraySocially.com 2015 – All Rights Reserved</div>
        <div class="right_link">
        	<a href="#">Terms of Use</a>
            <a href="#">Press</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>
