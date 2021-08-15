<?php include 'admin_header.php';
	include 'controllers/CategoryController.php';
	$id = $_GET["id"];
	$c = getCategory($id);
?>
<!--edit category starts -->
<div class="center">
	<h5 class="text-danger"><?php echo $db_err;?></h5>
	<form action="" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4> 
			<input type="hidden" value="<?php echo $id?>" name="id">
			<input type="text" name="name" value="<?php echo $c["name"];?>" class="form-control">
		</div>
		
		<div class="form-group text-center">
			
			<input type="submit" class="btn btn-success" name="edit_category" value="Edit Category" class="form-control">
		</div>
	</form>
</div>

<!--edit category ends -->
<?php include 'admin_footer.php';?>