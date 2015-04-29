<?php
// include init class
require('class/init.php'); 
//Create object for redirect class
$redirect = $init->getRedirect();
//create object for session class
$session=$init->getSession();
//Starting Session
$session->startSession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('include/inc.link.php');?>
</head>

<body>
<?php include('include/header.php');?>
<div class="container">
	<div class="aboutus_content">
	<h2 class="page_heading">About Us</h2>
    <div class="content_left">
    <h3>Sed ut perspiciatis unde omnis</h3>
    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
    <h3>Quis autem vel eum iure reprehenderit</h3>
    <p>Sed vitae tempus metus. Nulla erat diam, rutrum tempus purus eget, suscipit malesuada tortor. Sed sodales auctor dolor in viverra. Suspendisse sagittis tincidunt ultrices. Phasellus vehicula augue non quam pellentesque hendrerit. Cras ut bibendum leo. Nulla auctor, libero eget posuere ultricies, mi mauris porta mauris, ultrices posuere nibh nisi et nunc. Fusce eget odio vel ex auctor suscipit. Vestibulum sed nulla molestie, vulputate dui ac, sollicitudin mi. Aliquam sagittis eros et felis eleifend, quis pellentesque magna facilisis.</p>
    </div>
    <div class="content_right">
    	<img src="images/jesus.jpg" alt="" />
    </div>
    <div class="clear"></div>
    </div>
</div>
<?php include('include/footer.php');?>
</body>
</html>