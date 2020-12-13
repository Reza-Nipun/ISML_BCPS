
<?php	
	require_once('comon.php');
	require('header.php');
	// require('menu.php');
	
	if (isset($_POST['submit']))
 	  {
		$s_cutting_date = $_POST['cutting_date'];
		$s_unit = $_POST['unit'];
		$s_buyer = $_POST['buyer'];
		
		$search = 1;
	  }
	
?>

	<style type="text/css">	
	
	table.bottomBorder2 { border-collapse:collapse; }
    table.bottomBorder2 td, table.bottomBorder2 th { border-bottom:1px dotted white;padding:1px;
    /*font-size:13px;*/
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder2 tr { border:1px dotted white;padding:1px; }
	table.bottomBorder2 th { font-size:14px; color:#000; }
	table.bottomBorder2 td { font-size:13px; color:#FFF; }
	
    </style> 

        <script src="img/CalendarControl1.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        
    	<link href="img/CalendarControl.css" rel="stylesheet" type="text/css" />
    
	<script type="text/javascript">
	function exl_dwnld () {
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#TableExcel').html()) 
			location.href=url
			return false
	}
	</script> 
    
    <script language="JavaScript">
var gAutoPrint = true; // Tells whether to automatically call the print function

function printSpecial()
{
if (document.getElementById != null)
{
var html = '<HTML>\n<HEAD>\n';

if (document.getElementsByTagName != null)
{
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0)
html += headTags[0].innerHTML;
}
html += '\n</HE>\n<body style="background:none; !important ; ">\n';

var printReadyElem = document.getElementById("TableExcel");

if (printReadyElem != null)
{
html += printReadyElem.innerHTML;
}
else
{
alert("Could not find the printReady function");
return;
}

html += '\n</BO>\n</HT>';


var printWin = window.open("","printSpecial");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();
if (gAutoPrint)
printWin.print();
}
else
{
alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
}
}

</script>  
    
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Search Daily Cutting Information</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">

     <form name="form1" id="form1" action="search_daily_cutting.php" method="post" class="form-inline" role="form">
    <table id="example" border="1" class="bottomBorder">
        <tr>
        	<td>Cutting Date</td>
              <td><input type="text" name="cutting_date" value="<?php echo $s_cutting_date; ?>" class="form-control" placeholder="Cutting Date" tabindex="1" onclick="showCalendarControl(this);" required autofocus ></td>
        	<td>Unit</td>
            <td>
            <select name="unit" class="form-control" tabindex="2" id="unit" >
              <option selected="selected" value="">-Select Unit-</option>
              <option selected value="<?php echo $s_unit; ?>"><?php echo $s_unit; ?></option>
			   <?php         
                $SQL2 = "SELECT UnitName FROM tb_vsfs_cut_info WHERE u_id != '' GROUP BY UnitName ORDER BY UnitName ASC";
                $obj->sql($SQL2);
                while($row2 = mysql_fetch_array($obj->result))
                  { 
                  $data=$row2['UnitName'];
                  echo '<option value="'.$data.'">'.$data.'</option>';
                  }
               ?>
            </select>
            </td>
            <td>Buyer</td>
              <td><input type="text" name="buyer" value="<?php echo $s_buyer; ?>" class="form-control" placeholder="Buyer" tabindex="3" ></td>
            <!--<td>Style</td>
              <td><input type="text" name="style" class="form-control" placeholder="Style" tabindex="4" ></td>-->
        	<td>
              <input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
              &nbsp;
              <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" />            
            </td>
        
        </tr>
    </table>
 </form>    
            </div>
        </div>
    </div>

</div>

<?php if($search == 1) { ?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Showing Searched Information</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
            
  <div id="TableExcel"> 
  
  	<span style="color:#F00; font-size:16px; font-weight:bold; margin-left:60px">Cutting Summary Report of Date: <?php echo $s_cutting_date; ?></span>
    
    <br/><br/>       
    <table border="1" class="bottomBorder2" width="1013" style="margin-left:40px; margin-top:10px">
        <thead>
             <tr bgcolor="#CFF">
                <th width="62">SL</th>
                <th width="191">Style</th>
                <th width="166">Color</th>
                <th width="168">Order No</th>
                <th width="168">Cut No</th>
                <th width="111">Size</th>
                <th width="101">Qty</th>
             </tr>
         </thead>
             <?php
			  $SQL = "SELECT UnitName FROM tb_vsfs_cut_info WHERE entry_date = '$s_cutting_date'";
				if($s_unit != '') { $SQL .= " AND UnitName = '$s_unit'"; }
				if($s_buyer != '') { $SQL .= " AND buyer = '$s_buyer'"; }
			  $SQL .= " GROUP BY UnitName ORDER BY UnitName ASC";
			  
			  //die($SQL);
			  $ttl_row_qty = 0;
			  $result = $obj->sql($SQL);
			  while($row = mysql_fetch_array($result))
				  { 
				  $UnitName=$row['UnitName'];
			?>
            <tr><td colspan="7" style="text-align:center"><span style="font-size:16px; font-weight:bold; font-style:italic">Production Unit: <?php echo $UnitName; ?></span></td></tr>
            
            <?php
			 $SQL1 = "SELECT buyer FROM tb_vsfs_cut_info WHERE entry_date = '$s_cutting_date' AND UnitName = '$UnitName'";
				if($s_buyer != '') { $SQL1 .= " AND buyer = '$s_buyer'"; }
			 $SQL1 .= " GROUP BY buyer ORDER BY buyer ASC";
			
			// die($SQL1);
			  $result1 = $obj->sql($SQL1);
			  while($row1 = mysql_fetch_array($result1))
				  { 
				  
			  $buyer_ttl = 0;
				  $buyer=$row1['buyer'];
			?>
            <tr><td colspan="7" style="text-align:center; background-color:#DDDDDD;"><span style="font-size:15px; font-weight:bold; color:#000; font-style:italic">Buyer: <?php echo $buyer; ?></span></td></tr>
			
            <?php
			  $srl = 1;
			   $SQL2 = "SELECT StyleCode, Color FROM tb_vsfs_cut_info WHERE entry_date = '$s_cutting_date' AND UnitName = '$UnitName' AND buyer = '$buyer' GROUP BY StyleCode, Color ORDER BY StyleCode, Color ASC";
				// die($SQL2);
				$result2 = $obj->sql($SQL2);
				while($row2 = mysql_fetch_array($result2))
					{ 
					$StyleCode=$row2['StyleCode'];
					$Color=$row2['Color'];
					// $OrderNo=$row2['OrderNo'];
			?>
					<tr>
                    	<td><?php echo $srl; ?></td>
                        <td><?php echo $StyleCode; ?></td>
                        <td><?php echo $Color; ?></td>
                        <td colspan="4">
                        	<table border="1" class="bottomBorder2">
							<?php
							// GROUP BY AutoCutID
                               //$SQL3 = "SELECT CutID, Size, SUM(Qty) AS 'row_qty' FROM tb_vsfs_bundle_info WHERE CutID IN (SELETC AutoCutID FROM tb_vsfs_cut_info WHERE entry_date = '$s_cutting_date' AND UnitName = '$UnitName' AND buyer = '$buyer' AND StyleCode = '$StyleCode' AND Color = '$Color' ORDER BY AutoCutID ASC) GROUP BY Size ORDER BY CutID, Size ASC";
                                
							$sum_row_qty=0; 
                               //$SQL3 = "SELECT CutNo FROM tb_vsfs_cut_info WHERE entry_date = '$s_cutting_date' AND UnitName = '$UnitName' AND buyer = '$buyer' AND StyleCode = '$StyleCode' AND Color = '$Color' ORDER BY AutoCutID ASC";
                               $SQL3 = "SELECT T0.OrderNo, T0.CutNo, T1.SizeMain, SUM(Qty) AS 'row_qty' FROM tb_vsfs_cut_info T0 LEFT JOIN vt_vsfs_sticker_info T1 ON T1.CutID = T0.AutoCutID WHERE entry_date = '$s_cutting_date' AND UnitName = '$UnitName' AND buyer = '$buyer' AND StyleCode = '$StyleCode' AND Color = '$Color' GROUP BY T1.SizeMain, T0.CutNo ORDER BY LENGTH(T1.SizeMain), T1.SizeMain ASC";
								//die($SQL3);	
                                $result3 = $obj->sql($SQL3);
                                while($row3 = mysql_fetch_array($result3))
                                    {
                                    // $CutNo=$row3['CutNo'];
										$row_qty=$row3['row_qty'];
										$sum_row_qty=$sum_row_qty+$row_qty;
							?>
										<tr>
										    <td width="168"><?php echo $row3['OrderNo']; ?></td>
											<td width="168"><?php echo $row3['CutNo']; ?></td>
											<td width="111"><?php echo $row3['SizeMain']; ?></td>
											<td width="101"><?php echo $row_qty; ?></td>
										</tr>
                                        
                            		<?php

						 			} ?>
                            
                             <!--HERE have to Show the Sub Total-->
                            
                        	</table>
                        </td>
                    </tr>
            <tr><td colspan="7" style="text-align:right; background-color:#EFFFE8"><span style="font-size:14px; font-weight:bold; color:#000; font-style:italic"><?php echo 'Style No: '.$StyleCode.' Color: '.$Color.' Total &#10137; '.$sum_row_qty; ?></span></td></tr>
                    
			<?Php
					$buyer_ttl = $buyer_ttl+$sum_row_qty;
					$ttl_row_qty=$ttl_row_qty+$sum_row_qty;
					
					$srl ++ ;	
		 		 	}?>
                  
            <tr><td colspan="7" style="text-align:right; background-color:#E7C7DF"><span style="font-size:14px; font-weight:bold; color:#000; font-style:italic"><?php echo 'Buyer: '.$buyer.' Total Quantity &#10137; '.$buyer_ttl; ?></span></td></tr>
                  
				<?php  }
				
	  } ?>
             
            <tr><td colspan="7" style="text-align:right; background-color:#CFF"><span style="font-size:14px; font-weight:bold; color:#000; font-style:italic"><?php echo 'Total Row Quantity &#10137; '.$ttl_row_qty; ?></span></td></tr>
            
            <!-- <tr>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
               <th>&nbsp;</th>
             </tr>-->
         	
     </table>
 </div> 
     
     <br/>
     
	   <div align="center">
       <button class="btn btn-info" onClick="exl_dwnld()" style="cursor:pointer">Click to download as Excel</button>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="button" class="btn btn-warning" size="14px" name="printMe2" onclick="printSpecial()" value="Click to Print">
            <!--<div align="center" style="float:left">
            	<button class="btn btn-inverse" onClick="exl_dwnld()" style="cursor:pointer">Click to download as Excel</button>  
            </div>-->
	  </div>        
            </div>
        </div>
    </div>

</div>

<?php } ?>

<?php require('footer.php'); ?>
