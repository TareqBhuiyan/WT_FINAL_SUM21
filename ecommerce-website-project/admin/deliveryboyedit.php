<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['dboyId']) || $_GET['dboyId'] == null) {
    echo "<script>window.location = 'deliveryboylist.php';</script>";
} else {
    $dboyId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['dboyId']);
}
$dBoy = new DeliveryBoy();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatedboy = $dBoy->dboyUpdate($_POST, $dboyId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Delivery Boy</h2>
        <div class="block">
        <?php 
        if (isset($updatedboy)) {
            echo $updatedboy;
        }
         ?>
         <?php 
         $getdBoy = $dBoy->getDeliveryBoyData($dboyId);
         if ($getdBoy) {
             while ($value = $getdBoy->fetch_assoc()) {
                 ?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="dboyName" value="<?php echo $value['dboyName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="dboyAddress" value="<?php echo $value['dboyAddress'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>City</label>
                    </td>
                    <td>
                        <input type="text" name="dboyCity" value="<?php echo $value['dboyCity'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="dboyAddress" value="<?php echo $value['dboyAddress'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Zip No</label>
                    </td>
                    <td>
                        <input type="text" name="dboyZip" value="<?php echo $value['dboyZip'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="dboyEmail" value="<?php echo $value['dboyEmail'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" name="dboyCountry" value="<?php echo $value['dboyCountry'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="dboyPhone" value="<?php echo $value['dboyPhone'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="dboyPass" value="<?php echo $value['dboyPass'] ?>" class="medium" />
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


