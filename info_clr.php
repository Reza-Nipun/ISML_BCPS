<!--<script type="text/javascript" src="info/jquery.min.js"></script>-->

<!--Here the Avobe requiring of jquery.min.js has no need as it is already call on header.php at :
<script src="bower_components/jquery/jquery.min.js"></script>
But in case of using this page to any where else you must need to call jquery.min.js-->

<script type="text/javascript">
$(document).ready(function()
{
$("#style").change(function()
{
var dis=$(this).val();
var dataString = 'dis='+ dis;

//alert(dataString);

$.ajax
({
type: "POST",
url: "info/ajax_season.php",
data: dataString,
cache: false,
success: function(html)
{
	//alert('Liza');
$("#season").html(html);
} 
});




$.ajax
({
type: "POST",
url: "info/ajax_clr.php",
data: dataString,
cache: false,
success: function(html)
{
$("#color").html(html);
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