<?php
include 'Model/dbConfig.php';
$name="";
$err_name="";

$has_error=false;

$err_db_error="";

if(isset($_POST["addcat"]))
{
	if(empty($_POST["name"]))
	{
		$err_name="Name Required";
		$has_error=true;
	}else
	{
		$name=$_POST["name"];
	}
	if(!$has_error)
	{
		$rs=insertCategory($_POST["name"]);
		if($rs===true)
		{
			 header("Location: AllCategory.php");
			
		}$err_db_error= $rs;
		
	}
	
}

function insertCategory($name)
{
	$query= "insert into category values (NULL,'$name')";
	return execute($query);
}

function getAllCat()
{
	$query="select * from category";
	$rs=get($query);
}

function getCat($id)
	{
		$query= "select name from category where id=$id";
		$rs = get($query);
	return $rs[1];
	}
	
	function updatecat($name,$id)
	{
		$query= "update category set name='$name' where id=$id";
		return execute($query);
	}





?>