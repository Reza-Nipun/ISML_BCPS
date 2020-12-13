<?php 

	 require_once('comon.php');
		
	if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == "POST")
 		{
	
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('d-m-Y');
		$datex->modify('-3600 seconds');									
		$datex=$datex->format("d-m-Y H:i:s");
		
		require('date-month.php');
		
		$buyer=$_POST['buyer'];
		$style=trim($_POST['style']);
		$season=trim($_POST['season']);
		$style_sl=trim($_POST['style_sl']);
		
		
		if($style_sl != '')
		{
		$SQL="UPDATE `tb_vsfs_style` SET StyleCode = '$style', season = '$season', BuyerID = '$buyer' WHERE StyleSL = '$style_sl' ";
	  	$obj->sql($SQL);
		
		$SQL = "DELETE FROM `tb_vsfs_color_info` WHERE StyleCode = '$style'";
		$obj->sql($SQL);
		
		$SQL = "DELETE FROM `tb_vsfs_part_info` WHERE StyleCode = '$style'";
		$obj->sql($SQL);
		
		$SQL = "DELETE FROM tb_vsfs_size_info WHERE StyleCode = '$style'";
		$obj->sql($SQL);
		}
		
		
		  foreach($_POST['color'] as $rowz=>$color)
		  { 
			$color=strtoupper($color);
			$order_qty=trim($_POST['order_qty'][$rowz]);
			
			$SQL="INSERT INTO `tb_vsfs_color_info` (`ColorInfoID`, `StyleCode`, `Color`, `OrderQty`, `u_id`, `EntryTime`) VALUES ('', '$style', '$color', '$order_qty', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
		  }
		  

		  foreach($_POST['parts'] as $rowz=>$parts)
		  { 			  
			$parts=strtoupper($parts);
			$print_flag=$_POST['RadioGroup1'][$rowz];
		  
			$SQL="INSERT INTO `tb_vsfs_part_info` (`PartInfoID`, `StyleCode`, `PartName`, `IsPrint`, `u_id`, `EntryTime`) VALUES ('', '$style', '$parts', '$print_flag', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
		  }
		  

		  foreach($_POST['size'] as $rowz=>$size)
		  { 
			$size=strtoupper($size);
			$SQL="INSERT INTO tb_vsfs_size_info (SizeInfoID, StyleCode, size, u_id, EntryTime) VALUES ('', '$style', '$size', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
		  }
		
		
		
	  
	  /*$SQL="UPDATE `tb_vsfs_style` SET StyleCode = '$style', BuyerID = '$buyer' WHERE StyleSL = '$style_sl' ";
	  $obj->sql($SQL);
	  
		  $rowz=0;
		  foreach($_POST['color'] as $rowz=>$color)
		  { 
		  	$color_sl = $_POST['color_sl'][$rowz];
			$color=strtoupper($color);
			$SQL="UPDATE `tb_vsfs_color_info` SET `StyleCode` = '$style', `Color` = '$color', EditBy = '$vsfs_uid', EditTime = '$datex' WHERE ColorInfoID = '$color_sl'";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  

		  $rowz=0;
		  foreach($_POST['parts'] as $rowz=>$parts)
		  { 			  
			$parts=strtoupper($parts);
			$print_flag=$_POST['RadioGroup1'][$rowz];
			$part_sl=$_POST['part_sl'][$rowz];
		  
			$SQL="UPDATE `tb_vsfs_part_info` SET `StyleCode` = '$style', `PartName` = '$parts', `IsPrint` = '$print_flag', EditBy = '$vsfs_uid', EditTime = '$datex' WHERE PartInfoID = '$part_sl'";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  
		  
		  $rowz=0;
		  foreach($_POST['size'] as $rowz=>$size)
		  { 
		  	$size_sl = $_POST['size_sl'][$rowz];
			$size=strtoupper($size);
			$SQL="UPDATE tb_vsfs_size_info SET `StyleCode` = '$style', size = '$size', EditBy = '$vsfs_uid', EditTime = '$datex' WHERE SizeInfoID = '$size_sl'";
			$obj->sql($SQL);
			$rowz ++ ;
		  }*/
		  
		  
		  
		  			
						
		}
		
		$msg = 'Style: '.$style.' has been Updated Successfully :)';
  		header("location:create_style.php?msg=$msg");
		
  		// header("location:cutting_input_print.php?msg=$msg");
				
 ?>