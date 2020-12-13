
<?php	
	require_once('comon.php');
	require('header.php');
	
	/*$SQL="select * from tb_admin where sl='$dms_uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{ $name=$row['name']; }*/
	
?>

<script language="javascript" type="text/javascript">

        function deleteSpecialChar1(buyer) {
            if (buyer.value != '') 
            {
				str = buyer.value;
				res = "";
				var j;
				for (j = 0; j < str.length; j++) {
						
				if(str[j] != '&' && str[j] != '%' && str[j] != '*' && str[j] != '\\' && str[j] != '\'' && str[j] != '"' && str[j] != '*' && str[j] != '_') { res += str[j]; }
				else{
				alert('Error !!! You are trying to input Special Characters. ');
				}
				
				// res += liza[j] + "<br/>";
				//H-l&%*\'*"\_l@ W^#$d
			}
				
		// alert(res);
		document.getElementById("buyer").value = res;
		
			} }

</script>
  
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
            	
                <!-- <div id="preview">
               </div>

             <div id="formbox">
             lc_save
             -->
             <form name="" id="form1" action="new_buyer_save.php" method="post" class="form-inline" role="form">

     <!--<form class="form-inline" role="form">-->
     
     	<table width="316">
        	<tr>
            	<td width="101"> Buyer Name:</td>
                <td width="203"><input type="text" name="buyer" id="buyer" class="form-control" onClick="Select()" onChange="javascript:deleteSpecialChar1(this)" tabindex="2" placeholder="Buyer Name" required autofocus ></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" id="Submit" value="Save" />
                <!--<input type="submit" name="Submit" value="Save" class="btn btn-default" />-->
                </td>
            </tr>
            
        </table>
        
             </form>
      
             <br />
                
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


<?php require('footer.php'); ?>

