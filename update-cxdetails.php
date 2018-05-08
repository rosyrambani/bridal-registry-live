<?php
include 'connect.php';
	$NewBride = $_POST['newbride'];
	$NewGroom = $_POST['newgroom'];
	$NewPhone = $_POST['newphone'];
	$NewEmail = $_POST['newemail'];
	$NewWeddingDate = $_POST['newweddingdate'];
	$NewShowersDate = $_POST['newshowersdate'];
	$NewRegistryDate = $_POST['newregistrydate'];
	$NewStore = $_POST['newstore'];
	$NewEmployeeName = $_POST['newemployeename'];
	$RegistryCode = $_POST['newregistrycode'];
	$sqldb = "UPDATE customerinfo SET BRIDE = '$NewBride', GROOM = '$NewGroom', PHONE = '$NewPhone', EMAIL = '$NewEmail', WEDDINGDATE = '$NewWeddingDate', SHOWERSDATE = '$NewShowersDate', REGISTRYDATE = '$NewRegistryDate', STORE = '$NewStore', EMPLOYEENAME = '$NewEmployeeName' WHERE REGISTRYCODE = '$RegistryCode'";

	if(!mysqli_query($con, $sqldb)){
		echo "0";
	}
	else {
		echo "1";
	}
?>