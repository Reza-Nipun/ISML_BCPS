
<?php	
	require_once('comon.php');
	require('header.php');
	
		$date = date("d-m-Y");
		
		$day_chk = date('l', strtotime(now)); // It contains the day name of Current Date
	
		if ($day_chk=="Saturday")
		{
		$previous_date = date('d-m-Y', strtotime('-2 days')); // It contains the date 2 days before from today.
		}
		else 
		{ $previous_date = date('d-m-Y', strtotime('-1 days')); }
		
?>

	<style type="text/css">
	
	<!--::-webkit-input-placeholder {color: black;}-->
	
	::-webkit-input-placeholder {color:#3CF;}
	
	.placeholder_color ::-webkit-input-placeholder {color: #FF6A22;}
	.placeholder_color :-moz-placeholder {color: #FF6A22;}
	.placeholder_color ::-moz-placeholder {color: #FF6A22;}
	.placeholder_color :-ms-input-placeholder {color: #FF6A22;}
	
	select { color:#000; }
	
	</style>
  
        
  <?php require("info.php"); ?>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Add Line Wise Cutting Information</h2>

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
            
      
     <form name="Form1" id="Form1" enctype="multipart/form-data" action="cutting_input_save.php" method="post" class="form-inline" role="form">

     <div style="padding:10px 10px 20px 10px">
     <strong>Entry Date: </strong>
     <select name="entry_date" id="entry_date" data-rel="chosen" required autofocus>
        <option style="color:#000" selected="selected" value="<?php echo $date; ?>"><?php echo $date; ?></option>
        <option style="color:#000" value="<?php echo $previous_date; ?>"><?php echo $previous_date; ?></option>
      </select>
     </div>

     	<table class="bottomBorder" border="1">
        	<tr>
            	<th>Line No: <span style="color:#F00">*</span></th>
                <td><select name="line" tabindex="2" id="line" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Select Line-</option>
					 
					 <?php         
                   $SQL2 = "SELECT content3 FROM tb_niddle_content GROUP BY content1, content2, content3 ORDER BY content3, length(content3) ASC";
                    $obj->sql($SQL2);
                    while($row2 = mysql_fetch_array($obj->result))
                      { 
                      $data=$row2['Color'];
                      echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                      }
                     ?>
                     
                </select></td>
            	<th>Style: <span style="color:#F00">*</span></th>
                <td><select name="style" id="style" tabindex="1" data-rel="chosen" required autofocus>
					<?php
                    $SQL="SELECT DISTINCT StyleCode, BuyerID FROM tb_vsfs_style ORDER BY StyleSL DESC";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <option style="color:#000" value="<?php echo $row['StyleCode'].'~'.$row['BuyerID']; ?>"><?php echo $row['StyleCode']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                
                </td>
            	<th><span style="text-align:right">Color:</span> <span style="color:#F00">*</span></th>
                
                <td><select name="color" tabindex="2" id="color" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Select Style-</option>
                  
					<!--<option style="color:#000" selected="selected" value="">-Select Color-</option>--> 
					 <?php         
                   /*$SQL2 = "SELECT Color FROM tb_vsfs_color_info T0 WHERE T0.StyleCode = (SELECT StyleCode FROM `tb_vsfs_style` ORDER BY StyleSL DESC LIMIT 0,1) ORDER BY ColorInfoID DESC";
                    $obj->sql($SQL2);
                    while($row2 = mysql_fetch_array($obj->result))
                      { 
                      $data=$row2['Color'];
                      echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                      }*/
                     ?>
                     
                </select>
                
                <td><div align="left" style="margin-left:100px"> 
	  
                      <input name="submit" type="submit" class="btn btn-success" tabindex="15" id="submit" value="Save" />
                      &nbsp;
                      <input name="input" type="reset" class="btn btn-danger" tabindex="16" value="Reset" />
      
    				</div>
    			</td>            
            </tr>
       </table>
             </form>
      
             <br />
                
            </div>
        </div>
    </div>

</div><!--/row-->


<?php require('footer.php'); ?>

