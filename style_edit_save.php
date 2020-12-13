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
		$style_des=trim($_POST['style_des']);
		$category=trim($_POST['category']);

		$rowz=0;
		  foreach($_POST['parts'] as $rowz=>$parts)
		  { 
			  $print_flag=$_POST['print'][$rowz];
		  
			$SQL="INSERT INTO `tb_vsfs_part_info` (`PartInfoID`, `StyleCode`, `PartName`, `IsPrint`, `u_id`, `EntryTime`) VALUES ('', '$style', '$parts', '$print_flag', '$vsfs_uid', '$datex')";
			$obj->sql($SQL);
			$rowz ++ ;
		  }
		  			
						
		}
		$msg = 'Cut Information Saved Successfully :)';
  		header("location:cutting_input_print.php?msg=$msg");
				
 ?>