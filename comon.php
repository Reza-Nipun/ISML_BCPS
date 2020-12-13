<?php
if( $state == "local" || $state == "testing" )
{
 ini_set( "display_errors", "1" );
 error_reporting( E_ALL & ~E_NOTICE );
}
else
{
 error_reporting( 0 );
}
	session_start();
	//Start the session
	//$sessionUser=$_SESSION['name'];
	//	var_dump($_SESSION['username']);die;
	if(is_null($_SESSION['vsfs_userid']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
	else
	{
   		$vsfs_uid=$_SESSION['vsfs_userid'];
	}
	
	include "db_Class.php";
	$obj = new db_class();
	$obj->MySQL();
	
	$ck_session = '';

	$SQL="select * from tb_admin where sl='$vsfs_uid'";    //table name
	//die($SQL);
	$results = $obj->sql($SQL);
    $ck_session=mysql_num_rows($results);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$rule=$row['rule'];
		$user_unit=$row['unit'];
		
	}
	
	if($ck_session != 1) {
		
		header("location:index.php"); // Redirect to login.php page

		 die("<br /><span style='font-size:20px; font-weight:bold; color:red; margin-left:30px'>Incorrect Parameter !!! Please Log in Again by clicking below link &#10137;
	<br /><br /><a href='index.php' style='margin-left:80px'>Log in to Bundel Cut Management System</a></span>");
	
						 }
	 
	 //Continue to current page
?>