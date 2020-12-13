<?php 

	 require_once('comon.php');
		
	if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == "POST")
 		{
	
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('d-m-Y');
		$datex->modify('-3600 seconds');									
		$datex=$datex->format("d-m-Y H:i:s");
		
		require('date-month.php');
		
		$buyer=trim($_POST['buyer']);
		$style=trim($_POST['style']);
		$season=trim($_POST['season']);
		$item_name=trim($_POST['item_name']);
		
		  //$style_des=trim($_POST['style_des']);
		
		  //$SQL="INSERT INTO `tb_vsfs_style` (`StyleSL`, `StyleCode`, `StyleDesc`, `BuyerID`, `CategorieID`, `u_id`, `EntryDate`, `EntryTime`) VALUES ('', '$style', '$style_des', '$buyer', '$category', '$vsfs_uid', '$date', '$datex')";
		  $SQL="INSERT INTO `tb_vsfs_style` (`StyleSL`, `StyleCode`, `season`, `Item`, `BuyerID`, `u_id`, `EntryDate`, `EntryTime`) VALUES ('', '$style', '$season', '$item_name', '$buyer', '$vsfs_uid', '$date', '$datex')";
		  $obj->sql($SQL);


		  $rowz=0;
		  foreach($_POST['color'] as $rowz=>$color)
		  { 
			$color=strtoupper($color);
			$order_qty=trim($_POST['order_qty'][$rowz]);
			
			$SQL="INSERT INTO `tb_vsfs_color_info` (`ColorInfoID`, `StyleCode`, `Color`, `OrderQty`, `u_id`, `EntryTime`) VALUES ('', '$style', '$color', '$order_qty', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  

		  $rowz=0;
		  foreach($_POST['parts'] as $rowz=>$parts)
		  { 			  
			//$RadioGroup1 = mysql_real_escape_string($_POST['RadioGroup1'][$rowz]) ;
			$parts=strtoupper($parts);
			$print_flag=$_POST['RadioGroup1'][$rowz];
		  
			$SQL="INSERT INTO `tb_vsfs_part_info` (`PartInfoID`, `StyleCode`, `PartName`, `IsPrint`, `u_id`, `EntryTime`) VALUES ('', '$style', '$parts', '$print_flag', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  
		  
		  $rowz=0;
		  foreach($_POST['size'] as $rowz=>$size)
		  { 
			$size=strtoupper($size);
			$SQL="INSERT INTO tb_vsfs_size_info (SizeInfoID, StyleCode, size, u_id, EntryTime) VALUES ('', '$style', '$size', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  
		  			
						
		}
		
		$msg = 'Style: '.$style.' has been Created Successfully :)';
  		header("location:create_style.php?msg=$msg");
		
  		// header("location:cutting_input_print.php?msg=$msg");
				
 ?>