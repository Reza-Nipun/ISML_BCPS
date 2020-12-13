<script type="info/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#buyer").change(function()
{
var dis=$(this).val();
var dataString = 'dis='+ dis;

$.ajax
({
type: "POST",
url: "info/ajax_style.php",
data: dataString,
cache: false,
success: function(html)
{
// alert('Hello World !!!');
$("#style").html(html);
} 
});


});
});
</script>