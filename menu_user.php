<div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <!--<li class="nav-header">Main</li>-->
                <li class="nav-header"></li>
                <li><a class="ajax-link" href="home.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
           
        <li class="nav-header hidden-md"><i class="glyphicon glyphicon-edit"></i><span> Basic Information</span></li>
            <li><a href="create_style.php">Create Style</a></li>
            <li><a href="all_style_search.php">Search Style</a></li>
           
        <li class="nav-header hidden-md"><i class="glyphicon glyphicon-list-alt"></i><span> Cutting Information</span></li>
          	<li><a href="cutting_input.php">Add Cut Info</a></li>
            
            <!--<li><a href="cutting_input.php">Add Cut Info</a></li>
          	<li><a href="cutting_input_special.php">Add Special Cut Info</a></li>-->
          	<li><a href="cutting_input_print1.php">Search Cut ID</a></li>
          	<li><a href="cutting_input_search1.php">Search Cut Info</a></li>
          	<li><a href="line_ws_cutting_input.php">Add Line Input</a></li>
            <!--<li><a href="cutting_input_search.php">Search Cut Info</a></li>-->
       
        <li class="nav-header hidden-md"><i class="glyphicon glyphicon-list-alt"></i><span> SAP Report</span></li>
          	<li><a href="search_daily_cutting.php">Daily Cut Info</a></li>
          	<li><a href="search_style_wise_cutting.php">Style Wise Cut Info</a></li>
            <!--<li><a href="search_style_wise_cutting_v2.php">Style Wise Cut Test</a></li>-->
            
    <!--<li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-edit"></i><span> Basic Information</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="create_style.php">Create Style</a></li>
            <li><a href="all_style_search.php">Search Style</a></li>
        </ul>
    </li>-->
            <!--<li><a href="search_style.php">Search Style</a></li>-->
            <!--<li><a href="create_buyer.php">Create Buyer</a></li>-->
            <!--<li><a href="create_color.php">Create Color</a></li>-->
            <!--<li style="display:none" id="policy"><a href="form.php?ID='policy'">Policy</a></li>-->

    
  <!--<li class="accordion">
      <a href="#"><i class="glyphicon glyphicon-list-alt"></i><span> Cutting Information</span></a>
      <ul class="nav nav-pills nav-stacked">
          <li><a href="cutting_input.php">Add Cut Info</a></li>
          <li><a href="cutting_input_search.php">Search Cut Info</a></li>
      </ul>
  </li>-->
  <!--<li><a href="cutting_input_print.php">Print Info</a></li>-->

<!--<li class="accordion">
    <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Search & Update</span></a>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="all_style_search.php">Search All Style</a></li>
        <li><a href="search_style.php">Search Style</a></li>
    </ul>
</li>-->

  <!--<li><a class="ajax-link" href="view.php"><i class="glyphicon glyphicon-eye-open"></i><span> View</span></a></li>-->
                       
                        <?php  $msg ="<font color='green'><strong>Sucessfully Loged Out :-)</strong></font>"; ?>
                        <li><a href="index.php?msg=<?php echo $msg; ?>"><i class="glyphicon glyphicon-lock"></i><span> Logout</span></a></li>
                    </ul>
                    <!--<label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
                </div>