<?php
session_start();
$filename = "";
// store new message in the file
$data = isset($_POST) ? $_POST : '';
if (!empty($data))
{
//  	file_put_contents($filename, print_r(json_encode($data), true));
	$filename  = session_id().rand(1, 10000000);
	file_put_contents("groups/".$_SESSION["group"]."/".$filename, print_r(json_encode($data), true));
	include("/include/opendb.php");
	$sql = "Insert into updates values ('".$_SESSION["group"]."', '".$filename."', null)";
	mysql_query($sql);
	/*$sql = "select clock from updates where group = '".$_SESSION["group"]."' and update_file = '".$filename."'";
	$row = mysql_fetch_array(mysql_query($sql));
	$_SESSION["timestamp"] = trim($row["clock"]);*/
	include("/include/close.php");
	die();
}

 //infinite loop until the data file is not modified
$timestamp   = $_SESSION["timestamp"];
$filename = "";
$response = array();
include("/include/opendb.php");
$sql = "select * from updates where clock > '".$timestamp. "' and group_name = '".$_SESSION["group"]."' order by clock asc";

$result = mysql_query($sql);
if (empty($result))
	$num = 0;
else $num = mysql_num_rows($result);	

if ($num != 0){
	for ($i = 0; $i < $num; $i++){
		$row = mysql_fetch_array($result);
		$filename = trim($row["update_file"]);
		$timestamp = trim($row["clock"]);
		$_SESSION["timestamp"] = $timestamp;

		array_push($response, json_decode(file_get_contents("groups/".$_SESSION["group"]."/".$filename)));
	}
	echo json_encode($response);	

}
else echo json_encode(array( "none" => "0" ));
flush();

include("/include/closedb.php");


// return a json array
?>