<?php
	//Connect to database 
	
	@ $db = mysql_pconnect("localhost", "cgt356web1k", "Windpipe1k414");
	//@ $db = mysql_pconnect("127.0.0.1:3306", "root", "");
	mysql_select_db("cgt356web1k");
	
	// check if conenction was successful
	if (!$db)
	{
		echo "Error: no connection";
		exit;	
	}
?>