<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Seller</h2>
        <div class="block">
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
                $sellerReg = $Sle->sellerRegistration($_POST);
            }
        ?>
        <div class="register_account">
            <?php 
                if (isset($sellerReg)) {
                    echo $sellerReg;
                }
            ?>
            <h3>Register a Seller Account</h3>
            <form action="" method="post">
                     <table>
                        <tbody>
                        <tr>
                        <td>
                            <div>
                            <input type="text" name="sellerName" placeholder="Name"/>
                            </div>
                            <div>
                            <input type="text" name="sellerAddress" placeholder="Address"/>
                            </div>
                            
                            <div>
                               <input type="text" name="sellerCity" placeholder="City"/>
                            </div>
                            
                            <div>
                                <input type="text" name="sellerZip" placeholder="Zip Code"/>
                            </div>
                            
                         </td>
                        <td>
                            <div>
                                <input type="text" name="sellerEmail" placeholder="Email"/>
                            </div>
                        <div>
                            <input type="text" name="sellerCountry" placeholder="Country"/>
                        </div>
                                
    
                   <div>
                  <input type="text" name="sellerPhone" placeholder="Phone"/>
                  </div>
                  
                  <div>
                    <input type="text" name="sellerPass" placeholder="Password"/>
                </div>
                </td>
            </tr> 
            </tbody></table> 
           <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
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


