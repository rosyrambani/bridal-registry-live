<?php 
include 'connect.php';
if(isset($_POST['item_regcode'])) {
  $item_regcode = $_POST["item_regcode"];
  $item_sku = $_POST["item_sku"];
  $item_description = $_POST["item_description"];
  $item_quantity = $_POST["item_quantity"];
  $item_notes = $_POST["item_notes"];

  $query = '';
  for($count = 0; $count<count($item_sku); $count++)
  {
    $item_regcode_clean = mysqli_real_escape_string($con, $item_regcode[0]);
    $item_sku_clean = mysqli_real_escape_string($con, $item_sku[$count]);
    $item_description_clean = mysqli_real_escape_string($con, $item_description[$count]);
    $item_quantity_clean = mysqli_real_escape_string($con, $item_quantity[$count]);
    $item_notes_clean = mysqli_real_escape_string($con, $item_notes[$count]);
  if($item_regcode_clean != '' && $item_sku_clean != '' && $item_description_clean != '' && $item_quantity_clean != '')
  {
    $query .= '
    INSERT INTO customerproducts (REGISTRYCODE, SKUNUMBER, DESCRIPTION, QUANTITY, NOTES) VALUES ("'.$item_regcode_clean.'", "'.$item_sku_clean.'", "'.$item_description_clean.'", "'.$item_quantity_clean.'", "'.$item_notes_clean.'");
    ';
  }
  }

  if($query != '')

  {
    if(mysqli_multi_query($con, $query))
    {
      echo 'all values inserted';
    }
    else
    {
      echo 'error inserting data';
    }
  }
  else
  {
    echo 'All fields are required';
  }
  }
?>

