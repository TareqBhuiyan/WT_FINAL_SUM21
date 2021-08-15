<?php
	require_once "models/db_config.php";
	//validation varables
	$err_db="";
	if(isset($_POST["add_product"])){
		//do validations
		//if no error
		$fileType = strtolower(pathinfo(basename($_FILES["p_image"]["name"]),PATHINFO_EXTENSION));
		$file = "storage/product_images/".uniqid().".$fileType";
		move_uploaded_file($_FILES["p_image"]["tmp_name"],$file);
		
		$rs = insertProduct($_POST["name"],$_POST["c_id"],$_POST["price"],$_POST["qty"],$_POST["desc"],$file);
		if($rs === true){
			header("Location: allproducts.php");
		}
		$err_db = $rs;
		
	}
	
	function insertProduct($name,$c_id,$price,$qty,$desc,$img){
		$query = "insert into products values (NULL,'$name',$c_id,$price,$qty,'$desc','$img')";
		return execute($query);
	}
	function updateProduct($name,$c_id,$price,$qty,$desc,$img,$id){
		$query = "update products set name='$name', c_id=$c_id, price=$price, qty=$qty, description='$desc' where id=$id";
		return execute($query);
	}
	function deleteProduct(){
		
	}
	function getProducts(){
		$query ="select p.*,c.name as 'c_name' from products p left join categories c on c.id = p.c_id";
		$rs = get($query);
		return $rs;
	}
	function getProduct($id){
		$query = "select * from products where id = $id";
		$rs = get($query);
		return $rs[0];
	}
	function search($key){
		$query = "select p.id,p.name from products p left join categories c on c.id = p.c_id where p.name like '%$key%' or c.name like '%$key%'";
		$rs = get($query);
		return $rs;
	}
?>