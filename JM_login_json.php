<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
mysql_select_db("305cde", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];
//echo $method;
//$entityBody = file_get_contents('php://input');

switch ($method){

case 'GET':
	
	$data = json_decode($_GET['data'],true);
	
	$username=$data['username'];
	$password=$data['pass1'];
	$query="SELECT * from register WHERE User='$username' and Password='$password'";
	
	$checkid=mysql_query($query) or die("Could not issue MySQL query");
	$records = mysql_num_rows($checkid);
	
	$res["query"]=$query;
	$res["records"]=$records;
if($records==0){
	$res["result"] = "false";
	$res["alert"] = "Failed to Login";
	
}else{
	
	$res["result"] = "true";
	
	$res["alert"] = "Success Login";
	
}

	echo json_encode($res);


 break;

}
	?>