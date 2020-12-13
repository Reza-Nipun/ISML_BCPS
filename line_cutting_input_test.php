
<?php	

// The work of this page didn't finish yet!!! It was created to check the chosen option on line_ws_cutting_input.php page.


	require_once('comon.php');
	require('header.php');
	
		
?>

	<style type="text/css">
	
	<!--::-webkit-input-placeholder {color: black;}-->
	
	::-webkit-input-placeholder {color:#3CF;}
	
	.placeholder_color ::-webkit-input-placeholder {color: #FF6A22;}
	.placeholder_color :-moz-placeholder {color: #FF6A22;}
	.placeholder_color ::-moz-placeholder {color: #FF6A22;}
	.placeholder_color :-ms-input-placeholder {color: #FF6A22;}
	
	select { color:#000; }
	
	/*select option { color:#000; }*/
	
	 /*.green option{
        color:#0F0;
    }*/
									
	</style>
  
        
  <?php require("info_clr.php"); ?>
  <?php require("info_cutno.php"); ?>

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
               <h2><i class="glyphicon glyphicon-edit"></i> Add Cutting Information</h2>

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
            
     <form name="form1" id="form1" action="line_ws_cutting_input_save.php" method="post" class="form-inline" role="form">
    <table id="example" border="1" class="bottomBorder">
        <tr>
          <th>Line No: <span style="color:#F00">*</span></th>
                <td><select name="line" tabindex="1" class="form-control" id="line" data-rel="chosen" required autofocus >
                  <!--<option style="color:#000" selected="selected" value="">-Select Line-</option>-->
					 
					 <?php         
                    $SQL2 = "SELECT content1, content2, content3 FROM tb_niddle_content GROUP BY content1, content2, content3 ORDER BY length(content3), content3 ASC";
                    $obj->sql($SQL2);
                    while($row2 = mysql_fetch_array($obj->result))
                      { 
                      $data=$row2['content3'];
                      $data1=$row2['content1'].'~'.$row2['content2'].'~'.$row2['content3'];
                      echo '<option style="color:#000" value="'.$data1.'">'.$data.'</option>';
                      }
                     ?>
                     
                </select></td>
        	<td>Style No <span style="color:#F00">*</span></td>
            <td><select name="style" id="style" tabindex="2" data-rel="chosen" required autofocus>
                    <option style="color:#000" selected value="<?php echo $s_style; ?>"><?php echo $s_style; ?></option>
					<?php
                    $SQL="SELECT buyer, StyleCode FROM tb_vsfs_cut_info GROUP BY StyleCode ORDER BY StyleCode ASC";    //table name
                    $results = $obj->sql($SQL);
                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <option style="color:#000" value="<?php echo $row['buyer'].'~'.$row['StyleCode']; ?>"><?php echo $row['StyleCode']; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
            <td>Season <span style="color:#F00">*</span></td>
            <td><select name="season" class="form-control" tabindex="3" id="season" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Select-</option>
                  <option style="color:#000" selected value="<?php echo $s_season; ?>"><?php echo $s_season; ?></option>
                  <option style="color:#000" value="ABC">ABC</option>
                  <option style="color:#000" value="XYZ">XYZ</option>
                </select></td>
        	<td>Color <span style="color:#F00">*</span></td>
            <td><select name="color" class="form-control" tabindex="4" id="color" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Select Color-</option>
                    <option style="color:#000" selected value="<?php echo $s_color; ?>"><?php echo $s_color; ?></option>
                  <option style="color:#000" value="ABC">ABC</option>
                  <option style="color:#000" value="XYZ">XYZ</option>
					 <?php         
                  /* $SQL = "SELECT StyleCode, Color FROM tb_vsfs_cut_info WHERE StyleCode = '$s_style' GROUP BY Color ORDER BY Color ASC";
                    $obj->sql($SQL);
                    while($row = mysql_fetch_array($obj->result))
                      { 
                      $data=$row['StyleCode'].'~'.$row['Color'];
                      $data1=$row['Color'];
                      echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                      }*/
                     ?>
                   
                </select>
            </td>
            <td>Cut No <span style="color:#F00">*</span></td>
            <td>
            <select name="CutNo" class="form-control" tabindex="5" id="CutNo" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Cut No-</option>
                    <option style="color:#000" selected value="<?php echo $s_cutting_no; ?>"><?php echo $s_cutting_no; ?></option>
                  
					 <?php
					          
                    $SQL = "SELECT CutNo FROM tb_vsfs_cut_info WHERE StyleCode = '$s_style' AND Color = '$s_color' ORDER BY CutNo ASC";
                    $obj->sql($SQL);
					
                    while($row = mysql_fetch_array($obj->result))
                      { 
					  $data=$row['CutNo'];
                      echo '<option style="color:#000" value="'.$s_style.'~'.$s_color.'~'.$data.'">'.$data.'</option>';
                      }
					  
                     ?>
                   
             </select>
                
      <!--<input name="CutNo" size="10px" placeholder="Cutting No" type="text" class="form-control" />-->
            </td>
            <td>Input Man</td>
            <td>
      <input name="InputMan" size="15px" tabindex="7" placeholder="Input Man" type="text" onClick="this.select();" class="form-control" />
            </td>
        	<!--<td>
              <input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
              &nbsp;
              <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" />            
            </td>-->
        
        </tr>
        <tr id="search_result">
        
              <!--<td colspan="10">
                <div style="padding:20px">
                	<table>
                    <tr>
                        <th>Size</th>
                        <th>Total Qty</th>
                        <th>Balance Qty</th>
                        <th>Line Input</th>
                    </tr>
                    <tr>
                        <td>S<input name="size" type="hidden" value="S" /></td>
                        <td>200</td>
                        <td>150</td>
                        <td><input name="input_qty" type="text" size="15px" placeholder="Line Input" class="form-control" /></td>                
                    </tr>
                </table> 
                </div>
                <div style="padding-left:114px; padding-bottom:20px">
                    <input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
                      &nbsp;
                    <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" />
                </div>        
              </td>-->
              
            </tr>
    </table>
    
    <!--<p id="search_result">-->
        <!--<table>
            <tr>
              <th>
                <table>
                    <tr>
                        <th>Size</th>
                        <th>Total Qty</th>
                        <th>Line Input</th>
                    </tr>
                    <tr>
                        <td>S<input name="size" type="hidden" value="S" /></td>
                        <td>200</td>
                        <td><input name="input_qty" type="text" size="15px" placeholder="Line Input" class="form-control" /></td>                
                    </tr>
                </table>          
              </th> 
            </tr>
        </table>-->
    
     </form>  
       
             <br />
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>

