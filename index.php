
<?php
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();

	$no_visible_elements = true;
	include('header.php');
	
	$msg = $_GET['msg'];
?>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Bundle Cut Printing Solution</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
            <?php if($msg != '') { echo $msg; } else { ?>
				Please login with your Username and Password.
			<?php } ?>
            </div>
            <form class="form-horizontal" action="check_login.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                 <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button name="Submit" type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
<?php require('footer.php'); ?>