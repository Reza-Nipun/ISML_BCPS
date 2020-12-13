
<?php	
	require_once('comon.php');
	require('header.php');
	
	$SQL="select * from tb_admin where sl='$dms_uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{ $name=$row['name']; }
	
	$get_msg = $_GET['msg'];
	$get_id = $_GET['id'];
	$get_sid = $_GET['sid'];
	
	$id = base64_decode($get_id);
	$sid = base64_decode($get_sid);
	
	
	$SQL="select * from tb_vsfs_style where StyleSL='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$StyleCode=$row['StyleCode'];
		$season=$row['season']; 
		$BuyerID=$row['BuyerID'];
	}
	
	
?>
  
        <SCRIPT language="javascript">
  
        function addPartsRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length; // alert(rowCount);
			
			var radio_array = rowCount-1; // alert(radio_array);
			
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
				
				var newcell = row.insertCell(i);
 				
				if(i == colCount-1) {
				var radio = '<input type="radio" name="RadioGroup1['+radio_array+']" value="1" id="RadioGroup1_1" /> Yes';
				
				var radio1 = '<input type="radio" name="RadioGroup1['+radio_array+']" checked value="0" id="RadioGroup1_0" /> No';
				
			newcell.innerHTML = radio + radio1;
				
				//alert('Allah is One'); alert(radio);				
                
				}
				else
				{
 
               // var newcell = row.insertCell(i-1);
            	newcell.innerHTML = table.rows[1].cells[i].innerHTML;
				
				}
            }
        }
		
		
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                /*switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }*/
            }
        }


 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
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
        }
 
 
    </SCRIPT>
    
<script type="text/javascript">
// Popup window code
function newPopup(url) {
popupWindow = window.open(
url,'popUpWindow','height=400,width=700,left=350,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               
               <h2><i class="glyphicon glyphicon-edit"></i> Edit Information of Style - <strong><span style="color:#0F9"><?php echo $sid; ?></span></strong></h2>

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
            	
                <!-- <div id="preview">
               </div>

             <div id="formbox">
             lc_save
             -->
             
            
            	<?php if($get_msg != '') { ?><br /><span style="color:#0F9; font-size:14px; font-weight:bold; margin-left:20px"><?php echo $get_msg ; ?></span><br /><br /><?php } ?>
             
             <form name="" id="form1" action="edit_style_save.php" method="post" class="form-inline" role="form">

     <!--<form class="form-inline" role="form">-->
     
     	<table>
        	<tr>
            	<td> Buyer: <span style="color:#F00">*</span></td>
                <td><select name="buyer" class="form-control" tabindex="1" data-rel="chosen" required autofocus>
                    <option style="color:#000;" value="<?php echo $BuyerID; ?>"><?php echo $BuyerID; ?></option>
					<?php
                    $SQL="SELECT DISTINCT concern_name FROM tb_concern WHERE concern_type='Buyer'";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <option style="color:#000;" value="<?php echo $row['concern_name']; ?>"><?php echo $row['concern_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                </td>
            </tr>
        	<tr>
            	<td> Style No: <span style="color:#F00">*</span></td>
                <td><input type="text" name="style" class="form-control" value="<?php echo $StyleCode; ?>" tabindex="2" placeholder="Style No" required autofocus >
                <input name="style_sl" value="<?php echo $id; ?>" type="hidden" />
                </td>
            </tr>
            <tr>
              <td>Season: <span style="color:#F00">*</span></td>
              <td><input type="text" name="season" class="form-control" value="<?php echo $season; ?>" tabindex="2" placeholder="Season" required autofocus ></td>
            </tr>
            <tr>
              <td>Color: <span style="color:#F00">*</span></td>
              <td>
    <input type="button" value="Add" tabindex="5" class="btn btn-success btn-xs" onClick="addRow('add_color')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_color')" />
    <br/>
    <br/>
<table class="bottomBorder" id="add_color" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
    	<td>#</td>
        <td>Color Name</td>
        <td>Order Qty</td>
    </tr>
	<?php
		$SQL="SELECT ColorInfoID, Color, OrderQty FROM tb_vsfs_color_info WHERE StyleCode='$sid'";    //table name
		$results = $obj->sql($SQL);
		while($row = mysql_fetch_array($results))
		{
	?>
    <tr>
      <td><input name="chk" type="checkbox" /></td>
      <td><input name="color[]" value="<?php echo $row['Color']; ?>" type="text" tabindex="6" required autofocus />
      <input name="color_sl[]" value="<?php echo $row['ColorInfoID']; ?>" type="hidden" />
      </td>
      <td><input name="order_qty[]" value="<?php echo $row['OrderQty']; ?>" type="number" tabindex="7" required autofocus /></td>
    </tr>
    <?Php } ?>
</table>    
    
              </td>
            </tr>
            
            <tr>
              <td>Parts: <span style="color:#F00">*</span></td>
              <td>
    <input type="button" value="Add" tabindex="8" class="btn btn-success btn-xs" onClick="addPartsRow('add_parts')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_parts')" />
    <br/>
    <br/>
    <table class="bottomBorder" id="add_parts" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
    	<td>#</td>
    	<td>Part Name</td>
        <td>Print Status</td>
    </tr>
		<?php
			$sl = 0 ;
            $SQL="SELECT PartInfoID, PartName, IsPrint FROM tb_vsfs_part_info WHERE StyleCode='$sid'";    //table name
            $results = $obj->sql($SQL);
            while($row = mysql_fetch_array($results))
            {
        ?>
        <tr>
          <td><input name="chk" type="checkbox"/></td>
          <td><input name="parts[]" value="<?php echo $row['PartName'] ; ?>" type="text" tabindex="9" required autofocus />
      		<input name="part_sl[]" value="<?php echo $row['PartInfoID']; ?>" type="hidden" />
          </td>
          <td>
          <input type="radio" name="RadioGroup1[<?php echo $sl; ?>]" <?php if($row['IsPrint'] == 1) { echo 'checked';} ?> value="1" id="RadioGroup1_1" />Yes
   		  <input type="radio" name="RadioGroup1[<?php echo $sl; ?>]" <?php if($row['IsPrint'] == 0) { echo 'checked';} ?> value="0" id="RadioGroup1_0" />No
          </td>
        </tr>
        <?php $sl++; } ?>
    </table>    
    
              </td>
            </tr>
            <tr>
              <td>Size:</td>
              <td>
    <input type="button" value="Add" tabindex="10" class="btn btn-success btn-xs" onClick="addRow('add_size')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_size')" />
    <br/>
    <br/>
<table class="bottomBorder" id="add_size" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
    	<td>#</td>
    	<td>Size Number</td>
    </tr>
	<?php
		$SQL="SELECT SizeInfoID, size FROM tb_vsfs_size_info WHERE StyleCode='$sid'";    //table name
		$results = $obj->sql($SQL);
		while($row = mysql_fetch_array($results))
		{
	?>
    <tr>
      <td><input name="chk" type="checkbox" /></td>
      <td><input name="size[]" value="<?php echo $row['size']; ?>" type="text" tabindex="11" />
      <input name="size_sl[]" value="<?php echo $row['SizeInfoID']; ?>" type="hidden" />
      </td>
    </tr>
    <?Php } ?>
</table>    
    
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                   <div align="center"> 
	  <input name="submit" type="submit" class="btn btn-success" id="submit" value="Update" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />
        </div>
              </td>
            </tr>
            
        </table>
        
             </form>
      
             <br />
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>

