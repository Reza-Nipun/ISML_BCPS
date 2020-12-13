
<?php	
	
	require_once('comon.php');	
	
	/*require_once('comon_color.php');
	session_start(); 
	$vsfs_uid=$_SESSION['vsfs_userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();*/
	
	/*$SQL="select * from tb_admin where sl='$vsfs_uid'";    //table name
	//die($SQL);
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_name=$row['user_name'];
	}*/
	
	/*session_start();
	if(is_null($_SESSION['vsfs_userid']))
	{ header("location:login.php"); }
	else
	$vsfs_uid=$_SESSION['vsfs_userid'];
	//session_start(); 

	include "db_Class.php";
	$obj = new db_class();
	$obj->MySQL();*/
	
	require('header.php');
	
	
	if($_GET['srch'] != '')
	{
		$search = $_GET['srch'];
		
		$s_buyer = $_GET['buyer'];
		$s_style = $_GET['style'];
		$s_season = $_GET['season'];
		$s_CreateDateFrom = $_GET['CreateDateFrom'];
		$s_CreateDateTo = $_GET['CreateDateTo'];

	}
	
	
	
	if (isset($_POST['submit']))
 	  {
		$s_buyer = $_POST['buyer'];
		$s_style = $_POST['style'];
		$s_season = $_POST['season'];
		$s_CreateDateFrom = $_POST['CreateDateFrom'];
		$s_CreateDateTo = $_POST['CreateDateTo'];

	    $search = 1;
	  }	


	
	if($_GET['sid'] != '')
	{
		//$get_cid = $_GET['cid'] ;
		
		$decd_sid = base64_decode($_GET['sid']);
		
		$SQL_del = "DELETE FROM tb_vsfs_style WHERE StyleCode = '$decd_sid'";
		//die($SQL_del);
		
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");
		
		$SQL_del = "DELETE FROM tb_vsfs_color_info WHERE StyleCode = '$decd_sid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");

		$SQL_del = "DELETE FROM tb_vsfs_part_info WHERE StyleCode = '$decd_sid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");
		
		$SQL_del = "DELETE FROM tb_vsfs_size_info WHERE StyleCode = '$decd_sid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");

	}
		
	// $decd_CutID = base64_decode($get_cid);

?>


       <script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');

//$("#color_"+ID).hide();     //add jahid

//$("#knit_cmnt_"+ID).hide(); 
//$("#knit_status_"+ID).hide();
//$("#midle_"+ID).hide();

$("#color_input_"+ID).show();
$("#Clr_OrderQty_"+ID).show();

$("#part_input_"+ID).show();
$("#print_status_input_"+ID).show();
$("#size_input_"+ID).show();

//$("#uid_input_"+ID).show(); 

//$("#knit_cmnt_input_"+ID).show(); 
//$("#knit_status_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var color=$("#color_input_"+ID).val(); 
var Clr_OrderQty=$("#Clr_OrderQty_"+ID).val(); 
var part=$("#part_input_"+ID).val(); 
var print_status=$("#print_status_input_"+ID).val();
var size=$("#size_input_"+ID).val(); 
var style=$("#style_input_"+ID).val();
var uid=$("#uid_input_"+ID).val();


//var knit_cmnt=$("#knit_cmnt_input_"+ID).val();
//var knit_status=$("#knit_status_input_"+ID).val();    //add jahid
//var midle=$("#midle_input_"+ID).val();

//var dataString = 'id='+ ID +'&knit_delv='+knit_delv +'&knit_cmnt='+knit_cmnt +'&knit_status='+knit_status;
var dataString = 'color='+color+'Clr_OrderQty='+Clr_OrderQty+'&part='+part+'&print_status='+print_status+'&size='+size+'&style='+style+'&uid='+uid;

//alert(dataString);

//$("#knit_delv_"+ID).html('<img src="load.gif" />');                 // Loading image

//if(knit_delv.length>0 || knit_cmnt.length>0 || knit_status.length>0)
//{
$.ajax({
type: "POST",
url: "color_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#color_v_"+ID).html(color);
$("#Clr_OrderQty_v_"+ID).html(Clr_OrderQty);
$("#size_v_"+ID).html(size);
$("#part_v_"+ID).html(part);
$("#print_status_v_"+ID).html(print_status);

//$("#knit_cmnt_"+ID).html(knit_cmnt); 
//$("#knit_status_"+ID).html(knit_status);     // add jahid
//$("#midle_"+ID).html(midle);
}
});
//}
//else
//{
	// alert('Enter something.');
//}

});
// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>

  <style type="text/css">
  
	.editbox
	{
	display:none
	}
	.edit_tr:hover
	{
	/*background:url(edit.png) right no-repeat #E2F1FA;
	color:#000;*/
	cursor:pointer;
	}
	
	/*td
	{
	padding:5px;
	}*/
	
	/*.editbox
	{
	font-size:12px;
	width:60px;
	background-color:#ffffcc;
	border:solid 1px #000;
	padding:3px;
	}
	.edit_tr:hover
	{
	background:url(edit.png) right no-repeat #80C8E5;
	cursor:pointer;
	}*/ 
	 
	
    table.bottomBorder1 { border-collapse:collapse; vertical-align:top; text-align:center; }
    table.bottomBorder1 td, table.bottomBorder1 th { border-bottom:1px dotted white; text-align:center;padding:2px;
    font-size:12px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder1 tr, table.bottomBorder1 tr { border:1px dotted white;padding:2px; }
    
	table.bottomBorder1 td ul { text-align:left !important; }
	
	
  </style> 
  
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
               <h2><i class="glyphicon glyphicon-edit"></i> Search Style Information</h2>

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
             <form name="form1" id="form1" action="all_style_search.php" method="post" class="form-inline" role="form">
            <table width="1000" border="1" class="bottomBorder1">
              <tr>
              	 <th width="61">Buyer</th>	
                 <th width="69">Style No</th>
                 <th width="116">Season</th>
                 <th width="108">Create Date From</th>
                 <th width="95">Create Date To</th>
                 <th width="213" rowspan="2"><input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
                      <!--&nbsp;-->
                      <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" /> 
                 </th>
              </tr>  
                
                <tr>
                      <td>
                      <!--<select name="buyer" id="buyer" class="form-control" tabindex="1" data-rel="chosen">-->
                      <select name="buyer" id="buyer" class="form-control" tabindex="1" data-rel="chosen">
                            <option style="color:#000" selected value="<?php echo $s_buyer; ?>"><?php echo $s_buyer; ?></option>
                            <?php
                            $SQL="SELECT BuyerID FROM tb_vsfs_style GROUP BY BuyerID ORDER BY BuyerID ASC";    //table name
                            $results = $obj->sql($SQL);
                            while($row = mysql_fetch_array($results))
                            {
                            ?>
               <option style="color:#000" value="<?php echo $row['BuyerID']; ?>"><?php echo $row['BuyerID']; ?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                      
                      <td><!--<select name="style" id="style" class="form-control" tabindex="1" data-rel="chosen">-->
                      
                <select name="style" id="style" class="form-control" tabindex="2" data-rel="chosen">
                    <option style="color:#000" selected value="<?php echo $s_style; ?>"><?php echo $s_style; ?></option>
                            <?php
                            $SQL="SELECT StyleCode FROM tb_vsfs_style GROUP BY StyleCode ORDER BY StyleCode ASC";    //table name
                            $results = $obj->sql($SQL);
                            while($row = mysql_fetch_array($results))
                            {
                            ?>
                            <option style="color:#000" value="<?php echo $row['StyleCode']; ?>"><?php echo $row['StyleCode']; ?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                      <td><select name="season" class="form-control" tabindex="2" id="season" data-rel="chosen" >
                          <option style="color:#000" selected="selected" value="">-Select-</option>
                          <?php if($s_season != '') { ?>
                            <option style="color:#000" selected value="<?php echo $s_season; ?>"><?php echo $s_season; ?></option>
                          
                             <?php         
                           $SQL = "SELECT season FROM tb_vsfs_style WHERE season = '$s_season' GROUP BY season ORDER BY season ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                              { 
                              $data=$row['season'];
                              echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                              }
							  
						  }
                           ?>
                        </select></td>

                    <td>
                    	<input name="CreateDateFrom" size="15" placeholder="dd-mm-yyyy" type="text" class="form-control" onclick="showCalendarControl(this);" />
                    </td>
                   
                    <td>
                    	<input name="CreateDateTo" size="15" placeholder="dd-mm-yyyy" type="text" class="form-control" onclick="showCalendarControl(this);" />
                    </td>

                </tr>
            </table>
         </form>    
            </div>
        </div>
    </div>
</div>


<?php if ($search == 1) { ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <h2><i class="glyphicon glyphicon-edit"></i> Showing Search Details </h2>

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
        <div style="margin-left:40px">  
    <table id="example" border="1" width="1000px" class="bottomBorder">
        <thead>
             <tr>
                <th>SL</th>
                <th>Create Date</th>
                <th>Buyer</th>
                <th>Style</th>
                <th>Season</th>
                <th>Item</th>
                <th width="150px">Color Information</th>
                <th width="200px">Parts Information</th>
                <th>Size Info</th>
                <th>Action</th>
             </tr>
             <tr>
      <td><input type="hidden" name="Sl" value="Serial" class="search_init" /></td>
      <td><input type="text" name="Create Date" value="Create DT" size="15" class="search_init" /></td>
      <td><input type="text" name="Buyer" value="Buyer" size="10" class="search_init" /></td>
      <td><input type="text" name="Style" value="Style" size="10" class="search_init" /></td>
      <td><input type="text" name="Season" value="Season" size="10" class="search_init" /></td>
      <td><input type="text" name="Item" value="Item" size="10" class="search_init" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
             </tr>
         </thead>
         	<?php
			 
		// $sql = "select * from tb_vsfs_cut_info WHERE u_id != '' AND AutoCutID = '9' Order by sl DESC";

          $sql = "select * from tb_vsfs_style WHERE StyleSL != ''";
					  
					  if($s_buyer != NULL)
					  { $sql .= " AND BuyerID = '$s_buyer'"; }
					  
					  if($s_style != NULL)
					  { $sql .= " AND StyleCode = '$s_style'"; }
					  
					  if($s_season != NULL)
					  { $sql .= " AND season = '$s_season'"; }
					  
					  if($s_CreateDateFrom != '' AND $s_CreateDateTo == '')
					  { $sql .= " AND EntryDate = '$s_CreateDateFrom'"; }
					  
					  if($s_CreateDateFrom == '' AND $s_CreateDateTo != '')
					  { $sql .= " AND EntryDate = '$s_CreateDateTo'"; }
					  
					  if($s_CreateDateFrom != '' AND $s_CreateDateTo != '')
					  { $sql .= " AND STR_TO_DATE(EntryDate,  '%d-%m-%Y' ) between STR_TO_DATE( '$s_CreateDateFrom',  '%d-%m-%Y' ) and STR_TO_DATE( '$s_CreateDateTo',  '%d-%m-%Y' )";
                 	  }
		  
          $sql .= " Order by StyleSL DESC";

          $result = mysql_query($sql);
          $sl=1;
          while($row = mysql_fetch_array($result))
          {
			  $StyleCode = $row['StyleCode'];
			  $encd_sid = base64_encode($StyleCode);
			  
			  $StyleSL = $row['StyleSL'];
			  $encd_ssl = base64_encode($StyleSL);
			  			  
			?>

         <tr id="<?php echo $sl ; ?>" class="edit_tr">
      <td><?php echo $sl; ?></td>
      <td><?php echo $row['EntryDate']; ?></td>
      <td><?php echo $row['BuyerID']; ?></td>
      <td><?php echo $row['StyleCode']; ?></td>
      <td><?php echo $row['season']; ?></td>
      <td><?php echo $row['Item']; ?></td>
      <td class="edit_td">
        
        <details id="color_<?php echo $sl; ?>" onfocus="this.select()" class="text">
    <summary><samp style="color:#09F" title="Click to View Details"><i class="glyphicon glyphicon-eye-open icon-white"></i></samp></summary>
    
          <!--<summary>Color Info.</summary>-->
          <div align="center">
            <table border="1" class="bottomBorder1">
      		<tr><th>Color Name</th><th>Order Qty</th></tr>
			<?php 
                  $sql1 = "select Color, OrderQty from tb_vsfs_color_info WHERE StyleCode = '$StyleCode' Order by ColorInfoID ASC";
                  $result1 = mysql_query($sql1);
                  while($row1 = mysql_fetch_array($result1))
                  { ?><tr><td><?php echo $row1['Color']; ?></td>
                  <td><?php echo $row1['OrderQty']; ?></td>
                  </tr>
            <?php } ?>
              </table>
            </div>
          </details>
          
     <!--<samp style="color:#030" title="Click to Add Color" class="add_color" id="<?php // echo $sl ; ?>"><i class="glyphicon glyphicon-plus icon-white"></i></samp> -->    
    <div align="center">
    <span onfocus="this.select()" id="color_v_<?php echo $sl; ?>" class="text"></span>  
    &nbsp;
    <span onfocus="this.select()" id="Clr_OrderQty_v_<?php echo $sl; ?>" class="text"></span>  
	<input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="color_input_<?php echo $sl; ?>" size="11" placeholder="Color" />
	<input type="number" class="editbox" onClick="this.select()" onfocus="this.select()" id="Clr_OrderQty_<?php echo $sl; ?>" size="5" placeholder="Order Qty" />
    <input type="text" class="editbox" id="style_input_<?php echo $sl; ?>" value="<?php echo $StyleCode; ?>" />      
    <input type="text" class="editbox" id="uid_input_<?php echo $sl; ?>" value="<?php echo $vsfs_uid; ?>" />
    </div>      

      </td>
      <td>
              <details>
    <summary><samp style="color:#09F" title="Click to View Details"><i class="glyphicon glyphicon-eye-open icon-white"></i></samp></summary>
    
    <!--<summary>Part Info.</summary>-->
    
    <div align="center">
      <table border="1" class="bottomBorder1">
      <tr><th>Part Name</th><th>Print</th></tr>
            <?php 
          $sql1 = "select PartName, IsPrint from tb_vsfs_part_info WHERE StyleCode = '$StyleCode' Order by PartInfoID ASC";
		  //die($sql1);
          $result1 = mysql_query($sql1);
          while($row1 = mysql_fetch_array($result1))
          { 
		  ?>
      <tr>
      <td><?php echo $row1['PartName']; ?></td>
      <td><?php if($row1['IsPrint'] == 1) echo 'Yes'; else echo 'X'; ?></td>
      </tr>
          <?php
		   }
		   ?>
      
      </table>
      </div>
      </details>
      
    <div align="center">
    <span onfocus="this.select()" id="part_v_<?php echo $sl; ?>" class="text"></span>
    &nbsp;
    <span onfocus="this.select()" id="print_status_v_<?php echo $sl; ?>" class="text"></span>

	<input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="part_input_<?php echo $sl; ?>" size="11" placeholder="Part Name" />    
    <!--&nbsp;-->
    <select class="editbox" onClick="this.select()" onfocus="this.select()" id="print_status_input_<?php echo $sl; ?>">
      <option style="color:#000" value="">Select</option>
      <option style="color:#000" value="No">No</option>
      <option style="color:#000" value="Yes">Yes</option>
    </select>
    
    </div>      
      
      </td>
      <td class="edit_td">
        
        <details id="size_<?php echo $sl; ?>" onfocus="this.select()" class="text">
    <summary><samp style="color:#09F" title="Click to View Details"><i class="glyphicon glyphicon-eye-open icon-white"></i></samp></summary>
    
          <!--<summary>Color Info.</summary>-->
          <div align="center">
            <table border="1" class="bottomBorder1" cellpadding="3px">
			<?php 
                  $sql1 = "select size from tb_vsfs_size_info WHERE StyleCode = '$StyleCode' Order by SizeInfoID ASC";
                  $result1 = mysql_query($sql1);
                  while($row1 = mysql_fetch_array($result1))
                  { ?><tr><td>&nbsp;&nbsp;<?php echo $row1['size']; ?>&nbsp;&nbsp;</td></tr>
            <?php } ?>
              </table>
            </div>
          </details>
          
     <!--<samp style="color:#030" title="Click to Add Color" class="add_color" id="<?php // echo $sl ; ?>"><i class="glyphicon glyphicon-plus icon-white"></i></samp> -->    
    <div align="center">
    <span onfocus="this.select()" id="size_v_<?php echo $sl; ?>" class="text"></span>      
	<input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="size_input_<?php echo $sl; ?>" size="11" />
    </div>      

      </td>
      
      
      
      
      <td><div align="center">
      <a href="edit_style.php?id=<?php echo $encd_ssl; ?>&sid=<?php echo $encd_sid; ?>" title="Click to Edit." target="_blank" >
      <samp style="color:#0F9"><i class="glyphicon glyphicon-edit icon-white"></i></samp></a>
      <!--<samp style="color:#30F">-->
      &nbsp;
      <a href="all_style_search.php?sid=<?php echo $encd_sid; ?>&srch=<?php echo $search; ?>&buyer=<?php echo $s_buyer; ?>&style=<?php echo $s_style; ?>&season=<?php echo $s_season; ?>&CreateDateFrom=<?php echo $s_CreateDateFrom; ?>&CreateDateTo=<?php echo $s_CreateDateTo; ?>" title="Delete" onclick="return confirm('Are you sure you want to DELETE Style: <?php echo $StyleCode ; ?> ?')">
      <samp style="color:#F00"><i class="glyphicon glyphicon-trash icon-white"></i></samp></a>
        </div></td>
      </tr>
         
         <?php $sl++; } ?>
     </table>
     	</div>
     
			<script type="text/javascript" charset="utf-8">
			var asInitVals = new Array();
			
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
					}
				} );
				
				$("thead input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("thead input").index(this) );
				} );
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
				$("thead input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("thead input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("thead input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("thead input").index(this)];
					}
				} );
			} );
			
			
			
	/* select */		
			
			
			$(document).ready(function() {
    /* Add/remove class to a row when clicked on */
    $('#example tr').click( function() {
        $(this).toggleClass('row_selected');
    } );
     
    /* Init the table */
    var oTable = $('#example').dataTable( );
} );
 
 
/*
 * I don't actually use this here, but it is provided as it might be useful and demonstrates
 * getting the TR nodes from DataTables
 */
function fnGetSelected( oTableLocal )
{
    return oTableLocal.$('tr.row_selected');
}
		</script>
        
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
<?php } ?>

<?php require('footer.php'); ?>

