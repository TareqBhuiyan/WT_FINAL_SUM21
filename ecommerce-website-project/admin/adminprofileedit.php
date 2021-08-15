<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['adminId']) || $_GET['adminId'] == null) {
    echo "<script>window.location = 'dashboard.php';</script>";
} else {
    $adminId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['adminId']);
}
$adminM = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatedadmin = $adminM->adminUpdate($_POST, $adminId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Admin</h2>
        <div class="block">
        <?php 
        if (isset($updatedadmin)) {
            echo $updatedadmin;
        }
         ?>
         <?php 
         $getadmin = $adminM->getAdminData($adminId);
         if ($getadmin) {
             while ($value = $getadmin->fetch_assoc()) {
                 ?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="adminName" value="<?php echo $value['adminName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="adminPass" value="<?php echo $value['adminPass'] ?>" class="medium" />
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


