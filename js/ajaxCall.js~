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
    $('.loadMore').click(function(){
    $.ajax({
        type: "POST",
        url: "ajaxCall.php",
        data: "loadMore=6",
        success: function(data)
        {
            $('#prayLoad').html(data);
        }
    });
});

