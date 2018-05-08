<?php
include 'connect.php';
if(isset($_POST['item_sku'])) {
  $item_regcode = $_POST["item_regcode"];
  $item_sku = $_POST["item_sku"];
  $item_description = $_POST["item_description"];
  $item_quantity = $_POST["item_quantity"];
  $item_notes = $_POST["item_notes"];
  $item_gifted = $_POST["item_gifted"];

  $query = "";
  for($count = 0; $count<count($item_sku); $count++)
  {
    $item_regcode_clean = mysqli_real_escape_string($con, $item_regcode[0]);
    $item_sku_clean = mysqli_real_escape_string($con, $item_sku[$count]);
    $item_description_clean = mysqli_real_escape_string($con, $item_description[$count]);
    $item_quantity_clean = mysqli_real_escape_string($con, $item_quantity[$count]);
    $item_notes_clean = mysqli_real_escape_string($con, $item_notes[$count]);
    $item_gifted_clean = mysqli_real_escape_string($con, $item_gifted[$count]);
  if($item_regcode_clean != '' && $item_sku_clean != '' && $item_description_clean != '' && $item_quantity_clean != '')
  {
    $query .= "UPDATE customerproducts SET QUANTITY = '$item_quantity_clean', NOTES = '$item_notes_clean', GIFTED = '$item_gifted_clean' WHERE SKUNUMBER = '$item_sku_clean' AND REGISTRYCODE = '$item_regcode_clean';";


  }
  }

  if($query != '')

  {
    if(mysqli_multi_query($con, $query))
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data Successfully Updated to the Database!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
</div>';
    }
    else
    {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Sorry, Data was not saved to the Database!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
</div>';
    }
  }
  else
  {
    echo 'Invalid Query';
  }
  }
?>
