<?php

include 'connect.php';
if(isset($_POST['item_sku'])) {
$item_regcode = $_POST["item_regcode"];
$item_sku = $_POST["item_sku"];
$query = "DELETE FROM customerproducts WHERE REGISTRYCODE = '$item_regcode' AND SKUNUMBER = '$item_sku' ";

if(!mysqli_query($con, $query))
{
	echo "0";
}
else 
{
	echo "1";
}



}
?>