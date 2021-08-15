<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Delivery Boy</h2>
        <div class="block">
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
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


