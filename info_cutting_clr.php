<!--This Script id same as info_clr except url: "info/ajax_cutting_clr.php"
This is required as in ajax_clr data comes from tb_vsfs_color_info BUT While searching Already Cut Panels Data
I need to search from tb_vsfs_cut_info.-->

<script type="info/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#style").change(function()
{
var dis=$(this).val();
var dataString = 'dis='+ dis;



$.ajax
({
type: "POST",
url: "info/ajax_cutting_season.php",
data: dataString,
cache: false,
success: function(html)
{
$("#season").html(html);
} 
});





$.ajax
({
type: "POST",
url: "info/ajax_cutting_clr.php",
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