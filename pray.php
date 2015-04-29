<?php
// include init class
require('class/init.php'); 
//Create object for redirect class
$redirect = $init->getRedirect();
//Create object for object class
$users = Users::getInstance();

if((isset($_POST['submit'])) and (!empty($_POST['title'])) and (!empty($_POST['pray'])))
    {
        $array=array('title'=>$_POST['title'],'pray'=>$_POST['pray']);
        $success=$users->pray($array);
    }else{


    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('include/inc.link.php');?>
    <script src="ckeditor.js"></script>
    <link rel="stylesheet" href="sample.css">
</head>
<body>
    <?php include('include/header.php');?>
    <div class="container">
    	<div class="aboutus_content">
    	<h2 class="page_heading">Pray</h2>
            <div class="content_left">
            <form name='' method="post">
             <table class="table table-striped">
                <tr>
                    <td width='70'>Title</td>
                    <td><input name="title" value="" type="text" class="primarybtn" placeholder="title" required></td>
                </tr>
                <tr>
                    <td>Pray</td>
                    <td><textarea class="ckeditor"  id="editor1" name="pray" required> </textarea></td>
                </tr>
                <tr>
                <td><a href="<?=BASE_URL?>/signup.php" class="primarybtn" width="48">Back</a> </td>
                <td><input name="submit" value="ADD PRAY" type="submit" class="secondary"></td>

                </tr>

            </table>
            </form>
            </div>
            <div class="clear">

            </div>
            </div>
    </div>
    <?php include('include/footer.php');?>
</body>
</html>