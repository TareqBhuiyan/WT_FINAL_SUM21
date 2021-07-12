<html>
	<head><?php 
	include 'Dashboard.php';
	include 'Controller/CategoryController.php';
	?>
	<title>Add Category</title></head>
	<body>
		<fieldset><h1><b>Add Category</h1>
			<form action="" method="post">
			<h3><?php echo $err_db_error; ?></h3>
			<br><br><br><br>
			<table>
			<tr>
			<td><b>Name :</td>
			<td><input type="text" name="name"></td>
			</tr>
			<tr><td align="center" colspan="2"><input type="submit" name="add_cat" value="Add Category"><br></tr>
			</table>
			</form>
		</fieldset>
	</body>
</html>		