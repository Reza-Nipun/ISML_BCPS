<?php

		$date_to_m=$date;
		
		$date_to_m = explode("-", $date_to_m);
		$date_year=$date_to_m[2] ;
		
		  if($date_to_m[1]=="01")
		{ $date_year_value='1'.$date_year ; }
		  else if($date_to_m[1]=="02")
		{ $date_year_value='2'.$date_year ; }		
		  else if($date_to_m[1]=="03")
		{ $date_year_value='3'.$date_year ; }
		  else if($date_to_m[1]=="04")
		{ $date_year_value='4'.$date_year ; }
		  else if($date_to_m[1]=="05")
		{ $date_year_value='5'.$date_year ; }
		  else if($date_to_m[1]=="06")
		{ $date_year_value='6'.$date_year ; }
		  else if($date_to_m[1]=="07")
		{ $date_year_value='7'.$date_year ; }
		  else if($date_to_m[1]=="08")
		{ $date_year_value='8'.$date_year ; }
		  else if($date_to_m[1]=="09")
		{ $date_year_value='9'.$date_year ; }
		  else if($date_to_m[1]=="10")
		{ $date_year_value='10'.$date_year ; }
		  else if($date_to_m[1]=="11")
		{ $date_year_value='11'.$date_year ; }
		  else if($date_to_m[1]=="12")
		{ $date_year_value='12'.$date_year ; }

?>