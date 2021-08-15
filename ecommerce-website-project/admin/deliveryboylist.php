<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../helpers/Format.php'; ?>
<?php 
$fm = new Format();
 ?>
 <?php 
if (isset($_GET['deldBoy'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deldBoy']);
    $deldBoy = $dBoy->delDBoyById($id);
}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Delivery Boy List</h2>
        <?php 
                if (isset($deldBoy)) {
                    echo $deldBoy;
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
                $getdBoy = $dBoy->getAllDeliveryBoy();
                if ($getdBoy) {
                    $i=0;
                    while ($result = $getdBoy->fetch_assoc()) {
                        $i++; ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['dboyName']; ?></td>
					<td><?php echo $result['dboyAddress']; ?></td>
					<td><?php echo $result['dboyCity']; ?></td>
					<td><?php echo $result['dboyZip']; ?></td>
					<td><?php echo $result['dboyEmail']; ?></td>
					<td><?php echo $result['dboyCountry']; ?></td>
					<td><?php echo $result['dboyPhone']; ?></td>					
					<td><a href="deliveryboyedit.php?dboyId=<?php echo $result['dboyId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this?')" href="?deldBoy=<?php echo $result['dboyId']; ?>">Delete</a></td>
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
