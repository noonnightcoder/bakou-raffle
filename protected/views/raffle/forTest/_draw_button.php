<div id="ticket_button">
    <?php echo TbHtml::button('Click Me!'); ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#ticket_button").click(function(){
            $.ajax({url: "PickupTicket", success: function(result){
                //alert(result);
            }});
        });
    });
</script>
