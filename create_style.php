
<?php	
	require_once('comon.php');
	require('header.php');
	
	$SQL="select * from tb_admin where sl='$dms_uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{ $name=$row['name']; }
	
	$get_msg = $_GET['msg'];
	
?>


	<style type="text/css">
	
	/*table.bottomBorder2 { border-collapse:collapse; border-color:#09F; }*/
	table.bottomBorder2 { border-collapse:collapse; }
    table.bottomBorder2 td, table.bottomBorder2 th { border-bottom:1px dotted gray;padding:5px;
    font-size:14px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder2 tr { border:1px dotted gray;padding:5px;
	/*border-color:#09F;*/
	 }
	 
	/*option{ color:#000; }*/
		
    </style> 
    
    
    <script language="javascript" type="text/javascript">

        function deleteSpecialChar1(style) {
            if (style.value != '') 
            {
				str = style.value;
				res = "";
				var j;
				for (j = 0; j < str.length; j++) {
						
				if(str[j] != '&' && str[j] != '%' && str[j] != '*' && str[j] != '\\' && str[j] != '\'' && str[j] != '"' && str[j] != '*' && str[j] != '_') { res += str[j]; }
				else{
				alert('Error !!! You are trying to input Special Characters. ');
				}
				
			}
				
		document.getElementById("style").value = res;
		
			} }

  
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
				
				//alert('Allah is One');
				 //alert(radio);				
                
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

<!--<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>-->

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
             
            
            	<?php if($get_msg != '') { ?><br /><span style="color:#0F9; font-size:14px; font-weight:bold; margin-left:20px"><?php echo $get_msg ; ?></span><br /><br /><?php } ?>
             
             <form name="" id="form1" action="create_style_save.php" method="post" class="form-inline" role="form">

     <!--<form class="form-inline" role="form">-->
     
     	<table class="bottomBorder2" border="1" style="margin-left:30px; margin-top:15px">
        	<tr>
            	<td> Buyer: <span style="color:#F00">*</span></td>
                <td><select name="buyer" class="form-control" tabindex="1" data-rel="chosen" required autofocus>
					<?php
                    $SQL="SELECT DISTINCT concern_name FROM tb_concern WHERE concern_type='Buyer'";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <option style="color:#000" value="<?php echo $row['concern_name']; ?>"><?php echo $row['concern_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!--&nbsp;
                <img name="new_buyer" src="img/new.png" width="30" height="30" alt="" />
                &nbsp;
                <img name="new_buyer" src="img/new1.png" width="25" height="25" alt="" />-->
                
                <a href="JavaScript:newPopup('new_buyer_add.php');">&nbsp;<img name="new_buyer" src="img/new1.png" width="25" height="25" alt="" title="Click to Add New Buyer" /></a>
                
                </td>
            </tr>
        	<tr>
            	<td> Style No: <span style="color:#F00">*</span></td>
<!--                <td><input type="text" name="style" id="style" onChange="javascript:deleteSpecialChar1(this)" class="form-control" tabindex="2" placeholder="Style No" required autofocus ></td>-->
                <td><input type="text" name="style" id="style" onblur="checkStyle();" class="form-control" tabindex="2" placeholder="Style No" required autofocus ></td>
            </tr>
            
            <tr>
              <td>Season: <span style="color:#F00">*</span></td>
              <td><input type="text" name="season" id="season" onchange="" class="form-control" tabindex="2" placeholder="Season" required autofocus /></td>
            </tr>
            
            <!--<tr>
              <td> Style Description:</td>
              <td><textarea name="style_des" class="form-control" tabindex="3" placeholder="Style Description"></textarea></td>
            </tr>
            
            
            
            <tr>
              <td> Category:</td>
              <td><select name="category" class="form-control" tabindex="4">
					<?php
                    /*$SQL="SELECT DISTINCT concern_name FROM tb_concern WHERE concern_type='Category'";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {*/
                    ?>
                    <option value="<?php // echo $row['concern_name']; ?>"><?php // echo $row['concern_name']; ?></option>
                    <?php
                   // }
                    ?>
                </select></td>
            </tr>
            -->
            
            
            <tr>
              <td> Item Name: <span style="color:#F00">*</span></td>
              <td><select name="item_name" class="form-control" tabindex="4" data-rel="chosen" required autofocus >
					<?php
                    $SQL="SELECT DISTINCT concern_name FROM tb_concern WHERE concern_type='Item' ORDER BY concern_name ASC";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <option style="color:#000" value="<?php echo $row['concern_name']; ?>"><?php echo $row['concern_name']; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
            </tr>
            
            
            
            <tr>
              <td valign="middle">Add Color: <span style="color:#F00">*</span></td>
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
    <tr>
      <td><input name="chk" type="checkbox" /></td>
      <td>
      <input name="color[]" type="text" list="color_datalist" tabindex="6" required autofocus />
      <datalist id="color_datalist">
		  <?php
            $SQL="SELECT DISTINCT Color from tb_vsfs_color_info";    //table name
            $results = $obj->sql($SQL);
            while($row = mysql_fetch_array($results))
            {
            ?>
            <option style="color:#000" value="<?php echo $row['Color']; ?>"></option>
        <?php
        }
        ?>
	 </datalist>
     </td>
      <td><input name="order_qty[]" type="number" tabindex="7" required autofocus /></td>
     </tr>
</table>    
    
              </td>
            </tr>
            
            <tr>
              <td>Add Parts: <span style="color:#F00">*</span></td>
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
	  $pts = 0;
		$SQL="SELECT concern_name from tb_concern WHERE concern_type = 'part'";    
		$results = $obj->sql($SQL);
		while($row = mysql_fetch_array($results))
		{
		?>
        
    <tr>
      <td><input name="chk" type="checkbox"/></td>
        <td>
 <input name="parts[<?php echo $pts; ?>]" value="<?php echo $row['concern_name']; ?>" type="text" list="parts_datalist" tabindex="9" onclick="select()" required autofocus />
</td>
      <td>      
   <input type="radio" name="RadioGroup1[<?php echo $pts; ?>]" value="1" id="RadioGroup1_1" />Yes
   <input type="radio" name="RadioGroup1[<?php echo $pts; ?>]" checked value="0" id="RadioGroup1_0" />No
     </td>
     </tr>
	
	
	
	<?php
    $pts++; }
    ?>
    
    
     
     
     
     
</table>    
    
              </td>
            </tr>
            
            
            <tr>
              <td>Add Size:</td>
              <td>
    <input type="button" value="Add" tabindex="7" class="btn btn-success btn-xs" onClick="addRow('add_size')" />&nbsp;
    <input type="button" value="Delete" class="btn btn-warning btn-xs" onClick="deleteRow('add_size')" />
    <br/>
    <br/>
<table class="bottomBorder" id="add_size" style="box-shadow:0px 0px 0px 0px #FFF ;" border="1">
    <tr>
    	<td>#</td>
    	<td>Size Number</td>
    </tr>
    <tr>
      <td><input name="chk" type="checkbox"/></td>
      <td><input name="size[]" type="text" list="size_datalist" tabindex="8" />
        <datalist id="size_datalist">
        <?php
		$SQL="SELECT DISTINCT size from tb_vsfs_size_info";    //table name
		$results = $obj->sql($SQL);
		while($row = mysql_fetch_array($results))
		{
		?>
        <option style="color:#000" value="<?php echo $row['size']; ?>"></option>
	<?php
    }
    ?>
	</datalist>
</td>
     </tr>
</table>    
    
              </td>
            </tr>
            
            
            <tr>
              <td colspan="2" align="center">
                   <div align="center"> 
	  <input name="submit" type="submit" class="btn btn-success"  id="submit" value="Save" disabled/>
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

<script type="text/javascript">

    function checkStyle() {
        var style = $('#style').val();

        $.ajax({
            url: "chk.php",
            type:"POST",
            dataType:'json',
            data:{style:style },
            success: function (data) {
                if(data.length > 0){
                    $('#style').css('background-color', '#f96161');
                    $('#style').css('color', '#ffffff');
//                    $("#submit_btn").attr('disabled', true);
                    $('#submit').prop("disabled", true);
                }


                else{
                    $('#style').css('background-color', '');
                    $('#style').css('color', '');
                    $("#submit").attr('disabled', false);
                }
            }

        });
    }
</script>