<?php

		$dateex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
		$dateex->modify('-3600 seconds');									
		$dateex=$dateex->format("Y-m-d H:i:s");
		
$SQL_EXE="INSERT INTO `tb_sql` (`sl`, `sql`, `execute_date`, `user_id`) VALUES ('', '$sq', '$dateex', '$vsfs_uid')";    //table name
$obj->sql($SQL_EXE);


?>