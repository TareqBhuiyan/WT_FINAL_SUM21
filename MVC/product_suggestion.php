<?php
	include 'controllers/ProductController.php';
	$key = $_GET["key"];
	$products = search($key);
	
	if(count($products) > 0){
		foreach($products as $p){
			echo "<a href='editproduct.php?id=".$p["id"]."'>".$p["name"]."</a><br>";
		}
	}
?>