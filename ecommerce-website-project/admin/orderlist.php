<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../helpers/Format.php'; ?>
<?php 
$fm = new Format();
 ?>
 <?php 
if (isset($_GET['delOdr'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delOdr']);
    $delOdr = $Odr->delOdrById($id);
}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Order List</h2>
        <?php 
            if (isset($deldBoy)) {
                echo $deldBoy;
            }
        ?>
        <div class="block">  
            <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No</th>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $getOrder = $Odr->getAllOrder();
                    if ($getOrder) {
                        $i=0;
                        while ($result = $getOrder->fetch_assoc()) {
                            $i++; ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productId']; ?></td>
						<td><?php echo $result['productName']; ?></td>
						<td><img src="image/<?php echo $result['image']; ?>" alt=""/></td>
						<td style="text-align:center;"><?php echo $result['quantity'].".00"; ?></td>
						
						<td><?php echo number_format($result['price']).".00"; ?></td>
                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                        <td><?php
                        if ($result['status'] == '0') {
                            echo "Pending";
                        } elseif ($result['status'] == '1') {
                            echo "Shifting";
                        } elseif ($result['status'] == '2') {
                            echo "Shifted";
                        } else {
                            echo "Ok";
                        } ?></td>
                        <?php if ($result['status'] == '2') {
                            ?>
						<td><a href="?customerId=<?php echo $cmrId; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Confirm</a> || <a onclick="return confirm('Are you sure to delete this?')" href="?delOdr=<?php echo $result['id']; ?>">Delete</a></td>
                        <?php
                        } elseif ($result['status'] == '2') {
                            ?>
						<td>Ok</td>
                        <?php
                        } elseif ($result['status'] == '0') {
                            echo "<td>N/A</td>";
                        } ?>
						
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
