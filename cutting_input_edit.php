
<?php	
	require_once('comon.php');
	require('header.php');
	
	if($_GET['cid'] != '')
	{ $decd_cid = base64_decode($_GET['cid']);
	  //$special = $_GET['spe'];
	}
	
	$SQL="select * from tb_vsfs_cut_info where AutoCutID='$decd_cid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$buyer=$row['buyer'];
		$StyleCode=$row['StyleCode'];

		$Color=$row['Color'];
		$Clr_OrderQty=$row['Clr_OrderQty'];
		
		$Colorm = $Color.'~'.$Clr_OrderQty ;
		
		
		$CutNo=$row['CutNo'];
		$OrderNo=$row['OrderNo'];
		
		$LotNo=$row['LotNo'];
		$Lay=$row['Lay'];
		$Quantity=$row['Quantity'];

		$UnitName=$row['UnitName'];
		$IsTube=$row['IsTube'];
		
	}
	
?>

	<style type="text/css">
	
	.placeholder_color ::-webkit-input-placeholder {color: #FF6A22;}
	.placeholder_color :-moz-placeholder {color: #FF6A22;}
	.placeholder_color ::-moz-placeholder {color: #FF6A22;}
	.placeholder_color :-ms-input-placeholder {color: #FF6A22;}
									
	</style>
    
  
        <SCRIPT language="javascript">
   
 		  /*function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                
            }
        }
		

         function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
                        alert(rowCount);
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }*/
 

		function addSize(tableID) {
 
            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
			var colCount = table.rows[0].cells.length;

			for(var i=1; i<rowCount; i++) {
                var row = table.rows[i];
				
				var insrow = i+1;
				
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
					
							row.cells[0].childNodes[0].checked = false;
							//newcell.childNodes[1].checked = false;
							
							var ins = 1;
							var row = table.insertRow(insrow);
				 
							for(var j=0; j<colCount; j++) {				 
								var newcell = row.insertCell(j);
								newcell.innerHTML = document.getElementById('data'+j).value;               
														  }
														  	 }
											}
				if(ins == null)
				{
				  var row = table.insertRow(rowCount);
				  for(var i=0; i<colCount; i++) {		 
				  var newcell = row.insertCell(i);
				  //newcell.innerHTML = table.rows[1].cells[i].innerHTML;
				  newcell.innerHTML = document.getElementById('data'+i).value;               
	
												}
				}
        }
		
		
		function deleteSizeRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
		
		
    </SCRIPT>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Edit <span style="color:#0F9; font-size:16px;">Auto Cut ID: <?php echo $decd_cid ; ?></span></h2>
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
     
     <?php if($IsTube=='') { ?>
     <form name="Form1" id="Form1" enctype="multipart/form-data" action="cutting_input_save.php" method="post" class="form-inline" role="form">
     <?php } else { ?>
     <form name="Form1" id="Form1" enctype="multipart/form-data" action="cutting_input_tube_save.php" method="post" class="form-inline" role="form">
	<?php } ?>
     <br />
        <table class="bottomBorder" border="1">
        	<tr>
            	<th>Style: <span style="color:#F00">*</span></th>
                <td><input type="text" name="style_temp" class="form-control" size="12" value="<?php echo $StyleCode; ?>" placeholder="Style Code" readonly />
                <input name="style" type="hidden" value="<?php echo $StyleCode.'~'.$buyer; ?>" />
                </td>
            	
                <th> Color: <span style="color:#F00">*</span></th>
                 <td><select name="color" class="form-control" tabindex="2" id="color" data-rel="chosen" required autofocus >
                  <option style="color:#000" selected value="<?php echo $Colorm; ?>"><?php echo $Color; ?></option>
					 <?php         
                   $SQL2 = "SELECT Color, OrderQty FROM tb_vsfs_color_info T0 WHERE T0.StyleCode = '$StyleCode' ORDER BY ColorInfoID DESC";
                    $obj->sql($SQL2);
                    while($row2 = mysql_fetch_array($obj->result))
                      { 
                      //$data=$row2['Color'];
		  			  $data=$row2['Color'].'~'.$row2['OrderQty'] ;
		  			  $data1=$row2['Color'];
                      echo '<option style="color:#000" value="'.$data.'">'.$data1.'</option>';
                      }
                   ?>
                </select>
                </td>
                <th> Cut No: <span style="color:#F00">*</span></th>
                <td><input type="text" name="cut_id" value="<?php echo $CutNo; ?>" tabindex="3" size="10" placeholder="Cut No" required autofocus /></td>
                
                <th> Lay: <span style="color:#F00">*</span></th>
                <td><input type="number" name="lay" value="<?php echo $Lay; ?>" tabindex="4" size="5" placeholder="Lay" required autofocus /></td>
                <th> Order No: <span style="color:#F00">*</span></th>
                <td><input type="text" name="order_no" value="<?php echo $OrderNo; ?>" tabindex="5" size="12" placeholder="Order Number" required autofocus ></td>
                <th> Unit: <span style="color:#F00">*</span></th>
                <td><input type="text" name="unit" value="<?php echo $UnitName; ?>" tabindex="6" size="6" placeholder="Unit" readonly required autofocus >
                <input name="auto_CutID" type="hidden" value="<?php echo $decd_cid; ?>" />
                </td>
            </tr>
       </table>
     <br />
   
    <table>
    <tr><td>
    
 

    <span style="color:#09F; font-size:14px; font-weight:bold; margin-left:15px">Add Size, Marker, Bundle Ratio and Lot Information &#10137;<!--&#10142;--></span>  
          
          <?php  // echo '=R='.round(4.49999).'=C='.ceil(4.49999); ?>
          
          <!--<span style="color:#09F; font-size:16px; font-weight:bold; margin-left:15px">Add Size and Marker Information >></span>--> <!--style="color:#33C"-->
         <br/><br/> 
         
    
   <script type="text/javascript">
   
	   $(document).ready(function() {
         $('#IsTube').click(function(event) {  //on click 
		 //$("#ck").show();
		 if(this.checked) { // check select status
		 document.getElementById("Form1").action="cutting_input_tube_save.php";
             }else{
		 document.getElementById("Form1").action="cutting_input_save.php";
             }
         });
      });

   </script>

    
    <div style="margin-left:10px">   
    <!--<input type="button" value="Add" tabindex="6" class="btn btn-success btn-xs" onClick="addRow('size_mrkr')" />&nbsp;-->
    

    <!--<span style="margin-left:10px; color:#060; font-weight:bold">Insert Bundle Ratio:&nbsp;&nbsp;<input name="ins_bundle_ratio" id="ins_bundle_ratio" type="text" size="20" /></span>
    <span style="margin-left:10px; color:#060; font-weight:bold">Insert Lot No:&nbsp;&nbsp;<input name="ins_lot" id="ins_lot" type="text" size="15" /></span>-->
    
    <input type="button" value="Add" tabindex="7" class="btn btn-success btn-xs" onClick="addSize('size_mrkr')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteSizeRow('size_mrkr')" />
    
    <span style="margin-left:50px; color:#0F9; font-weight:bold"><label style="font-weight:bold" title="Click if the Lays are Tube Fabric" ><input type="checkbox" name="IsTube" id="IsTube" value="1" />&nbsp;&nbsp;Is Tube?</label></span>
    
    
    <br/>
    <br/>
    
   <div id="size_table">
   
      <script type="text/javascript">

      $(document).ready(function() {
         $('#selecctall').click(function(event) {  //on click 
             if(this.checked) { // check select status
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = true;  //select all checkboxes with class "checkbox1"               
                 });
             }else{
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                 });         
             }
         });
      });
	  
	  
	  $(document).ready(function() {
	  $("#ins_marker").change(function() {
		  var dis=$(this).val();
		  $('.ins_marker_no').each(function() {
			  this.value = dis;
		  });
		  document.getElementById("ins_marker").value = '';
		  });
	  });
	  
						 
	  $(document).ready(function() {
	  $("#ins_bundle_ratio").change(function() {
		  var dis=$(this).val();
		  $('.ins_bundle_range').each(function() {
			  this.value = dis;
		  });
		  document.getElementById("ins_bundle_ratio").value = '';
		  });
	  });
	  
	  
	  
	  $(document).ready(function() {
	  $("#ins_lot").change(function() {
		  var dis=$(this).val();
		  $('.ins_lot_no').each(function() {
			  this.value = dis;
		  });
		  document.getElementById("ins_lot").value = '';
		  });
	  });
	  
				
	  	  
   </script>

    
    <table class="bottomBorder" id="size_mrkr" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
        <tr>
          <th><label title="Click to Select All"><input type="checkbox" id="selecctall" /></label>
          <input name="data0" id="data0" type="hidden" value="<?php echo "<input name='chk' type='checkbox' class='checkbox1' />"; ?>" /></th>
          <th>Size<input name="data1" id="data1" type="hidden" value="<?php echo "<input name='size[]' type='text' tabindex='8' onclick='select()' size='8' placeholder='Size' required autofocus />"; ?>" /></th>
          <th><!--Marker--><input name="data2" id="data2" type="hidden" value="<?php echo "<input name='marker[]' class='ins_marker_no' type='number' value='0' onclick='select()' tabindex='9' size='8' min='0'  placeholder='Marker' required autofocus />"; ?>" />
          <span class="placeholder_color"><input name="ins_marker" id="ins_marker" type="number" tabindex="8" onclick="select()" size="8" min="0" placeholder="Insert Marker" /></span>
          </th>
          <th><!--Bundle Ratio--><input name="data3" id="data3" type="hidden" value="<?php echo "<input name='bundle_ratio[]' class='ins_bundle_range' type='text' onclick='select()' tabindex='10' size='50' placeholder='Bundle Ratio' />"; ?>" />
          
          <span class="placeholder_color"><input name="ins_bundle_ratio" id="ins_bundle_ratio" tabindex="9" type="text" size="44" placeholder="Insert Common Bundle Ratio (If Any)" /></span>
          </th>
          <th><!--Lot No--><input name="data4" id="data4" type="hidden" value="<?php echo "<input name='lot_no[]' class='ins_lot_no' type='text' onclick='select()' tabindex='11' size='10' placeholder='Lot No' />"; ?>" />
          
          <span class="placeholder_color"><input name="ins_lot" id="ins_lot" tabindex="10" type="text" size="9" placeholder="Insert LotNo" /></span>
          </th>
         </tr>

      <?php         
		$SQL2="select * from tb_vsfs_size_marker where cut_id = '$decd_cid' order by sl ASC";
		$result2 = $obj->sql($SQL2);
		while($row2 = mysql_fetch_array($result2))
		  { 
		  $size=$row2['size'];
		  $marker=$row2['marker'];
		  $bundle_ratio=$row2['bundle_ratio'];
		  $lot_no=$row2['lot_no'];
		  echo '<tr>
          <td><input name="chk" type="checkbox" class="checkbox1" /></td>
          <td><input name="size[]" type="text" value="'.$size.'" onclick="select()" tabindex="11" size="8" placeholder="Size" required autofocus /></td>
          <td><input name="marker[]" class="ins_marker_no" type="number" value="'.$marker.'" onclick="select()" tabindex="12" min="0" size="8" placeholder="Marker" required autofocus /></td>
          <td><input name="bundle_ratio[]" class="ins_bundle_range" type="text" value="'.$bundle_ratio.'" onclick="select()" tabindex="13" size="50" placeholder="Bundle Ratio" /></td>
          <td><input name="lot_no[]" class="ins_lot_no" type="text" value="'.$lot_no.'" onclick="select()" tabindex="14" size="10" placeholder="Lot No" /></td>
				</tr>';
	   
		  }
	   ?>
                
    </table>
    </div>
 </div> 
    
<br/><br/>
    
    <div align="left" style="margin-left:100px"> 
	  
      <!--<button class="btn btn-success" tabindex="12" onclick="OnButton1()" >Save</button>
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" tabindex="13" value="Reset" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class="btn btn-primary" tabindex="14" onclick="OnButton2()" >Check</button>-->
      
      
      <input name="submit" type="submit" class="btn btn-success" tabindex="15" id="submit" value="Update" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" tabindex="16" value="Reset" />
      
    </div>
    
    </td><td valign="top">
    
    <div style="margin-left:30px">
    <!--<br/>-->
    <span style="color:#09F; font-size:14px; font-weight:bold">Parts Information &#10137;<!--&#10142;--></span>  
    <br/><br/>
    
   <div id="part_table"> 
   
      <script type="text/javascript">
	  
	  $(document).ready(function() {
         $('#selecctall2').click(function(event) {  //on click 
             if(this.checked) { // check select status
                 $('.checkbox2').each(function() { //loop through each checkbox
                     this.checked = true;  //select all checkboxes with class "checkbox1"               
                 });
             }else{
                 $('.checkbox2').each(function() { //loop through each checkbox
                     this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                 });         
             }
         });
      });
	  
   </script>

   <table class="bottomBorder" style="box-shadow:0px 0px 0px 0px #FFF ; margin-left:20px" border="1">
        <tr>
          <th><label style="font-weight:bold" title="Click to Select All"><input type="checkbox" id="selecctall2" /><!--&nbsp;#Select All--></label></th>
          <th>Part Name</th>
          <th>Print Status</th>
        </tr>
        
        <?php 
		
		$part_array = array();
		$SQL_part = "SELECT PartName FROM tb_vsfs_bundle_info WHERE CutID = '$decd_cid' GROUP BY PartName";
		$obj->sql($SQL_part);
		while($row = mysql_fetch_array($obj->result))
		{ 
		$part_array[] = $row['PartName'];
		}
		
		 
		  //$SQL2 = "SELECT T0.PartName, T0.IsPrint, (CASE WHEN(T0.PartName IN (SELECT T1.`PartName` FROM `tb_vsfs_bundle_info` T1 WHERE T1.`CutID` = '$decd_cid' GROUP BY T1.`PartName`)) THEN 1 ELSE 0 END) as 'process' FROM `tb_vsfs_part_info` T0 WHERE T0.`StyleCode` = '$StyleCode'";
		  $SQL2 = "SELECT T0.PartName, T0.IsPrint FROM `tb_vsfs_part_info` T0 WHERE T0.`StyleCode` = '$StyleCode'";
			//die($SQL2);
		  $result2 = $obj->sql($SQL2);
		  $sl = 1;
		  while($row2 = mysql_fetch_array($result2))
		  {
			 $part_name = $row2['PartName']; 
			 
		?>
          <tr>
              <td><input name="part_info[]" type="checkbox" value="<?php echo $row2['PartName'].'~'.$row2['IsPrint'] ; ?>" <?php if(in_array($part_name, $part_array)) echo 'checked'; ?>  class="checkbox2" /></td>
              <td><?php echo $row2['PartName']; ?></td>
              <td><?php if($row2['IsPrint'] == 1) echo '<span style="color:#0F9; font-weight:bold; font-size:15px">Yes</span>'; else echo 'No'; ?></td>
          </tr>
		<?php $sl ++; } ?>
        
        
    </table> 
    

    </div>
    </div>
    
    </td>
    
    </tr></table>
    
     </form>
      
     <br />
				           
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>

