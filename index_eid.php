
<?php
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();

	$no_visible_elements = true;
	include('header.php');
	
	$msg = $_GET['msg'];
?>




     <script type='text/javascript' src='../EID/jquery-1.9.1.js'></script>
  <style type='text/css'>
    a {
    text-decoration:none;
    color:#00c6ff;
}
h1 {
    font: 4em normal Arial, Helvetica, sans-serif;
    padding: 20px;
    margin: 0;
    text-align:center;
}
h2 {
    color:#bbb;
    font-size:2em;
    text-align:center;
    text-shadow:0 1px 3px #161616;
}
#login-box
{
	height:461px;
	width:829px;	
}
#mask {
    display: none;
    background: #000;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}
.login-popup {
    display:none;
    background: #fff;
	background-image:url(../EID/Eid-Al-Adha-Mubarak-2016.png);
	background-repeat:no-repeat ;
    padding: 10px;
    border: 2px solid #ddd;
    float: left;
    font-size: 1.2em;
    position: fixed;
    top: 50%;
    left: 50%;
    z-index: 99999;
    box-shadow: 0px 0px 20px #999;
    -moz-box-shadow: 0px 0px 20px #999;
    /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999;
    /* Safari, Chrome */
    border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px;
    /* Firefox */
    -webkit-border-radius: 3px;
    /* Safari, Chrome */
}
img.btn_close {
    float: right;
    margin: -27px -28px 0 1px;
}


/*.close
{ width:45px; }*/


  </style>
  
  <script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
// Getting the variable's value from a link 
var loginBox = $('.login-window').attr('href');

//Fade in the Popup and add close button
$(loginBox).fadeIn(300);

//Set the center alignment padding + border
var popMargTop = ($(loginBox).height() + 24) / 2;
var popMargLeft = ($(loginBox).width() + 24) / 2;

$(loginBox).css({
    'margin-top': -popMargTop,
        'margin-left': -popMargLeft
});

// Add the mask to body
$('body').append('<div id="mask"></div>');
$('#mask').fadeIn(300);



// When clicking on the button close or the mask layer the popup closed
$('a.close, #mask').on('click', function () {
    $('#mask , .login-popup').fadeOut(300, function () {
        $('#mask').remove();
    });
    return false;
});
});//]]>  

</script>
    


<div class="btn-sign">
    <a href="#login-box" class="login-window"></a>
</div>
<div id="login-box" class="login-popup"> 
<a href="#" class="close"><img src="../EID/close_pop1.png" class="btn_close" title="Close Window" alt="Close" /></a>
     <h2 style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif">  &nbsp; &nbsp;
      <script>

/*
RAINBOW TEXT Script by Matt Hedgecoe (c) 2002
Featured on JavaScript Kit
For this script, visit http://www.javascriptkit.com
*/

// ********** MAKE YOUR CHANGES HERE

var text="" // YOUR TEXT
//var text="**VIYELLATEX group Service Desk**" // YOUR TEXT
var speed=120 // SPEED OF FADE

// ********** LEAVE THE NEXT BIT ALONE!


if (document.all||document.getElementById){
document.write('<span id="highlight">' + text + '</span>')
var storetext=document.getElementById? document.getElementById("highlight") : document.all.highlight
}
else
document.write(text)
//var hex=new Array("00","14","28","3C","50","64","78","8C","A0","B4","C8","DC","F0")
var hex=new Array("00","CC","CF","FP","50","64","78","8C","A0","B4","C8","DC","F0")
var r=1
var g=1
var b=1
var seq=1
function changetext(){
rainbow="#"+hex[r]+hex[g]+hex[b]
storetext.style.color=rainbow
}
function change(){
if (seq==6){
b--
if (b==0)
seq=1
}
if (seq==5){
r++
if (r==12)
seq=6
}
if (seq==4){
g--
if (g==0)
seq=5
}
if (seq==3){
b++
if (b==12)
seq=4
}
if (seq==2){
r--
if (r==0)
seq=3
}
if (seq==1){
g++
if (g==12)
seq=2
}
changetext()
}
function starteffect(){
if (document.all||document.getElementById)
flash=setInterval("change()",speed)
}
starteffect()
</script> </h2> 
    <!--<p>How to load it on page load event?</p>-->
</div>






    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Bundle Cut Printing Solution</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
            <?php if($msg != '') { echo $msg; } else { ?>
				Please login with your Username and Password.
			<?php } ?>
            </div>
            <form class="form-horizontal" action="check_login.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                 <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button name="Submit" type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
<?php require('footer.php'); ?>