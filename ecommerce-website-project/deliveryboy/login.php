<?php include '../classes/DeliveryBoy.php' ?>
<?php 
$dBoy = new DeliveryBoy();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dboyEmail = $_POST['dboyEmail'];
    $dboyPass = md5($_POST['dboyPass']);

    $loginChk= $dBoy->dboyLogin($dboyEmail, $dboyPass);  
}
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Delivery Boy Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Delivery Boy Login</h1>
			<span style="color:red; font-size:18px;">
				<?php 
                if (isset($loginChk)) {
                    echo $loginChk;
                }
                ?>
			</span>
			<div>
				<input type="text" placeholder="Email" name="dboyEmail"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="dboyPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form>
		Don't you have account? <a href="registration.php">Registration</a> now!!
	</section>
</div>
</body>
</html>
