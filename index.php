<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Bridal Registry Website">
		<meta name="author" content="Rosy Rambani">
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Bowring Bridal Registry</title>
	</head>
	<body>
		<div class="text-center">
			<form class="card form-signin" method="POST" action="">
				<img src="bowring.png" style="width: 300px;">
				<h2>Bridal Registry</h2>
				<input type="text" name="storeuname" class="form-control" placeholder="Enter Your Store Username" required autofocus>
				<input type="password" name="storepassword" class="form-control" placeholder="Enter Your Store Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="LOGIN"><a>LOGIN</a></button>
			</form>

			<?php
			include ('connect.php');
			if(isset($_POST["submit"])) {

				if(!empty($_POST['storeuname']) && !empty($_POST['storepassword'])) {
					$StoreUname=$_POST['storeuname'];
					$StorePassword=$_POST['storepassword'];

					$loginsql="select * from storelogin where STOREUNAME='".$StoreUname."'AND STOREPASSWORD='".$StorePassword."' limit 1";

					$loginresult=mysqli_query($con,$loginsql);

					if(mysqli_num_rows($loginresult)!=0){
						while($row=mysqli_fetch_assoc($loginresult)) {
							$dbusername=$row['STOREUNAME'];
							$dbpassword=$row['STOREPASSWORD'];
						}

						if($StoreUname == $dbusername && $StorePassword == $dbpassword)
						{
							session_start();
							$_SESSION['sess_user']=$user;

							header("Location: registryhome.php");
						}
					}
					else {
						echo '<div class="alert alert-danger" style="width: 400px; margin: 0 auto;" role="alert">
  								You have entered incorrect password.
							</div>';
					}
				}
			}



			?>
  		
		</div>




		<!-- Bootstrap jquery and js files -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	</body>
</html>