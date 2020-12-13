<?php 

	 require_once('comon.php');
	require('header.php');
	
	if (isset($_POST['Submit']) and $_SERVER['REQUEST_METHOD'] == "POST")
 		{
		  $buyer=trim($_POST['buyer']);
		  $SQL="INSERT INTO tb_concern (sl, concern_name, concern_type) VALUES ('', '$buyer', 'Buyer')";
		  $obj->sql($SQL);
		// Here need to work more to ck existing buyer.
		}
		
		
		$msg = 'Buyer: <strong>'.$buyer.'</strong> has been Created Successfully :)';
  		//header("location:save_confirm.php?msg=$msg");
 ?>
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
               
               <h2><i class="glyphicon glyphicon-edit"></i>  Add New Buyer</h2>

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
            	
                <br /><span style="color:#30C; font-size:14px; font-weight:bold; margin-left:20px"><?php echo $msg ; ?></span><br /><br />
                <span style="color:#030; font-size:14px; font-weight:bold; margin-left:20px">Please Colose the Browser Window.</span>
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>
 