
<?php	
	require_once('comon.php');
	require('header.php');
	// require('menu.php');
	
	$search = 0;
	
	if (isset($_POST['submit']))
 	  {
		  
		$search = 1;

		$s_line = $_POST['line'];
		$s_style = $_POST['style'];
		$s_color = $_POST['color'];
		$s_season = $_POST['season'];
		$s_cutting_no = $_POST['CutNo'];		
		$s_InputMan = $_POST['InputMan'];
		
		
		/*foreach($_POST['input_qty'] as $rowz=>$input_qty)
		{
		$size=mysql_real_escape_string($_POST['size'][$rowz]);
		
			$SQL = "SELECT T1.Size, SUM(T1.Qty) AS ttl_qty FROM tb_vsfs_cut_info T0 LEFT JOIN tb_vsfs_bundle_info T1 ON T1.CutID = T0.AutoCutID WHERE T0.StyleCode = '$style' AND T0.Color = '$color' AND T0.CutNo = '$CutNo' GROUP BY T1.Size ORDER BY T1.AutoBundleID ASC";
			$obj->sql($SQL);
		}*/
		
		
	  }
	  
	$get_msg = $_GET['msg'];	
	
?>

	<style type="text/css">	
	
	table.bottomBorder2 { border-collapse:collapse; }
    table.bottomBorder2 td, table.bottomBorder2 th { border-bottom:1px dotted white;padding:1px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
	
    table.bottomBorder2 tr { border:1px dotted white;padding:1px; }
	table.bottomBorder2 th { font-size:14px; color:#000; }
	table.bottomBorder2 td { font-size:13px; color:#fff; }
	
	select { color:#000; }

    </style> 

        <script src="img/CalendarControl1.js" type="text/javascript"></script>
    	<link href="img/CalendarControl.css" rel="stylesheet" type="text/css" />
        
       <!--<script type="text/javascript">
$(document).ready(function()
{
	
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
var dataString = 'ID='+ ID;


$.ajax
({
type: "POST",
url: "info/style_date_log.php",
data: dataString,
cache: false,
success: function(html)
{
$("#date_log").html(html);
} 
});




$.ajax
({
type: "POST",
url: "info/style_size_log.php",
data: dataString,
cache: false,
success: function(html)
{
$("#size_log").html(html);
} 
});





})

});
</script>-->
        
        
  <?php require("info_clr.php"); ?>
  <?php require("info_cutno.php"); ?>
  <?php require("cutno_wise_size_n_qty.php"); ?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Entry Line Wise Cutting Input Information</h2>

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
            
            
     <?php if($get_msg != '') { ?><br /><span style="color:#0F9; font-size:14px; font-weight:bold; margin-left:20px"><?php echo $get_msg ; ?></span><br /><br /><?php } ?>
             
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
            <td><select name="style" id="style" class="form-control" tabindex="2" data-rel="chosen" required autofocus>
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
                
                </select></td>
        	<td>Color <span style="color:#F00">*</span></td>
            <td><select name="color" class="form-control" tabindex="4" id="color" required autofocus >
                  <option style="color:#000" selected="selected" value="">-Select Color-</option>
                    <option style="color:#000" selected value="<?php echo $s_color; ?>"><?php echo $s_color; ?></option>
                  
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
    

    
     </form>   
     
      
            </div>
        </div>
    </div>

</div>


<?php require('footer.php'); ?>
