<?php
require('./class/init.php');
//object for session class
    $session=$init->getSession();
    //Starting Session
    $session->startSession();
	$user = Users::getInstance();

 	if (isset($_POST['pray_id'])){
        $success=$user->addPray($_POST['pray_id'],$session->__get("id"));
		echo json_encode($success);
	}
	if (isset($_POST['todayPray']))
	{
		$success=$user->todayPray();
		echo $success['COUNT(id)'];
	}
//button call lode more ushing ajax
	if (isset($_POST['loadMore']))
	{

		if(!($session->__get("limit"))){ 
		 $limit=6;

		$limit =$limit+$_POST['loadMore'];
		//set limit in session
		$session->__set("limit",$limit);
	}
	else
	{
		$limit =$session->__get("limit")+$_POST['loadMore'];
		//set limit in session
		$session->__set("limit",$limit);
	}
		//calling function for all Pray 
		$prays=$user->showPray($session->__get("limit"));
		?>
		  <?php foreach($prays as $pray) { ?>
        	<li>
            	<div class="prayer_content">
                <p> <?php echo $pray['title'];?></p>
                <a href="showPray.php?id=<?php echo $pray['id'] ?>">Read more</a>
                </div>
                <?php if($session->__get("username")) {?>

                <div class="prayer_counter_box">
                	<img src="images/hand.png" alt="" />
                    <p><span class="single_pray" id="<?php echo $pray['id'];?>"><?php echo $count=$user->countPray($pray['id']);?> </span>Prayers</p>
                </div>
                <div class="prayer_btn">
                	<a class="Pray like_prayer" id="<?php echo $pray['id'] ?>"  href="#" value="<?php echo $pray['id'] ?>">+1 Prayer</a>
                    <a href="javascript:void(0);" class="share_fb"><img src="images/fshare.jpg" alt="" /></a>
                    <div class="clear"></div>
                </div>
                <? } ?>
                
            </li>


        <?php } ?>
        <script src="js/ajaxCall.js"></script>
<?php
	}

?>
