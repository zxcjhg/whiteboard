<?php
	session_start();
	include("opendb.php");
	
	$mode = $_POST["mode"];
	
	if ($mode == 0){
		
		$sql = "Select * from groups where name='".$_POST["group"]."' and password='".$_POST["password"]."'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result)==0)
			echo "error";
		else{	
			echo "ok";
			$_SESSION["group"] = $_POST["group"];
			$_SESSION["timestamp"] = 0;	
		}
	}
	else if ($mode == 1){
		$sql = "Select * from groups where name='".$_POST["group"]."'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) !=0 )
			echo "error";
		else	
			echo "ok";			
	}
	else if ($mode == 2){
		$sql = "Insert into groups (name, password) values ('".$_POST["group"]."', '".$_POST["password"]."');";
		mysql_query($sql);
		mkdir("../groups/".$_POST["group"], 0777, false);
		$_SESSION["group"] = $_POST["group"];
		$_SESSION["timestamp"] = 0;	
		
		echo "ok";
	}
	
	include("closedb.php");
?>