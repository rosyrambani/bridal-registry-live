<?php
include 'connect.php';
if(isset($_POST['item_sku'])){
	$item_sku = $_POST["item_sku"];
	$skuDescription = "NULL";
	$query = "SELECT * FROM bowring_products WHERE skuNumber = '$item_sku'";
	$result = mysqli_query($con, $query) or mysqli_error($con);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$skuDescription = $row["skuDescription"];
			echo "$skuDescription";
		}
		
	}
	else
	{
		echo "0";
	}
}
?>