<?php
	require_once 'models/db_config.php';
	$db_err="";
	if(isset($_POST["add_category"])){
		//validations
		//if no error
		$rs = insertCategory($_POST["name"]);
		if($rs === true){
			header("Location: allcategories.php");
		}
		$db_err = $rs;
	}
	else if (isset($_POST["edit_category"])){
		//validations
		//if no error
		
		$rs = updateCategory($_POST["name"],$_POST["id"]);
		if($rs === true){
			header("Location: allcategories.php");
		}
		$db_err = $rs;
	}
	
	function insertCategory($name){
		$query = "insert into categories values (NULL,'$name')";
		return execute($query);
	}
	function getAllCategories(){
		$query = "select * from categories";
		$rs = get($query);
		return $rs;
	}
	function getCategory($id){
		$query = "select * from categories where id=$id";
		$rs = get($query);
		return $rs[0]; //to pass only 1 instance
	}
	function updateCategory($name,$id){
		$query = "update categories set name= '$name' where id = $id";
		return execute($query);
	}
?>