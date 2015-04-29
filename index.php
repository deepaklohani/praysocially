<?php
// include init class
require('class/init.php'); 
//Create object for redirect class
$redirect = $init->getRedirect();
//Create object for object class
$users = Users::getInstance();
$limit=6;
//calling function for all Pray 
$prays=$users->showPray($limit);
//create object for session class
$session=$init->getSession();
//Starting Session
$session->startSession();
if($session->__get("limit"))
{
 $session->__unset("limit");   
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <?php include('include/inc.link.php');?></head>
<body>
<?php 
include('include/header.php');
include('include/top_banner_home.php');
?>

<div class="container">
	<div class="prayer_box">
    	<ul id="prayLoad">
            <?php foreach($prays as $pray) { ?>
        	<li>
            	<div class="prayer_content">
                <p> <?php echo $pray['title'];?></p>
                <a href="showPray.php?id=<?php echo $pray['id'] ?>">Read more</a>
                </div>
                <?php if($session->__get("username")) {?>

                <div class="prayer_counter_box">
                	<img src="images/hand.png" alt="" />
                    <p><span class="single_pray" id="<?php echo $pray['id'];?>"><?php echo $count=$users->countPray($pray['id']);?> </span>Prayers</p>
                </div>
                <div class="prayer_btn">
                	<a class="Pray like_prayer" id="<?php echo $pray['id'] ?>"  href="javascript:void(0);" value="<?php echo $pray['id'] ?>">+1 Prayer</a>
                    <a href="javascript:void(0);" class="share_fb"><img src="images/fshare.jpg" alt="" /></a>
                    <div class="clear"></div>
                </div>
                <? } ?>
                
            </li>
        <?php } ?>
        </ul>
        <div class="clear"></div>

        <div class="load_more">
        	<a href="javascript:void(0);" class="loadMore"><i class="fa fa-refresh"></i> Load More</a>
        </div>
    </div>
</div>
<?php include('include/footer.php');?>
<script src="js/ajaxCall.js"></script>
</body>
</html>
