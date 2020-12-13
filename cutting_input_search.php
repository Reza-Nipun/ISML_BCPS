
<?php	
	require_once('comon.php');
	require('header.php');
	
	if($_GET['cid'] != '')
	{
		//$get_cid = $_GET['cid'] ;
		
		$decd_cid = base64_decode($_GET['cid']);
		
		$SQL_del = "DELETE FROM tb_vsfs_cut_info WHERE AutoCutID = '$decd_cid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");
		
		$SQL_del = "DELETE FROM tb_vsfs_bundle_info WHERE CutID = '$decd_cid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");

		$SQL_del = "DELETE FROM tb_vsfs_size_marker WHERE cut_id = '$decd_cid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");
		
		$SQL_del = "DELETE FROM tb_vsfs_sticker_info WHERE CutID = '$decd_cid'";
		$obj->sql($SQL_del);
		$sq=mysql_real_escape_string($SQL_del);
		include("executed_sql.php");

	}
		
	// $decd_CutID = base64_decode($get_cid);

?>
  
	<style type="text/css">
    table.bottomBorder1 { border-collapse:collapse; vertical-align:top; text-align:center; }
    table.bottomBorder1 td, table.bottomBorder1 th { border-bottom:1px dotted white;padding:2px;
    font-size:12px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder1 tr, table.bottomBorder1 tr { border:1px dotted white;padding:2px; }
    </style> 
  
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
               <h2><i class="glyphicon glyphicon-edit"></i> Search Cutting Information</h2>

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
            
    <table width="1060" border="1" class="bottomBorder" id="example">
        <thead>
             <tr>
                <th width="47">SL</th>
                <th width="45">Cut ID</th>
                <th width="62">Buyer</th>
                <th width="62">Style</th>
                <th width="62">Color</th>
                <th width="49">Cut No</th>
                <th width="77">Order No</th>
                <th width="49">Lot No</th>
                <th width="36">Lay</th>
                <th width="47">Total<br/>Panel</th>
                <th width="132">Size Information</th>
                <th width="72">Entry Date</th>
                <th width="250">Action</th>
             </tr>
             <tr>
      <td><input type="hidden" name="Sl" value="Serial" class="search_init" /></td>
      <td><input type="text" name="Cut ID" value="Cut ID" size="3" class="search_init" /></td>
      <td><input type="text" name="Buyer" value="Buyer" size="10" class="search_init" /></td>
      <td><input type="text" name="Style" value="Style" size="10" class="search_init" /></td>
      <td><input type="text" name="Color" value="Color" size="10" class="search_init" /></td>
      <td><input type="text" name="Cut No" value="Cut No" size="8" class="search_init" /></td>
      <td><input type="text" name="Order No" value="Order No" size="12" class="search_init" /></td>
      <td><input type="text" name="Lot No" value="Lot No" size="8" class="search_init" /></td>
      <td><input type="text" name="Lay" value="Lay" size="3" class="search_init" /></td>
      <td><input type="text" name="Ttl Cup Panel" value="Ttl Cut Panel" size="5" class="search_init" /></td>
      <td><input type="hidden" name="size" value="size" class="search_init" /></td>
      <td><input type="text" name="Date" value="Date" size="12" class="search_init" /></td>
      <td>&nbsp;</td>
             </tr>
         </thead>
         	<?php
			 
		// $sql = "select * from tb_vsfs_cut_info WHERE u_id != '' AND AutoCutID = '9' Order by sl DESC";

          $sql = "select * from tb_vsfs_cut_info WHERE u_id != '' Order by sl DESC";
          $result = mysql_query($sql);
          $sl=1;
          while($row = mysql_fetch_array($result))
          {
			  $AutoCutID = $row['AutoCutID'];
			  $encd_cid = base64_encode($AutoCutID);
			  
			  $StyleCode = $row['StyleCode'];
			?>

         <tr>
      <td><?php echo $sl; ?></td>
      <td><?php echo $AutoCutID ; ?></td>
      <td><?php echo $row['buyer']; 
          /*$sql1 = "select BuyerID from tb_vsfs_style WHERE StyleCode = '$StyleCode' Order by StyleSL DESC LIMIT 0,1";
          $result1 = mysql_query($sql1);
          while($row1 = mysql_fetch_array($result1))
          { echo $row1['BuyerID'];}*/
	   ?></td>
      <td><?php echo $row['StyleCode']; ?></td>
      <td><?php echo $row['Color']; ?></td>
      <td><?php echo $row['CutNo']; ?></td>
      <td><?php echo $row['OrderNo']; ?></td>
      <td><?php echo $row['LotNo']; ?></td>
      <td><?php echo $row['Lay']; ?></td>
      <td><?php echo $row['Quantity']; ?></td>


      <td>
        <details>
          <summary>Size - Marker Info.</summary>
          <div align="center">
            <table border="1" class="bottomBorder1">
              <tr><th>Size</th><th>Marker</th><th>Bndl Ratio</th><th>Lot</th></tr>
              <?php 
		  
		  $lay_cnt = 0;
          $sql1 = "select * from tb_vsfs_size_marker WHERE cut_id = '$AutoCutID' Order by sl ASC";
          $result1 = mysql_query($sql1);
          while($row1 = mysql_fetch_array($result1))
          { 
		  ?>
              <tr>
                <td><?php echo $row1['size']; ?></td>
                <td><?php echo $row1['marker']; ?></td>
                <td><?php echo $row1['bundle_ratio']; ?></td>
                <td><?php echo $row1['lot_no']; ?></td>
                </tr>
              <?php
		   }
		   ?>
              
              </table>
            </div>
          </details>
      </td>
      <td><?php echo $row['entry_date']; ?></td>
      <td><div align="center">
      <a href="print_cut_panels_pdf.php?cid=<?php echo $encd_cid; ?>&pf=0" target="_blank">
      <!--<samp style="color:#F00"><i class="glyphicon glyphicon-trash icon-white"></i></samp>-->
        <input name="print" type="submit" id="submit" style="background-color:#0C0" value="Solid" /></a>
      <a href="print_cut_panels_pdf.php?cid=<?php echo $encd_cid; ?>&pf=1" target="_blank">
      <input name="without_print" type="submit" style="background-color:#FF9" value="Print" /></a>
      
      <!--<a href="<?php // if($special!= 1) echo 'cutting_input_edit.php'; else echo 'cutting_input_special_edit.php';  ?>?cid=<?php // echo $encd_cid; ?>" target="_blank">
      <samp style="color:#09F"><i class="glyphicon glyphicon-edit icon-white"></i></samp>
      </a>
      &spe=<?php // echo $special; ?>
      -->
      
      <a href="cutting_input_print.php?cid=<?php echo $encd_cid; ?>&ttl=<?php echo base64_encode($ttl_cut_pnl); ?>" target="_blank">
      <!--<span style="font-size:11px">Size Break Down</span>-->
      <samp style="color:#09F"><i class="glyphicon glyphicon-th-large icon-white"></i></samp>
      </a>

      <a href="cutting_input_edit.php?cid=<?php echo $encd_cid; ?>" target="_blank">
      <samp style="color:#0F9"><i class="glyphicon glyphicon-edit icon-white"></i></samp>
      </a>
      
      <a href="cutting_input_search.php?cid=<?php echo $encd_cid; ?>" title="Delete" onclick="return confirm('Are you sure you want to DELETE Auto Cut ID: <?php echo $AutoCutID ; ?> with Cut No: <?php echo $row['CutNo'] ; ?> ?')">
      <samp style="color:#F00"><i class="glyphicon glyphicon-trash icon-white"></i></samp></a>

        </div></td>
      </tr>
         
         <?php $sl++; } ?>
     </table>
     
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


<?php require('footer.php'); ?>

