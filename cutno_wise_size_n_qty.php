<script type="text/javascript">
$(document).ready(function()
{
$("#CutNo").change(function()
{
var dis=$(this).val();
var dataString = 'dis='+ dis;
//alert(dataString);

$.ajax
({
type: "POST",
url: "info/ajax_cutno_wise_size_n_qty.php",
data: dataString,
cache: false,
success: function(html)
{
$("#search_result").html(html);
} 
});


});
});
</script>

<!--<script type="text/javascript">
$(document).ready(function()
{
$(".city").change(function()
{
var problem=$(this).val();
var dataString = 'problem='+ problem;


$.ajax
({
type: "POST",
url: "info/ajax_city1.php",
data: dataString,
cache: false,
success: function(html)
{
$(".city1").html(html);
} 
});
});
});
</script>-->