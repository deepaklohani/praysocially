<?php
// include init class
require('class/init.php'); 
//Create object for redirect class
$redirect = $init->getRedirect();
//Create object for object class
$users = Users::getInstance();
//calling function for Pray 
if(isset($_GET['id']))
{
    $pray=$users->showPrayByid($_GET['id']);
 //   echo '<pre>';print_r($pray);die;
}else{
    $redirect->redirect("index.php");
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
            	<div class="prayer_content">
                <p><b>Title </b>:- <?php echo $pray['title'];?></p>
                <br>
                <p><b>Pray </b>:- <?php echo $pray['pray'];?></p>
                </div>
                <?php if($_SESSION) {?>

                <div class="prayer_counter_box">
                    <img src="images/hand.png" alt="" />
                    <p><span class="single_pray" id="<?php echo $pray['id'];?>"><?php echo $count=$users->countPray($pray['id']);?> </span>Prayers</p>
                </div>
                <div class="prayer_btn">
                    <a class="Pray like_prayer" id="<?php echo $pray['id'] ?>"  href="#" value="<?php echo $pray['id'] ?>">+1 Prayer</a>
                    <a href="#" class="share_fb"><img src="images/fshare.jpg" alt="" /></a>
                    <div class="clear"></div>

                </div>
                <? } ?>

        <div class="clear"></div>
    </div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
<script>
//add one  pray functionality
jQuery(document).ready(function()
    {
        var pray_id;
        $(".Pray").click(function(e)
        {
            pray_id=this.id;
            var info = 'pray_id=' + pray_id;
            $.ajax({
                type: "POST",
                url: "ajaxCall.php",
                data: info,
                success: function(data)
                {
                     if(data=='true')
                     {
                        prayToday=parseInt($('.todayPray').text());
                        //updatePray=prayToday+1;
                        $('#'+pray_id+'').text(parseInt($('#'+pray_id+'').text())+1);
                        $('.todayPray').text(prayToday+1);
                     } else {
                        alert('already pray');
                        }   
                }
            });
        });
    });
</script>