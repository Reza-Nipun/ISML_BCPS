
<?php	
	require_once('comon.php');
	require('header.php');
	
	$SQL="select * from tb_admin where sl='$dms_uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{ $name=$row['name']; }
	
	$get_msg = $_GET['msg'];
	
?>
  
        <SCRIPT language="javascript">
  
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
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
               
               <h2><i class="glyphicon glyphicon-edit"></i> Add New Style Information</h2>

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
             
            
            	<?php if($get_msg != '') { ?><br /><span style="color:#30C; font-size:14px; font-weight:bold; margin-left:20px"><?php echo $get_msg ; ?></span><br /><br /><?php } ?>
             
             <form name="" id="form1" action="style_edit_save.php" method="post" class="form-inline" role="form">

					<?php

if (!isset($_POST['Submit'])) {

	if($_GET['ID'])
	{
	$StyleSL = $_GET['ID'];
	}
	
//	die ($DateID);

$result = mysql_query("SELECT * FROM `tb_vsfs_style` WHERE StyleSL='$StyleSL'");
	if($result)
	{		
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				
				$StyleCode=$row['StyleCode'];
               ?>
     
     	<table>
        	<tr>
            	<td> Buyer: <span style="color:#F00">*</span></td>
                <td><select name="buyer" class="form-control" tabindex="1" required autofocus>
                    <option value="<?php echo $row['BuyerID']; ?>"><?php echo $row['BuyerID']; ?></option>
                </select>
                </td>
            </tr>
        	<tr>
            	<td> Style No: <span style="color:#F00">*</span></td>
                <td><input type="text" name="style" class="form-control" tabindex="2" value="<?php echo $row['StyleCode']; ?>" readonly="readonly"></td>
            </tr>
            <tr>
              <td> Style Description:</td>
              <td><textarea name="style_des" class="form-control" tabindex="3" readonly="readonly"><?php echo $row['StyleDesc']; ?></textarea></td>
            </tr>
              <td> Category:</td>
              <td><select name="category" class="form-control" tabindex="4">
                    <option value="<?php echo $row['CategorieID']; ?>"><?php echo $row['CategorieID']; ?></option>
                </select></td>
            </tr>
            <tr>
              <td>Add Color:</td>
              <td>
<?php 
$result_color = mysql_query("SELECT * FROM `tb_vsfs_color_info` WHERE StyleCode='$StyleCode'");
	if($result)
	{		
		while ($row_color = mysql_fetch_array($result_color, MYSQL_BOTH)) {
               ?>
Color: <?php echo $row_color['Color']."<br />"; ?>
<?php }}?>
    <br />
    <input type="button" value="Add" tabindex="5" class="btn btn-success btn-xs" onClick="addRow('add_color')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_color')" />
    <br/>
    <br/>
<table class="bottomBorder" id="add_color" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
      <td><input name="chk" type="checkbox" /></td>
      <td><input name="color[]" type="text" tabindex="6" /></td>
     </tr>
</table>    
    
              </td>
            </tr>
            
            <tr>
<!--              <td>Add Parts:</td>
-->              <td>
<?php 
$result_parts = mysql_query("SELECT * FROM `tb_vsfs_part_info` WHERE StyleCode='$StyleCode'");
	if($result)
	{		
		while ($row_parts = mysql_fetch_array($result_parts, MYSQL_BOTH)) {
               ?>
Part: <?php echo $row_parts['PartName']."<br />"; ?>
<?php }}?>
    <br />
<!--    <input type="button" value="Add" tabindex="7" class="btn btn-success btn-xs" onClick="addRow('add_parts')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_parts')" />
-->    <br/>
    <br/>
<!--<table class="bottomBorder" id="add_parts" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
      <td><input name="chk" type="checkbox"/></td>
      <td><input name="parts[]" type="text" tabindex="8" /></td>
      <td>Print ? <input type="radio" name="print_yes[]" value="1"> Yes <input type="radio" name="print_no[]" value="0" checked="checked"> No</td>
     </tr>
</table>    
-->    
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                   <div align="center"> 
	  <input name="submit" type="submit" class="btn btn-success" id="submit" value="Save" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />
        </div>
              </td>
            </tr>
            
        </table>
<?php } } }?>        
             </form>
      
             <br />
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>

