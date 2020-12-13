<?php
include "db_Class.php";
$obj = new db_class();
$obj->MySQL();

// To properly get the config.php file

$username=mysql_real_escape_string($_POST['username']);  //Set UserName   htmlentities()

$password=mysql_real_escape_string($_POST['password']); //Set Password

//$rule=mysql_real_escape_string($_POST['rule']); //Set Password

$msg ='';

if(isset($username, $password)) 
{
    $sql="SELECT count(sl) as aa, sl, password FROM tb_admin WHERE user_name='$username' and password='$password'";
	$result=$obj->sql($sql);
	while($row = mysql_fetch_array($result))
	{
	$uid=$row['sl'];
	$count=$row['aa'];
			
    if($count=='1')

	{
		session_start(); //Start the session
        $_SESSION['vsfs_userid']= $uid;
		
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('d-m-Y');
		$datex->modify('-3600 seconds');					
					
		$datex=$datex->format("d-m-Y H:i:s");
		// include("date_to_month.php");
		
		if($password==123456)
		{
		header("location:forced.php");
		}
		else
		{
        header("location:home.php");
		}
	
	}
     else
	{
	//	echo 'Error' ;
        $msg ="<font color='red'><strong>Wrong Username or Password. Please Retry</strong></font>";
        header("location:index.php?msg=$msg");
    }
    ob_end_flush();
	}
	
	}	
	else
	{
    header("location:index.php?msg=Please enter some username and password");
	}
?>