
<?php	
	require_once('comon.php');
	require('header.php');
	
	
	if($_GET['srch'] != '')
	{
		$search = $_GET['srch'];
		$s_auto_id = $_GET['aid'];
		$s_buyer = $_GET['byr'];
		$s_style = $_GET['stl'];
		$s_season = $_GET['ssn'];
		$s_color = $_GET['clr'];
		$s_CutNo = $_GET['cno'];
		$s_EntryDate = $_GET['dt'];
	}
	
	
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
	
	
	if (isset($_POST['submit']))
 	  {
		$s_auto_id = $_POST['auto_id'];
		$s_buyer = $_POST['buyer'];
		$s_style = $_POST['style'];
		$s_season = $_POST['season'];
		$s_color = $_POST['color'];
		$s_CutNo = $_POST['CutNo'];
		$s_EntryDate = $_POST['EntryDate'];

	    $search = 1;
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
	
	
	ul.pagination > li > a {
	  border: 1px solid #F1F1F1;
	  margin-right:5px;
	  border-radius: 5px;
	  font-size: 16px;
	  padding: 5px 14px;
	}
	
	ul.pagination > li > a i{
	  margin-left:5px;
	  margin-right:5px;
	}
	
	ul.pagination > li.active > a, 
	ul.pagination > li:hover > a {
	  background-color: #00AEEF !important;
	  border-color: #00AEEF !important;
	  color: #fff;
	}
	
	/*ul.pagination > li.active > a, 
	ul.pagination > li:hover > a {
	  background-color: #DDDDDD !important;
	  border-color: #c52d2f !important;
	  color: #fff;
	}*/
	

	
    </style> 
       
        <script src="js/CalendarControl1.js" type="text/javascript"></script>
    	<link href="css/CalendarControl.css" rel="stylesheet" type="text/css" />
	    <link href="css/font-awesome.min.css" rel="stylesheet">

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


<!--<div class="breadcrumb">
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>-->
  <?php require("info_style.php"); ?>
  <?php require("info_cutting_clr.php"); ?>

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
            <!--id="example" -->
             <form name="form1" id="form1" action="cutting_input_search1.php" method="post" class="form-inline" role="form">
            <table border="1" class="bottomBorder1">
              <tr>
                 <th>Auto Cut ID</th>
              	 <th>Buyer</th>	
                 <th>Style No</th>
                 <th>Season</th>
                 <th>Color</th>
                 <th>Cut No</th>
                 <th>Entry Date</th>
                 <th rowspan="2"><input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
                      <!--&nbsp;-->
                      <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" /> 
                 </th>
              </tr>  
                
                <tr>
                	  <td>
                    	<input name="auto_id" size="10px" placeholder="Auto ID" type="text" class="form-control" />
                      </td>
                      <td>
                      <!--<select name="buyer" id="buyer" class="form-control" tabindex="1" data-rel="chosen">-->
                      <select name="buyer" id="buyer" class="form-control" tabindex="1">
                            <option style="color:#000" selected value="<?php echo $s_buyer; ?>"><?php echo $s_buyer; ?></option>
                            <?php
                            $SQL="SELECT buyer FROM tb_vsfs_cut_info GROUP BY buyer ORDER BY buyer ASC";    //table name
                            $results = $obj->sql($SQL);
                            while($row = mysql_fetch_array($results))
                            {
                            ?>
                            <option style="color:#000" value="<?php echo $row['buyer']; ?>"><?php echo $row['buyer']; ?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                      
                      <td><!--<select name="style" id="style" class="form-control" tabindex="1" data-rel="chosen">-->
                      <select name="style" id="style" class="form-control" tabindex="1">
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
                      <td><select name="season" class="form-control" tabindex="2" id="season" >
                          <option style="color:#000" selected="selected" value="">-Select-</option>
                          <?php if($s_season != '') { ?>
                            <option style="color:#000" selected value="<?php echo $s_season; ?>"><?php echo $s_season; ?></option>
                          
                             <?php         
                           $SQL = "SELECT season FROM tb_vsfs_cut_info WHERE season = '$s_season' GROUP BY season ORDER BY season ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                              { 
                              $data=$row['season'];
                              echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                              }
							  
						  }
                           ?>
                        </select></td>
                    <!--<td>Color</td>-->
                    <td><select name="color" class="form-control" tabindex="2" id="color" >
                          <option style="color:#000" selected="selected" value="">-Select Color-</option>
                          <?php if($s_color != '') { ?>
                            <option style="color:#000" selected value="<?php echo $s_color; ?>"><?php echo $s_color; ?></option>
                             <?php         
                           $SQL = "SELECT Color FROM tb_vsfs_cut_info WHERE StyleCode = '$s_style' GROUP BY Color ORDER BY Color ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                              { 
                              $data=$row['Color'];
                              echo '<option style="color:#000" value="'.$data.'">'.$data.'</option>';
                              }
						  }
                           ?>
                        </select>
                    </td>
                    <td>
                    	<input name="CutNo" size="10px" placeholder="Cutting No" type="text" class="form-control" />
                    </td>
                    <td>
                    	<input name="EntryDate" size="15" placeholder="dd-mm-yyyy" type="text" class="form-control" onclick="showCalendarControl(this);" />
                        <!--<input type="text" name="valid_to" class="form-control" placeholder="Insurance Expiry Date" tabindex="7" onclick="showCalendarControl(this);" required autofocus >-->
                    </td>
                    <!--<td rowspan="2"><input name="submit" type="submit" class="btn btn-success" tabindex="4" id="submit" value="Search" />
                      &nbsp;
                      <input name="input" type="reset" class="btn btn-danger" tabindex="5" value="Reset" /> 
                 	</td>-->
                    
                    <!--<td>
                                 
                    </td>-->
                
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
               <h2><i class="glyphicon glyphicon-edit"></i> Showing Result of Searched Cutting Information</h2>
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
            
                <table width="1140" border="1" class="bottomBorder">
                    <thead>
                         <tr>
                            <th width="47">SL</th>
                            <th width="45">Cut ID</th>
                            <th width="62">Buyer</th>
                            <th width="62">Style</th>
                            <th width="62">Season</th>
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
                     </thead>
                        <?php
                         
				//PER PAGE COMPONENT
                $per_page=10;
                //PAGE NO.
                if(!isset($_GET['page']))
                {
                $page=1;
                }else
                {
                $page = $_GET['page'];
                }
                if($page<=1)
                $start=0;
                else
                $start = $page * $per_page - $per_page;
				
						 
                      $sql = "select * from tb_vsfs_cut_info WHERE u_id != ''";
					  
					  if($s_auto_id != NULL)
					  { $sql .= " AND AutoCutID = '$s_auto_id'"; }
					  
					  if($s_buyer != NULL)
					  { $sql .= " AND buyer = '$s_buyer'"; }
					  
					  if($s_style != NULL)
					  { $sql .= " AND StyleCode = '$s_style'"; }
					  
					  if($s_season != NULL)
					  { $sql .= " AND season = '$s_season'"; }
					  
					  if($s_color != NULL)
					  { $sql .= " AND Color = '$s_color'"; }
					  
					  if($s_CutNo != NULL)
					  { $sql .= " AND CutNo = '$s_CutNo'"; }
					  
					  if($s_EntryDate != NULL)
					  { $sql .= " AND entry_date = '$s_EntryDate'"; }

					  
                      $sql .= " Order by sl DESC";

						$num_rows = mysql_num_rows(mysql_query($sql));
						$num_pages = ceil($num_rows / $per_page); 
						$sql .= " LIMIT $start, $per_page";
						
						// die($sql);
						
						$result = mysql_query($sql);
						$sl=$start+1;
                     
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
                  <td><?php echo $row['season']; ?></td>
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
                  <a href="print_cut_panels_pdf_1.php?cid=<?php echo $encd_cid; ?>&pf=0" target="_blank">
                  <!--<samp style="color:#F00"><i class="glyphicon glyphicon-trash icon-white"></i></samp>-->
                    <input name="print" type="submit" id="submit" style="background-color:#0C0" value="Solid" /></a>
                  <a href="print_cut_panels_pdf_1.php?cid=<?php echo $encd_cid; ?>&pf=1" target="_blank">
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
                  
                  <a href="cutting_input_search.php?cid=<?php echo $encd_cid; ?>&page=<?php echo $page; ?>&srch=<?php echo $search; ?>&aid=<?php echo $s_auto_id; ?>&byr=<?php echo $s_buyer; ?>&stl=<?php echo $s_style; ?>&ssn=<?php echo $s_season; ?>&clr=<?php echo $s_color; ?>&cno=<?php echo $s_CutNo; ?>&dt=<?php echo $s_EntryDate; ?>" title="Delete" onclick="return confirm('Are you sure you want to DELETE Auto Cut ID: <?php echo $AutoCutID ; ?> with Cut No: <?php echo $row['CutNo'] ; ?> ?')">
                  <samp style="color:#F00"><i class="glyphicon glyphicon-trash icon-white"></i></samp></a>
            
                    </div></td>
                  </tr>
                     
                     <?php $sl++; } ?>
                 </table>

            </div>
            
            
            <div style="text-align:center">
                <ul class="pagination pagination-lg">
            <?php
                  
                  /*$prev = $page - 1;
                  $next = $page + 1;
                  
                  echo"<hr>";
                  
                  if($prev>0){
                  
                  echo"<span><a href='?page=$prev'>«Previous</a></samp> ";
                  }            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
                  echo" <b> [$number] </b> ";
                  }
                  else
                  {
                  echo"<a href='?page=$number'> $number </a> &nbsp;";
                  }
                  }
                  if($page < ceil($num_rows/$per_page))
                  echo"<a href='?page=$next'>Next »</a> "; */
				  
				  
				  $prev = $page - 1;
                  $next = $page + 1;
                  
                  if($prev>0){
                  echo '<li><a href="?page='.$prev.'&srch='.$search.'&aid='.$s_auto_id.'&byr='.$s_buyer.'&stl='.$s_style.'&ssn='.$s_season.'&clr='.$s_color.'&cno='.$s_CutNo.'&dt='.$s_EntryDate.'"><i class="glyphicon glyphicon-arrow-left"></i>Previous Page</a></li>';
                  }  
				            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
					echo '<li class="active"><a href="#">'.$number.'</a></li>';  
                  }
                  else
                  {
					echo '<li><a href="?page='.$number.'&srch='.$search.'&aid='.$s_auto_id.'&byr='.$s_buyer.'&stl='.$s_style.'&ssn='.$s_season.'&clr='.$s_color.'&cno='.$s_CutNo.'&dt='.$s_EntryDate.'">'.$number.'</a></li>';  
                  }
                  }
                  if($page < ceil($num_rows/$per_page))
				  	echo '<li><a href="?page='.$next.'&srch='.$search.'&aid='.$s_auto_id.'&byr='.$s_buyer.'&stl='.$s_style.'&ssn='.$s_season.'&clr='.$s_color.'&cno='.$s_CutNo.'&dt='.$s_EntryDate.'">Next Page<i class="glyphicon glyphicon-arrow-right"></i></a></li>';
                  ?>
            
            
            
                    <!--<li><a href="#"><i class="glyphicon glyphicon-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="glyphicon glyphicon-arrow-right"></i></a></li>-->
                </ul>
            </div>
            
            <div style="text-align:left; padding-left:15px; padding-bottom:10px">
            <?php echo 'Showing '.($start+1).' to '.($sl-1).' of '.$num_rows.' data.'; ?>
            </div>
            
            
        </div>
    </div>
</div>

<?php } ?>

<?php require('footer.php'); ?>

