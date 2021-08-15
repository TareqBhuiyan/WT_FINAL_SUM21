<?php
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$gender="";
	$err_gender="";
	$prof="";
	$err_prof="";
	$hobbies=[];
	$err_hobbies="";
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	$professions = array("Teaching","Service","Business","Entreprenuer");
	
	function hobbyExist($hobby){
		global $hobbies;
		foreach($hobbies as $h){
			if($h == $hobby){
				return true;
			}
		}
		return false;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError = true;
		}
		else if(strlen($_POST["name"]) <=2){
			$err_name="Name Must be greater than 2";
			$hasError = true;
		}
		else{
			$name=htmlspecialchars($_POST["name"]);
		}
		if(empty($_POST["username"])){
			$err_uname="Username Required";
			$hasError = true;
		}
		
		else{
			$uname=$_POST["username"];
		}
		if(!isset($_POST["gender"])){
			$err_gender="Gender Required";
			$hasError = true;
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["profession"])){
			$err_prof = "Profession Required";
			$hasError = true;
		}
		else{
			$prof = $_POST["profession"];
		}
		if(!isset($_POST["hobbies"])){
			$err_hobbies="Hobbies Required";
			$hasError = true;
		}
		else{
			$hobbies = $_POST["hobbies"];
		}
		if(empty($_POST["bio"])){
			$err_bio="Bio Required";
			$hasError = true;
		}
		else{
			$bio = $_POST["bio"];
		}
		
		if(!$hasError){
			echo $name."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["gender"]."<br>";
			echo $_POST["profession"]."<br>";
			echo $_POST["bio"]."<br>";
			
			$arr = $_POST["hobbies"];
			
			foreach($arr as $e){
				echo "$e <br>";
			}
		}
		
		
	}
?>