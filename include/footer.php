<div class="footer">
	<div class="container">
    	<div class="ftr_left">
        	<p>Copyright © PraySocially.com 2015 – All Rights Reserved</p>
        </div>
        <div class="ftr_right">
        	<ul>
            	<li><a href="#">Terms of Use</a></li>
                <li><a href="#">Press</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
//add one  pray functionality
jQuery(document).ready(function()
    {

    var info = 'todayPray=todayPray';
    $.ajax({
        type: "POST",
        url: "ajaxCall.php",
        data: info,
        success: function(data)
        {
            $(".todayPray").text(data);
        }
    });
});
</script>
