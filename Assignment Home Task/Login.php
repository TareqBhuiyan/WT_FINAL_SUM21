<?php

include 'Controller/temp1.php';

?>





<html>
	<head><title>Log In</title></head>
	<body>
		<fieldset>
			<form action="" method="post">
			
			<fieldset>

				 <table align="center">
					<tr>
					<br><br><br><br><br><br>
						<td  align="center" colspan="3"><b>LOG IN </td>
						
					</tr>
					<tr>
						<td>Name</td>
						<td>
	           	<input type="text" placeholder="Name" name="name" value="<?php echo $name;?>"></td>
				<td><span><?php echo $err_name;?></span></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="text" name="password" placeholder="Password" value="<?php echo $pass;?>"></td>
						<td><span><?php echo $err_pass;?></span>
					</tr>
					<br><br><br>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="Login" value="Log In"><br>
						<span>Not registered yet?</span>
						<span><a target="blank" href="SignUp.php">Signup</a></span><br><br><br><br>
						<span><?php echo $err_db_error; ?></span>
						</td>
					</tr>
	                
	
	
	
				</table><br><br><br><br>
				</fieldset>
			</form>
		</fieldset>
	</body>
</html>		