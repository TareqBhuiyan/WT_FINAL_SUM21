<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['sellerId']) || $_GET['sellerId'] == null) {
    echo "<script>window.location = 'sellerlist.php';</script>";
} else {
    $sellerId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['sellerId']);
}
$Sle = new Seller();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateSeller = $Sle->sellerUpdate($_POST, $sellerId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Seller</h2>
        <div class="block">
        <?php 
        if (isset($updateSeller)) {
            echo $updateSeller;
        }
         ?>
         <?php 
         $getSle = $Sle->getSellerData($sellerId);
         if ($getSle) {
             while ($value = $getSle->fetch_assoc()) {
                 ?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="sellerName" value="<?php echo $value['sellerName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="sellerAddress" value="<?php echo $value['sellerAddress'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>City</label>
                    </td>
                    <td>
                        <input type="text" name="sellerCity" value="<?php echo $value['sellerCity'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="sellerAddress" value="<?php echo $value['sellerAddress'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Zip No</label>
                    </td>
                    <td>
                        <input type="text" name="sellerZip" value="<?php echo $value['sellerZip'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="sellerEmail" value="<?php echo $value['sellerEmail'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" name="sellerCountry" value="<?php echo $value['sellerCountry'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="sellerPhone" value="<?php echo $value['sellerPhone'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="sellerPass" value="<?php echo $value['sellerPass'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
             }
         } ?>
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


