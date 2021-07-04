<?php
//session_start();
$uname="";
$err_uname="";
$pass="";
$err_pass="";

$hasError=false;

$users = array ("tareq" =>"1234", "sabbir"=>"1234","karim"=> "1234","rahim"=>"1234");

if($_SERVER["REQUEST_METHOD"]== "POST"){
	
	if (empty($_POST["uname"])) {
		$err_uname= "Username Required";
		$hasError = true;
	}
	 else{
	      $uname=$_POST["uname"];
	 }
	 if (empty($_POST["pass"])){
		 $err_pass = " Password required ";
		 $hasError = true ;
	 }
	 else {
		 $pass = $_POST["pass"];
	 }
	 if (!hasError) {
		 foreach ($users as $u => $u ) {
			 if ($uname == $u && $pass==$p){
				 //$_SESSION ["loggeduser"] = $uname;
				 setcookie ("loggeduser",$uname,time ()+120);
			 header ("Location: dasboard.php");
			 
			 }
		 }
		 echo "Invalid user";
	 }
}
?>
	