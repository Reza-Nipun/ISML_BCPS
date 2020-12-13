<?php 

// die('I am in Tube Save Page');

// May be OK but need to Ck tommorow !!!

require_once('comon.php');
	
if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == "POST")
	{

	$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
	$date=$datex->format('d-m-Y');
	$datex->modify('-3600 seconds');									
	$datex=$datex->format("d-m-Y H:i:s");
	  
	  $entry_date = $_POST['entry_date'];

	  $stylem=mysql_real_escape_string($_POST['style']);
	  $stylem = explode("~", $stylem);
	  $style = $stylem[0];
	  $buyer = $stylem[1];
	  
	  $color = $_POST['color'];
	  $cut_id = trim($_POST['cut_id']);
	  $cut_id=strtoupper($cut_id);
	  $lay = trim($_POST['lay']);
	  $order_no = trim($_POST['order_no']);
	  $order_no = strtoupper($order_no);
	  $unit = $_POST['unit'];
	  
	  //$ins_lot = $_POST['ins_lot'];
	  $IsTube = $_POST['IsTube'];
	  
	 // die($IsTube);

	  $auto_CutID = $_POST['auto_CutID'];
	  
	 /*foreach($_POST['part_info'] as $part_row=>$part_info)
	  { echo $part_row.' == '.$part_info.'<br/><br/>'; }
	  die('Okay, Bye. <br/> Assalamu Alikum !!!');*/
	  
	  
	  if($auto_CutID != '')
	  {
		$SQL = "UPDATE tb_vsfs_cut_info SET `Color` = '$color', `CutNo` = '$cut_id', `OrderNo` = '$order_no', Lay = '$lay', IsTube = '$IsTube', `UnitName` = '$unit', `u_id` = '$vsfs_uid', `entry_time` = '$datex' WHERE AutoCutID = '$auto_CutID'";
		$obj->sql($SQL);
		  
		$SQL = "DELETE FROM tb_vsfs_size_marker WHERE cut_id = '$auto_CutID'";
		//die($SQL);
		$obj->sql($SQL);

		$SQL = "DELETE FROM tb_vsfs_bundle_info WHERE CutID = '$auto_CutID'";
		$obj->sql($SQL);
		
		$SQL = "DELETE FROM tb_vsfs_sticker_info WHERE CutID = '$auto_CutID'";
		$obj->sql($SQL);

	  }
	  
	  else
	  {
		  $SQL_CutID = "SELECT MAX(AutoCutID)+1 AS 'auto_CutID' FROM tb_vsfs_cut_info";
		  $results_CutID = $obj->sql($SQL_CutID);
		  while($row_CutID = mysql_fetch_array($results_CutID))
		  { $auto_CutID = $row_CutID['auto_CutID']; } // May be it also can do with $SQL ;
	
			//$SQL = "INSERT INTO tb_vsfs_cut_info (`sl`, `AutoCutID`, `StyleCode`, `Color`, `CutNo`, `OrderNo`, `UnitName`, `special`, `u_id`, `entry_date`, `entry_time`) VALUES ('', '$auto_CutID', '$style', '$color', '$cut_id', '$order_no', '$unit', '1', '$vsfs_uid', '$date', '$datex')";
		  	
			$SQL = "INSERT INTO tb_vsfs_cut_info (`sl`, `AutoCutID`, `buyer`, `StyleCode`, `Color`, `CutNo`, `OrderNo`, `Lay`, `UnitName`, `IsTube`, `u_id`, `entry_date`, `entry_time`) VALUES ('', '$auto_CutID', '$buyer', '$style', '$color', '$cut_id', '$order_no', '$lay', '$unit', '1', '$vsfs_uid', '$entry_date', '$datex')"; //here the special field is missing as it will autometically assigned as 0 bcz it is not for Special Cut Save.
			// die($SQL);
			$obj->sql($SQL);
	  }
	
	
	
	$rowz = 0;
	foreach($_POST['bundle_ratio'] as $rowz=>$temp_bundle_ratio)
	  { 
		$bundle_ratio_m[] = trim($temp_bundle_ratio);

		$size = trim($_POST['size'][$rowz]);
		$temp_size=strtoupper($size);
		
		$sizea = explode("-",$temp_size);
		$temp_cut_size = trim($sizea[0]);
		$cut_size_m[]=$temp_cut_size;
		
		$size_m[] = $temp_size;

		$temp_marker = trim($_POST['marker'][$rowz]);
		$marker_m[] = $temp_marker;
		
		
		$temp_lot_no = trim($_POST['lot_no'][$rowz]);
		$lot_no_m[]=strtoupper($temp_lot_no);
		
		//die($size);
		$SQL = "INSERT INTO `tb_vsfs_size_marker` (`sl`, `cut_id`, `size_main`, `size`, `marker`, `bundle_ratio`, `lot_no`, `u_id`, `entry_time`) VALUES ('', '$auto_CutID', '$temp_cut_size', '$temp_size', '$temp_marker', '$temp_bundle_ratio', '$temp_lot_no', '$vsfs_uid', '$datex')";
		$obj->sql($SQL);
		
		$rowz ++;				
	  }
	  
													// asort($size_m);
		
		/*foreach ($cut_size_m as $key => $val)
			{
		echo "$key = $val , \n";
		echo "$key = $size_m[$key] , \n";
		echo "$key = $marker_m[$key] , \n";
		echo "$key = $bundle_ratio_m[$key] , \n";
		echo "$key = $lot_no_m[$key] , \n";
		echo "<br/><br/>";
			 }
			 
		die('<br/><br/><br/>Hello World !!!');*/
		
		

  $cut_size_ck = '';
  $size_main_ck = '';		
  $ttl_cut_pnl = 0;
  $part = 0; // it is for calculating how many part is calculated under this Bundle Print process.
				
  //$marker_array = array('',' - A',' - B',' - C',' - D',' - E',' - F',' - G',' - H',' - I',' - J',' - K',' - L',' - M',' - N',' - O',' - P',' - Q',' - R',' - S',' - T',' - U',' - V',' - W',' - X',' - Y',' - Z');
  $marker_array = array('','-A','-B','-C','-D','-E','-F','-G','-H','-I','-J','-K','-L','-M','-N','-O','-P','-Q','-R','-S','-T','-U','-V','-W','-X','-Y','-Z');

	  foreach($_POST['part_info'] as $part_row=>$part_info)
	  { 
	 
	 $bundle_no = 1 ;
  	 $bndl_end = 0 ; // It is for resetting Start of Bundle Range at the begenning of new Part.

	  $part_infom = explode("~", $part_info);
	  $PartName = $part_infom[0];
	  $IsPrint = $part_infom[1];
	 
	  
	  foreach ($size_m as $key => $size)
	  { 
		$bundle_ratio = $bundle_ratio_m[$key];  // Here the Suffix _m indicates It is the main Array.
		// $size = $size_m[$key];		
		$cut_size = $cut_size_m[$key];
		$marker = $marker_m[$key];
		$lot_no = $lot_no_m[$key];
		
		if($cut_size != $cut_size_ck)
		 { 
		$bndl_end = 0 ; // It is for resetting Start of Bundle Range at the begenning of new Size.
		$cut_size_ck = $cut_size;
		 }
		
		$mrkr = 1 ;
				  		  		  		
	  while($mrkr <= $marker)
	  {
		  $suffix = '';
		  if($marker > 1) { $suffix = $marker_array[$mrkr] ; }
		  
		  $size_main = $size.$suffix;
		  
		 // $bundle_sticker = 0;

		$temp_bndl=explode("+",$bundle_ratio);	// the Bundle Ratio is divided here by + Sign.
		
			foreach($temp_bndl as $value=>$bundle_1) // Here $bundle_1 is a group of bundle located in $bundle_ratio.
			{
					$temp_bndl_1 = explode(".", $bundle_1);
					
						$bundle_qty_m = trim($temp_bndl_1[0]);
						$bundle_qtym = $bundle_qty_m/2; // bundle_qty_m divided by 2, for tube fabric.
						$bundle_qty = $bundle_qtym-1;
						
						$no_of_bundle = trim($temp_bndl_1[1]);
						if($no_of_bundle == '') { $no_of_bundle = 1; }
						
						
						$qty_sticker = $bundle_qty_m*$no_of_bundle;
						//$bundle_sticker = $bundle_sticker+$qty_sticker;
						

					for($i=1; $i<=$no_of_bundle; $i++)
					{
				  		$bndl_st = $bndl_end+1 ;
						$bndl_end = $bndl_st+$bundle_qty;
						
						$bundle_range = $bndl_st.' - '.$bndl_end ; // Here $bundle_range is to show on Print Paper. 
						//$b_qty = ($bndl_end-$bndl_st)+1 ;
				  
				  //$SQL = "INSERT INTO `tb_vsfs_bundle_info` (`AutoBundleID`, `CutID`, `BundleNo`, `PartName`, `Size`, `Suff`, `LotNo`, `BundleRange`, `Qty`, `print_flag`) VALUES ('', '$auto_CutID', '$bundle_no', '$PartName', '$cut_size', '$size_main', '$lot_no', '$bundle_range', '$b_qty', '$IsPrint')";
				 	//die($SQL);
				  $SQL = "INSERT INTO `tb_vsfs_bundle_info` (`AutoBundleID`, `CutID`, `BundleNo`, `PartName`, `Size`, `Suff`, `LotNo`, `BundleRange`, `Qty`, `print_flag`) VALUES ('', '$auto_CutID', '$bundle_no', '$PartName', '$cut_size', '$size_main', '$lot_no', '$bundle_range', '$bundle_qty_m', '$IsPrint')";
				  $obj->sql($SQL);
				  
				  //$ttl_cut_pnl = $ttl_cut_pnl+$b_qty;
				  
				  $ttl_cut_pnl = $ttl_cut_pnl+$bundle_qty_m;
				  
				  if($value == 0 && $i == 1) { $sticker_st = $bndl_st;}
				  
				  $bundle_no ++ ;
				  
					}
				
			}// End of each (+) part of bundle_ratio
		
			
			if($part_row == 0 && $size_main_ck != $size_main){
			$SQL_Sticker = "INSERT INTO `tb_vsfs_sticker_info` (`sl`, `CutID`, `SizeMain`, `Size`, `Start`, `End`) VALUES ('', '$auto_CutID', '$cut_size', '$size_main', '$sticker_st', '$bndl_end')"; 
			$obj->sql($SQL_Sticker);
			// Here Please note that while inserting value through mySql query we put the value within '' -> Which indicates treat it as a String so, in case of numeric value we can ommit it But for arithmetic calculation it is mandatory to ommit it.
			// for example ($bndl_end-$sticker_st+1) OR $bndl_end-$sticker_st+1 --> it is OK, But '($bndl_end-$sticker_st+1)' --> is wrong
							  }
							  
			else if ($part_row == 0 && $size_main_ck == $size_main) {
			$SQL_Sticker = "UPDATE `tb_vsfs_sticker_info` SET `End` = '$bndl_end' WHERE CutID = '$auto_CutID' AND Size = '$size_main'"; 
			$obj->sql($SQL_Sticker);
			}
							  
		  
		   $mrkr ++;
	  	  } // For Each Marker
		  
		  $size_main_ck = $size_main;
	   } // For Each Size
	   $part ++;
	 } // For Each Parts
	 
	 
	 
	 
	  $ttl_cut_pnl = $ttl_cut_pnl/$part; 
  $ttl_cut_pnl_encode = base64_encode($ttl_cut_pnl);
  
  
  		  $ttl_LOT = '';
		  $SQL_LOT = "SELECT lot_no FROM `tb_vsfs_size_marker` WHERE cut_id = '$auto_CutID' GROUP BY lot_no";
		  $results_LOT = $obj->sql($SQL_LOT);
		  $lot_sl = 1;
		  while($row_LOT = mysql_fetch_array($results_LOT))
		  {
			   if ($lot_sl == 1) {$ttl_LOT = $row_LOT['lot_no'];}
			   else {$ttl_LOT = $ttl_LOT.', '.$row_LOT['lot_no'];}
			   
			   $lot_sl ++;
		  }
	
		$SQL = "UPDATE tb_vsfs_cut_info SET `LotNo` = '$ttl_LOT', Quantity = '$ttl_cut_pnl' WHERE AutoCutID = '$auto_CutID'";
		$obj->sql($SQL);
  
  $encd_CutID = base64_encode($auto_CutID);
  header("location:cutting_input_print.php?cid=$encd_CutID&ttl=$ttl_cut_pnl_encode");
   } // If the form is posted.
  else
   {
  header("location:index.php?msg='Error!!! Please Log in Again'"); 
  die('Please Log in Again !!!');
   }	
  
  //$msg = 'The Auto Cut Id is : '.$auto_CutID.' And total Qty is : '.$ttl_cut_pnl ;
  
 
				
  
 ?>