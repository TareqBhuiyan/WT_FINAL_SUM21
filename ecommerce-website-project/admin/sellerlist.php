<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../helpers/Format.php'; ?>
<?php 
$fm = new Format();
 ?>
 <?php 
if (isset($_GET['delS'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delS']);
    $delS = $Sle->delSById($id);
}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Seller List</h2>
        <?php 
                if (isset($delS)) {
                    echo $delS;
                }
                 ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Zip</th>
					<th>Email</th>
					<th>Country</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                $getSle = $Sle->getAllSeller();
                if ($getSle) {
                    $i=0;
                    while ($result = $getSle->fetch_assoc()) {
                        $i++; ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['sellerName']; ?></td>
					<td><?php echo $result['sellerAddress']; ?></td>
					<td><?php echo $result['sellerCity']; ?></td>
					<td><?php echo $result['sellerZip']; ?></td>
					<td><?php echo $result['sellerEmail']; ?></td>
					<td><?php echo $result['sellerCountry']; ?></td>
					<td><?php echo $result['sellerPhone']; ?></td>					
					<td><a href="selleredit.php?sellerId=<?php echo $result['sellerId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this?')" href="?delS=<?php echo $result['sellerId']; ?>">Delete</a></td>
				</tr>
				<?php
                    }
                } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
