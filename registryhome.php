<?php
session_start();
if(!isset($_SESSION["sess_user"])){
header("location:index.php");
} else {
?>
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
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand" href="#">Bowring Bridal Registry</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="registryhome.php">1. New Registry</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="addproducts.php">2. Add Products</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="searchregistry.php">3. Search and Edit Registry</a>
					</li>
				</ul>
				<div class="btn-group" role="group">
					<a class="button btn btn-warning" href="blank_Bridal_Registry.pdf" target="_blank">Print Registry Form</a>
					<a class="button btn btn-danger" href="storelogout.php">Logout</a>
				</div>
				
			</div>
		</nav>
		<div class="text-center">
			<form name="customerform" class="card form-registry" method="post" action="customerdata.php">
				<h2 class="form-title">Create Registry Account</h2>
				<div class="form-group row">
					<label for="bride" class="col-sm-4 col-form-label">Bride's Name:</label>
					<div class="col-sm-8">
						<input type="text" name="bride" class="form-control" placeholder="Name of Bride" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="groom" class="col-sm-4 col-form-label">Groom's Name:</label>
					<div class="col-sm-8">
						<input type="text" name="groom" class="form-control" placeholder="Name of Groom" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label">Contact Number:</label>
					<div class="col-sm-8">
						<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label">Contact Email:</label>
					<div class="col-sm-8">
						<input type="email" name="email" class="form-control" placeholder="Enter Contact Email">
					</div>
				</div>
				<div class="form-group row">
					<label for="weddingdate" class="col-sm-4 col-form-label">Date of Wedding:</label>
					<div class="col-sm-8">
						<input type="Date" name="weddingdate" class="form-control" placeholder="Enter Wedding Date">
					</div>
				</div>
				<div class="form-group row">
					<label for="showersdate" class="col-sm-4 col-form-label">Date of Showers:</label>
					<div class="col-sm-8">
						<input type="Date" name="showersdate" class="form-control" placeholder="Enter Showers Date">
					</div>
				</div>
				<div class="form-group row">
					<label for="registrydate" class="col-sm-4 col-form-label">Date of Registry:</label>
					<div class="col-sm-8">
						<input type="Date" name="registrydate" class="form-control" placeholder="Enter Today's Date" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="store" class="col-sm-4 col-form-label">Store of Registry:</label>
					<div class="col-sm-8">
						<input type="text" name="store" class="form-control" placeholder="Enter Your Store Number" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="employeename" class="col-sm-4 col-form-label">Registry Taken By:</label>
					<div class="col-sm-8">
						<input type="text" name="employeename" class="form-control" placeholder="Enter Employee Name" required>
					</div>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="button" id="gencode" name="gencode" value="GENERATE REGISTRY CODE" onclick="showCode()"><a>GENERATE REGISTRY CODE</a></button>
				<div class="form-group form-registry" >
					<!-- <label for="registrycode">Please Give This Registry Code To The Customer</label> -->
					
					<textarea class="form-control" name="registrycode" id="registrycode" rows="1" readonly style="display: none;" required></textarea>
					
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit" value="submit"><a>Create Registry</a></button>
				
			</form>
			
			
		</div>
		<script type="text/javascript">
			if(document.getElementById("registrycode").value == '')
			{
			document.getElementById("submit").disabled = true;
			}
			
			function showCode() {
		var code = "<?php echo uniqid(); ?>";
		document.getElementById("registrycode").style.display = "block";
		document.getElementById("registrycode").value = code;
		document.getElementById("submit").disabled = false;
		}
		</script>
		<!-- <script type="text/javascript">
			function clearForm(){
				document.customerform.reset();
			}
		</script> -->
		<!-- Bootstrap jquery and js files -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	</body>
</html>
<?php
}
?>