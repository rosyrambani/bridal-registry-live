<?php
			include ('connect.php');
			
				$RegCode = $_POST['registryCode'];
				$SkuNumber = "";
				$Description = "";
				$Quantity = "";
				$Notes = "";
				$Gifted = "";
				$count = 1;
				$query = "SELECT * FROM customerproducts WHERE REGISTRYCODE = '$RegCode'";
				$result = mysqli_query($con, $query) or mysqli_error($con);
				if(mysqli_num_rows($result) > 0)
				{
				while($row=mysqli_fetch_array($result))
				{
					
					echo "<tr class='row' id='row$count'>";
						echo "<td class='col-md-1 item_sku'>".$row['SKUNUMBER']."</td>";
						echo "<td class='col-md-4 item_description'>".$row['DESCRIPTION']."</td>";
						echo "<td class='col-md-1 item_quantity'>".$row['QUANTITY']."</td>";
						echo "<td class='col-md-5 item_notes'>".$row['NOTES']."</td>";
						echo "<td class='col-md-1 item_gifted' contenteditable='true'>".$row['GIFTED']."</td>";
					echo "</tr>";
					$count = $count + 1;
				}
			}
				else {
					echo '0';
				}
				
				
?>