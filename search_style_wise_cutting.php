
<?php	
	require_once('comon.php');
	require('header.php');
	// require('menu.php');
	
	if (isset($_POST['submit']))
 	  {
		$s_style = $_POST['style'];
		$s_color = $_POST['color'];
		
		$search = 1;
	  }
	
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
        
       <script type="text/javascript">
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
</script>
        
  <?php // require("info_clr.php"); ?>
  
  
<!--<script type="info/jquery.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function()
{
$("#style").change(function()
{
var dis=$(this).val();
var dataString = 'dis='+ dis;

//alert(dataString);


$.ajax
({
type: "POST",
url: "info/ajax_clr_4_report.php",
data: dataString,
cache: false,
success: function(html)
{
$("#color").html(html);
} 
});




});
});
</script>
  
  
  

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Search Style Wise Cutting Information</h2>

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
             <form name="form1" id="form1" action="search_style_wise_cutting.php" method="post" class="form-inline" role="form">
            <table id="example" border="1" class="bottomBorder">
                <tr>
                    <td>Style No</td>
                      <td><select name="style" id="style" class="form-control" tabindex="1" data-rel="chosen" required autofocus>
                            <option style="color:#000" selected value="<?php echo $s_style; ?>"><?php echo $s_style; ?></option>
                            <?php
                            $SQL="SELECT StyleCode FROM tb_vsfs_cut_info GROUP BY StyleCode ORDER BY StyleCode ASC";    //table name
                            $results = $obj->sql($SQL);
                            while($row = mysql_fetch_array($results))
                            {
                            ?>
                            <option style="color:#000" value="<?php echo $row['StyleCode']; ?>"><?php echo $row['StyleCode']; ?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                    <td>Color</td>
                    <td><select name="color" class="form-control" tabindex="2" id="color" >
                          <option style="color:#000" selected="selected" value="">-Select Color-</option>
                            <option style="color:#000" selected value="<?php echo $s_color; ?>"><?php echo $s_color; ?></option>
                          
                             <?php         
                           $SQL = "SELECT Color FROM tb_vsfs_cut_info WHERE StyleCode = '$s_style' GROUP BY Color ORDER BY Color ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                              { 
                              $data=$row['Color'];
                              echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                              }
                           ?>
                        </select>
                    </td>
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
               <h2><i class="glyphicon glyphicon-edit"></i> Showing Details for Style <?php // echo ; ?> Information</h2>

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
            
    <table border="1" class="bottomBorder2" style="margin-left:40px; margin-top:10px">
      <tr>
            <td rowspan="2" valign="top">
 <br/>           
<span style="font-size:15px; font-weight:bold; color:#0F9; margin-left:30px">Cutting Summary of Style <?php echo $s_style; ?> &#10137;</span>
               <br/><br/> 
                <table border="1" class="bottomBorder2" width="495" style="margin-left:15px; margin-right:15px">
            <thead>
                 <tr bgcolor="#DDDDDD">
                    <th width="37">SL</th>
                    <th width="129">Buyer</th>
                    <th width="158">Style</th>
                    <th width="143">Color</th>
                    <th width="100">Unit</th>
                 </tr>
             </thead>
             
                <?php
                   $SQL = "SELECT * FROM tb_vsfs_cut_info WHERE StyleCode = '$s_style'";
                   if($s_color != '') { $SQL .= " AND Color = '$s_color'"; }
                   $SQL .= " GROUP BY Color, UnitName ORDER BY Color ASC";
                    
					//die($SQL);
					
					
					
					$sl = 1;
                    /*$result = $obj->sql($SQL);
                    while($row = mysql_fetch_array($result))*/
							
					$obj->sql($SQL);
					while($row = mysql_fetch_array($obj->result))
                        { 						
						
                        /*$StyleCode=$row2['StyleCode'];
                        $Color=$row2['Color'];
                        $OrderNo=$row2['OrderNo'];*/
                ?>
                
    <tr id="<?php echo $row['StyleCode'].'~'.$row['Color'].'~'.$row['UnitName'] ; ?>" class="edit_tr">
                
    
                    <td width="37"><?php echo $sl; ?></td>
                    <td width="129"><?php echo $row['buyer']; ?></td>
                    <td width="158"><?php echo $row['StyleCode']; ?></td>
                    <td width="143"><?php echo $row['Color']; ?></td>
                    <td width="100"><?php echo $row['UnitName']; ?></td>
                </tr>
                <?php $sl++; } ?>
              </table>
              <br/>
            </td>
            <td>
            <div id="date_log" style="padding:20px"></div>
            </td>
      </tr>
      <tr>
        <td><div id="size_log" style="padding:20px">
            	<!--<table class="bottomBorder2" border="1" width="300px">
                	<tr>
                    	<th>Color</th>
                        <th>Size</th>
                        <th>Qty</th>
                    </tr>
                	<tr>
                    	<td>Color</td>
                        <td>Size</td>
                        <td>Qty</td>
                    </tr>
                </table>-->
            </div>
        </td>
      </tr>  
            
     </table>
     
			
        
            </div>
        </div>
    </div>

</div>

<?php } ?>

<?php require('footer.php'); ?>
