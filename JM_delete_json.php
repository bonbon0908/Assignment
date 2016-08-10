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

    case 'DELETE':

    parse_str(file_get_contents("php://input"),$post_vars);

 echo "Here is Delete";

      $username=$post_vars['username'];
      $password=$post_vars['password'];

 
$checkid=mysql_query("SELECT * from register WHERE User='$username' and Password='$password'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);

if($records>0){
	$sqlstring="delete from register where User='$username'";
	
	mysql_query($sqlstring);
	
	echo "Account Deleted";
}else{
	
	echo "Fail to Delete";
	return;
}
 

    break;

 

  default:

    rest_error($request); 

    break;
}
	?>