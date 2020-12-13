<?php


	require_once('comon.php');
	
	/*require_once('comon.php');
	
	
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();*/
	
			/*require_once('comon_color.php');
			session_start(); 
			$vsfs_uid=$_SESSION['vsfs_userid'];
			include "db_Class.php";
			$obj = new db_class();
			$obj->MySQL();*/

	
	/*date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");*/
	
		$dateex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
		$dateex->modify('-3600 seconds');									
		$dateex=$dateex->format("Y-m-d H:i:s");
	
if($_POST['style'])
{
	
	
$color=$_POST['color'];
$color=strtoupper($color);

$Clr_OrderQty=trim($_POST['Clr_OrderQty']);

$size=$_POST['size'];
$size=strtoupper($size);

$part=$_POST['part'];
$part=strtoupper($part);


$print_status=$_POST['print_status'];

//if($print_status == 'No') $print_status = 0;
if($print_status == 'Yes') $print_status = 1;
else if($print_status == 'No') $print_status = 0;
else $print_status = 9; // Indicates Error.


/*$print=$_POST['print_status'];
if($print == 'No') $print_status = 0;
if($print == 'Yes') $print_status = 1;*/

$style=$_POST['style'];
$uid=$_POST['uid'];

//$sql = "update tb_admin set name='$firstname',user_name='$lastname' where id='$id'";
//mysql_query($sql);

	if($color != '' && $Clr_OrderQty != '') {
	  $SQL="INSERT INTO `tb_vsfs_color_info` (`ColorInfoID`, `StyleCode`, `Color`, `OrderQty`, `u_id`, `EntryTime`) VALUES ('', '$style', '$color', '$Clr_OrderQty', '$uid', '$dateex')";
	  $obj->sql($SQL);
	}
	
	if($part != '' && $print_status != '') {
	  $SQL="INSERT INTO tb_vsfs_part_info (PartInfoID, StyleCode, PartName, IsPrint, EditBy, EditTime) VALUES ('', '$style', '$part', '$print_status', '$vsfs_uid', '$dateex')";
	  $obj->sql($SQL);
	}
	
	
	if($size != '') {
	  $SQL="INSERT INTO tb_vsfs_size_info (SizeInfoID, StyleCode, size, u_id, EntryTime) VALUES ('', '$style', '$size', '$uid', '$dateex')";
	  $obj->sql($SQL);
	}


}
?>



