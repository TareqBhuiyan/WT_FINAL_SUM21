<?php 
	include 'Dashboard.php';
	include 'Controller/CategoryController.php';
	
	$cat=getAllCat();
	?>
	
<html>
	<head>
	<title>All Category</title></head>
	<body><h1>All Category</h1>	</body>
</html>	
	

	<?php
	
                    $i=1;
					foreach($cat as $c)
					{
						echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>".$c["name"]."</td>";
							echo '<td><a href="EditCategory.php?id='.$c['id'].'">Edit</a></td>';
							
						echo "</tr>";
						$i++;
	                }
	
	
	?>


