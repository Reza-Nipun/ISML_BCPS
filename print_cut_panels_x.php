<?php 

	include "db_Class.php";
	$obj = new db_class();
	$obj->MySQL();
	
	
	// die('Hello This is Liza !!!');
	
		$date = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
		$date->modify('-3600 seconds');
		$date=$date->format("m-d-Y");
		// $datex=$datex->format("d-m-Y H:i:s");
		//$print_date = date('l, j-F-Y');
		
		$print_date = date('j-M-Y');
		
		$pf=$_GET['pf'];
		
		if($pf == '')
			{
				  $pf=$_POST['print_flag'];		
				  $decd_CutID=$_POST['cid'];
			  
				  $cnt = 1;
				  
				  /*$rowz = 0;
				  foreach($_POST['checkbox'] as $rowz=>$checkbox)
				  { $size_info[$cnt] = $_POST['size_info'][$rowz] ; $cnt = $cnt+1 ; $rowz ++ ;}*/
				  
				  foreach($_POST['size_info'] as $rowz=>$s_info)
				  { $size_info[$cnt] = $s_info ; $cnt = $cnt+1 ;
				  
				  //echo $s_info.'~';
				   }

				  
				  $size_infom = '';
				  for($i = 1; $i < $cnt; $i++)
				  {
					if($i == $cnt-1) { $size_infom .= "'".$size_info[$i]."'" ; }
					else { $size_infom .= "'".$size_info[$i]."', " ; }  
				  }
				  
	$SQL = "SELECT T0.PartName, T0.BundleNo, T0.Suff, T0.LotNo, T0.BundleRange, T0.Qty, T1.AutoCutID, T1.buyer, T1.StyleCode, T1.Color, T1.CutNo, T1.OrderNo FROM tb_vsfs_bundle_info T0 LEFT JOIN tb_vsfs_cut_info T1 ON T1.AutoCutID = T0.CutID WHERE T1.AutoCutID = '$decd_CutID' AND T0.print_flag = '$pf' AND T0.Suff IN (".$size_infom.") ORDER BY AutoBundleID ASC";
			 }
		else
		{
			$decd_CutID = base64_decode($_GET['cid']);
			$SQL = "SELECT T0.PartName, T0.BundleNo, T0.Suff, T0.LotNo, T0.BundleRange, T0.Qty, T1.AutoCutID, T1.buyer, T1.StyleCode, T1.Color, T1.CutNo, T1.OrderNo FROM tb_vsfs_bundle_info T0 LEFT JOIN tb_vsfs_cut_info T1 ON T1.AutoCutID = T0.CutID WHERE T1.AutoCutID = '$decd_CutID' AND T0.print_flag = '$pf' ORDER BY AutoBundleID ASC";
		}
		
	

	  /*
		$size_infom = '';
	  foreach($_POST['checkbox'] as $rowz=>$checkbox)
	  { $size_info = $_POST['size_info'][$rowz];
	  	$size_infom .= $size_info.', ' ;
	   }*/
				
		/*
		Size IN ('XS', 'M')
		
		
		$pf = $_GET['pf'];
		$get_cid = $_GET['cid'];
		$decd_CutID = base64_decode($get_cid);*/

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($pf == 0) echo 'Solid'; else echo 'Print'; ?> Part</title>
	
	<style type="text/css">
    table.bottomBorder { border-collapse:collapse; }
    table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;
    font-size:12px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black; }
    </style> 
       
</head>

<body>

<?php 
?>

<div align="center" style="width:820px">
<?php

	//$SQL="select * from tb_vsfs_bundle_info where CutID='$decd_CutID'";    //table name

	$srl = 1;
	// The Query is defined above.
	
	// die($SQL);
		
	$results = $obj->sql($SQL);
    $num_rows=mysql_num_rows($results);
          while($row = mysql_fetch_array($results))
          { 
		  
		  $PartName[] = $row['PartName'];
		  $BundleNo[] = $row['BundleNo'];
		  $Suff[] = $row['Suff'];
		  $LotNo[] = $row['LotNo'];
		  $BundleRange[] = $row['BundleRange'];
		  $Qty[] = $row['Qty'];

		  $AutoCutID[] = $row['AutoCutID'];
		  $buyer[] = $row['buyer'];
		  $StyleCode[] = $row['StyleCode'];
		  $Color[] = $row['Color'];
		  $CutNo[] = $row['CutNo'];
		  $OrderNo[] = $row['OrderNo'];
		  
		  }
		  
	
	
	$pblnce = $num_rows;
	$div2 = 1; // it is for Track wether the 2nd div is requires to proceed or not.
	$ttl_page = ceil($num_rows/22);
	$prange = 11;
	$start = 0;
	for($i=1; $i<=$ttl_page; $i++)
	{
	?>
    
		<div style="float:left; margin-left:5px">
			<?php
			//  $div2 = 0;if($pblnce < $prange) {$prange = $pblnce; $div2 = 0;}
			if($pblnce < 11) {$prange = $start+$pblnce; $div2 = 0;}
			else { $pblnce = $pblnce-11; }
			
			for($j=$start; $j<$prange; $j++) {  ?>
                <div>
                <table class="bottomBorder" border="1" align="left">
                    <tr><td colspan="3"><span style="margin-right:30px">P. DT. <?php echo $print_date ; ?></span><span style="margin-right:20px">Buyer: <strong><?php echo $buyer[$j] ; ?></strong></span>VIYELLATEX LTD.</td></tr>
                    <tr><td><strong><?php echo $PartName[$j]; ?></strong></td><td width="105px"><strong>Bundle No.: <?php echo $BundleNo[$j] ; ?></strong></td><td>A. CutID: <?php echo $AutoCutID[$j] ; ?></td></tr>
                    <tr><td width="120px"><strong>Style: <?php echo $StyleCode[$j] ; ?></strong></td><td>Color: <?php echo $Color[$j] ; ?></td><td><strong>Size: <?php echo $Suff[$j] ; ?></strong></td></tr>
                    <tr><td>Gmt: <?php echo $BundleRange[$j] ; ?></td><td><?php echo $OrderNo[$j] ; ?></td><td width="120px"><strong>Qty: <?php echo $Qty[$j].' / '.$PartName[$j] ; ?></strong></td></tr>
                    <tr><td><strong>Qty: <?php echo $Qty[$j] ; ?></strong></td><td><strong>Lot No.: <?php echo $LotNo[$j] ; ?></strong></td><td><strong>Cut No.: <?php echo $CutNo[$j] ; ?></strong></td></tr>
                </table>
                <!--<p>&nbsp;</p>
                <div>&nbsp;<hr />&nbsp;</div>
                <br/> &nbsp;<hr /> &nbsp; <br/> 
                -->
                </div>
                <!--<div style="height:110px">---------------------------------------------------------------------</div>-->
                <?php if($j+1 != $prange) { ?>
                <div style="padding-top:10px; padding-bottom:5px">----------------------------------------------------------------</div>
			<?php }// End of checking parange is at last position or not.
			
			else echo '<div style="padding-top:10px; padding-bottom:2px"></div>';

			 } $start = $prange; $prange = $prange+11; ?>
            
                
		</div>
        
        
		<?php if($div2 != 0) { ?>	
        <div style="float:left; margin-left:70px">
			<?php
			// if($pblnce < $prange) {$prange = $pblnce;}
			if($pblnce < 11) {$prange = $start+$pblnce;}
			else { $pblnce = $pblnce-11; }

			for($j=$start; $j<$prange; $j++) { ?>
                <div>
               <table class="bottomBorder" border="1" align="left">
                    <tr><td colspan="3"><span style="margin-right:30px">P. DT. <?php echo $print_date ; ?></span><span style="margin-right:20px">Buyer: <strong><?php echo $buyer[$j] ; ?></strong></span>VIYELLATEX LTD.</td></tr>
                    <tr><td><strong><?php echo $PartName[$j]; ?></strong></td><td width="105px"><strong>Bundle No.: <?php echo $BundleNo[$j] ; ?></strong></td><td>A. CutID: <?php echo $AutoCutID[$j] ; ?></td></tr>
                    <tr><td width="120px"><strong>Style: <?php echo $StyleCode[$j] ; ?></strong></td><td>Color: <?php echo $Color[$j] ; ?></td><td><strong>Size: <?php echo $Suff[$j] ; ?></strong></td></tr>
                    <tr><td>Gmt: <?php echo $BundleRange[$j] ; ?></td><td><?php echo $OrderNo[$j] ; ?></td><td width="120px"><strong>Qty: <?php echo $Qty[$j].' / '.$PartName[$j] ; ?></strong></td></tr>
                    <tr><td><strong>Qty: <?php echo $Qty[$j] ; ?></strong></td><td><strong>Lot No.: <?php echo $LotNo[$j] ; ?></strong></td><td><strong>Cut No.: <?php echo $CutNo[$j] ; ?></strong></td></tr>
                </table>
                <!--<p>&nbsp;</p>
                <div>&nbsp;<hr />&nbsp;</div>
               <br/> &nbsp;<hr /> &nbsp; <br/> 
                -->               
                </div>
                <!--<div style="height:110px">---------------------------------------------------------------------</div>-->
                <?php if($j+1 != $prange) { ?>
                <div style="padding-top:10px; padding-bottom:5px">----------------------------------------------------------------</div>
			<?php }
			
			else echo '<div style="padding-top:10px; padding-bottom:2px"></div>';
			//else echo '<div style="padding-top:10px; padding-bottom:2px">&nbsp;</div>';
			// End of checking parange is at last position or not.
						
			} $start = $prange; $prange = $prange+11; ?>    
        </div>
        <?php } // End of div check ?>
      <!--<br/> <br/> <br/> 
       <div style="width:100px"><?php // echo 'Page '.$i.'/ '.$ttl_page; ?></div>-->  
  <?php
  //echo 'Hello World !!!';
		
	} // End of For Loop ?>

</div>

</body>
</html>