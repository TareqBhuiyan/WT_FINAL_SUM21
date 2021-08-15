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
<title>Seller Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
                $dboyReg = $dBoy->dboyRegistration($_POST);
            }
        ?>
        <div class="register_account">
            <?php 
                if (isset($dboyReg)) {
                    echo $dboyReg;
                }
            ?>
		<h3>Register a Delivery Boy Account</h3>
		<br>
		<form action="" method="post">
			<table>
				<tbody>
					<tr>
						<td>
							<div>
								<input type="text" name="dboyName" placeholder="Name"/>
							</div>
							<div>
								<input type="text" name="dboyAddress" placeholder="Address"/>
							</div>
							<div>
							   <input type="text" name="dboyCity" placeholder="City"/>
							</div>

							<div>
							    <input type="text" name="dboyZip" placeholder="Zip Code"/>
							</div>
						</td>
						<td>
							<div>
								<input type="text" name="dboyEmail" placeholder="Email"/>
							</div>
							<div>
							    <input type="text" name="dboyCountry" placeholder="Country"/>
							</div>
							<div>
								<input type="text" name="dboyPhone" placeholder="Phone"/>
							</div>  
			                <div>
			                    <input type="text" name="dboyPass" placeholder="Password"/>
			                </div>
		                </td>
			        </tr> 
	            </tbody>
        	</table> 
           	<div class="search">
           		<div>
           			<button class="grey" name="register">Create Account</button>
           		</div>
           	</div>
            <div class="clear"></div>
        </form>
        </div>
		Do you have account? <a href="login.php">Login</a> now!!
	</section>
</div>
</body>
</html>