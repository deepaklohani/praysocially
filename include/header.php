<div class="header">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<div class="container">
    	<div class="logo">

        	<a href="index.php"><img src="images/logo.png" alt="" /></a>
        </div>
        </a>
        <div class="navigation">
        	<div class="btn_top">
            	<ul>
                <?php  if(isset($_SESSION['username'])){
                    ?>
                    <li><a href="<?=BASE_URL?>/pray.php" class="secondary">Add New Pray</a></li>
                	<li><a href="<?=BASE_URL?>/logout.php" class="primarybtn">Logout</a></li>
                    <?php }else{ ?>
                    <li><a href="<?=BASE_URL?>/signin.php" class="primarybtn">login</a></li>
                    <li><a href="<?=BASE_URL?>/signup.php" class="secondary">Register</a></li>
                    <?php }?>

                </ul>
            </div>
            <div class="clear"></div>
            <div class="btmnavigation">
            	<ul>
                	<li><a href="index.php">home</a></li>
                    <li><a href="about.php">about</a></li>
                    <li><a href="#">my profile</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>