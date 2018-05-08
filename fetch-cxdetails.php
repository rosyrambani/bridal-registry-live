<?php
include 'connect.php';

$RegCode = $_POST['registryCode'];
$BrideDb = "";
$GroomDb = "";
$PhoneDb = "";
$EmailDb = "";
$WeddingDb = "";
$ShowersDb = "";
$RegistryDb = "";
$StoreDb = "";
$EmployeeDb = "";
$query = "SELECT * FROM customerinfo WHERE REGISTRYCODE = '$RegCode'";
$result = mysqli_query($con, $query) or die('error getting data');
if(mysqli_num_rows($result) > 0) {
	while($array = mysqli_fetch_assoc($result)) {
		echo json_encode($array);
	}
}
else {
	echo "0";
}
?>