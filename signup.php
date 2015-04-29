<?php
require('class/init.php'); 
//$session = $init->getSession();
$redirect = $init->getRedirect();
//create object for user class
$users = Users::getInstance();
//Getting redirect object
$session=$init->getSession();
//Starting Session
$session->startSession();
//check session  
if($session->__get("username"))
{
      $redirect->redirect("index.php");
}
if(isset($_POST['register'])){
	//if password and confirm password is match 
	if($_POST['password']==$_POST['confirm_password']){
		$array=array('username'=>$_POST['username'],'password'=>$_POST['password'],'email'=>$_POST['email']);
		$login=$users->registration($array);
    if($login==1)
    {
     $redirect->redirect("signin.php");
    }
	}
	
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
$(".registerfrm").validate({
  rules:
  {
    username :{
    required:true
    },
    email :{
    required:true,
	email:true
    },
	password :{
    required:true
    },
    confirm_password:{
    equalTo: "#password"
    },
  },
  messages:
  {
    //email:"Enter Email Address",
    password :{
    required:" Enter Password",
    },
    //confirm_password :" Enter Confirm Password Same as Password",
  }
  
});
	$('.text_success').hide();
	$('#label1').hide();
		$('.username').blur(function (e) { 
			e.preventDefault();
			var data = {};
			data.username=$(".username").val();
			$.ajax({
				type: "POST",
				url: "ajaxRegister.php",
				data: data,
				//cache: false,
				success: function (response) {
					//alert(response);
					if(response=="true"){ alert("username is allready exist ! Please Choose another");
							$(".username").val("");
							$(".username").focus();
							$('.text_success').hide();
							$('#label1').show();
						}
					else{
							$('#label1').hide();
							$('.text_success').show();
					 }
				}
			}); 
		  return false;
	 });
  });
</script>
</head>

<body>
<div class="signup_page">
	<div class="login_register_logo">
    	<a href="#"><img src="images/logo_login.png" alt="" /></a>
    </div>
    <div class="form_box">
    	<h2>Don't have an account!</h2>
        <div class="facebook_btn">
        	<a href="#"><i class="fa fa-facebook"></i> Sign up with Facebook</a>
            <p>-- or --</p>
        </div>
       <form method="post" id="registerfrm" action="" class="registerfrm">
        <div class="form_inr">
        <div class="form_field">
       	  <input type="text" name="username" class="username" placeholder="Username" />
          <i class="fa fa-check text_success"></i>
          </div>
          <div class="form_field">
          <input type="password" name="password" id="password" class="" placeholder="Password" />
         <!--- <i class="fa fa-check text_success"></i>--->
          </div>
          <div class="form_field">
       	  <input type="password" name="confirm_password" class="" placeholder="Confirm Password" />
         <!-- <i class="fa fa-remove text_danger"></i> --->
          </div>
          <div class="form_field">
       	  <input type="text" name="email" id="email" class="" placeholder="Email Address" />
        <!--  <i class="fa fa-exclamation text_warning"></i> -->
          </div>
          <div class="form_btn">
          <input type="submit" name="register" class="" value="Sign up" />
          </div>
           <p>Already have an account? <a href="signin.php">Login!</a></p>
        </div>
    </div>
     </form>
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
