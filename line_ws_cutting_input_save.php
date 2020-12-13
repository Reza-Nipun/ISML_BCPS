<?php 

	 require_once('comon.php');
	
		$msg = 'Error!!! :)';
		
	if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == "POST")
 		{
	
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('d-m-Y');
		$datex->modify('-3600 seconds');									
		$datex=$datex->format("d-m-Y H:i:s");
		
		//die("Sorry!!! Please wait a while.");
		
		require('date-month.php');
		
		$ln=trim($_POST['line']);
		$line_m=explode("~", $ln);
		$unit = $line_m[0];
		$floor = $line_m[1];
		$line = $line_m[2];
		
		
		$stl=trim($_POST['style']);
		$style_m=explode("~", $stl);
		$buyer = $style_m[0];
		//$style = $style_m[1]; // This line is commented out as the style has catched from CutNo.
		//$OrderNo = $style_m[2];
		
		
		/*$style = $style_m[1];
		
		$clr=trim($_POST['color']);
		$color_m=explode("~", $clr);
		$color = $color_m[1];*/


		//$data = $style.'~'.$color.'~'.$row2['Clr_OrderQty'].'~'.$row2['CutNo'].'~'.$row2['OrderNo'];

		$CtNo=trim($_POST['CutNo']);
		$CutNo_m=explode("~", $CtNo);
		
		$style = $CutNo_m[0];
		$color = $CutNo_m[1];
		$Clr_OrderQty = $CutNo_m[2];
		$CutNo = $CutNo_m[3];
		$OrderNo = $CutNo_m[4];
		
		
		$InputMan=trim($_POST['InputMan']);
		//die($InputMan);
		
		
		  $SQL_TrackID = "SELECT MAX(track_id)+1 AS 'auto_TrackID' FROM tb_vsfs_line_input";
		  $results_TrackID = $obj->sql($SQL_TrackID);
		  while($row_TrackID = mysql_fetch_array($results_TrackID))
		  { $auto_TrackID = $row_TrackID['auto_TrackID']; } // May be it also can do with $SQL ;
		
		
		//$SQL="INSERT INTO `tb_vsfs_style` (`StyleSL`, `StyleCode`, `BuyerID`, `u_id`, `EntryDate`, `EntryTime`) VALUES ('', '$style', '$buyer', '$vsfs_uid', '$date', '$datex')";
		
		$SQL="INSERT INTO tb_vsfs_line_input (`sl`, `track_id`, `line`, `buyer`, `StyleCode`, `Color`, `Clr_OrderQty`, `CutNo`, `OrderNo`, `input_man`, `floor`, `unit`, `u_id`, `entry_date`, `entry_time`) VALUES ('', '$auto_TrackID', '$line', '$buyer', '$style', '$color', '$Clr_OrderQty', '$CutNo', '$OrderNo', '$InputMan', '$unit', '$floor', '$vsfs_uid', '$date', '$datex')";
		//die($SQL);
		$obj->sql($SQL);
		

		  foreach($_POST['input_qty'] as $rowz=>$input_qty)
		  { 
			$input_qty = trim($input_qty);
			
			if($input_qty != '') 
			{
			$size=$_POST['size'][$rowz];
			$size_ttl=$_POST['size_ttl'][$rowz];
			
			$SQL="INSERT INTO `tb_vsfs_line_input_qty` (`sl`, `track_id`, `size`, `cutting_qty`, `input_qty`) VALUES ('', '$auto_TrackID', '$size', '$size_ttl', '$input_qty')";
		    //die($SQL);
			$obj->sql($SQL);
			}
		  }
		  
		$msg = 'Line wise Cutting input against Cut No: '.$CutNo.' has been saved Successfully :)';

		}
		
  		header("location:line_ws_cutting_input.php?msg=$msg");
		
  		// header("location:cutting_input_print.php?msg=$msg");
				
 ?>