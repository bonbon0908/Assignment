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
case 'POST';


	//$data = json_decode($entityBody);
	$data = json_decode($_POST['data'],true);
	//$obj = json_decode($_POST['myData']);
	$username =$data['username'];
	$password =$data['pass1'];
	$email =$data['email'];

	$checkid=mysql_query("SELECT * from register WHERE User='$username'") or die("Could not issue MySQL query");

	$records = mysql_num_rows($checkid);

if($records>0){
	
	$res["result"] = false;
	$res["alert"] = "Failed";
	
}else{
	
	$res["result"] = true;
	$res["alert"] = "Success";
	
	$sqlstring="insert into register (User,Password,Email) values ('$username', '$password','$email')";
	
	mysql_query($sqlstring);
	
}
	echo json_encode($res);
	
 break;

}
	?>