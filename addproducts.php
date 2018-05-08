<?php
session_start();
if(!isset($_SESSION["sess_user"])){
header("location:index.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- disallow browser cache -->
    <meta HTTP-EQUIV="Pragma" content="no-cache">
    <meta HTTP-EQUIV="Expires" content="-1" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Bridal Registry Website">
    <meta name="author" content="Rosy Rambani">
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
      <form name="addsearch" class="card form-search" method="post" action="">
        <h3 class="form-title">Add Products to Registry</h3>
        <div class="form-group row">
          <input class="form-control col-sm-7" type="text" name="searchcode" placeholder="Enter the Registry Code">
          <button class="btn btn-warning col-sm-4 offset-1" name="addsku" type="submit">Search</button>
        </div>
      </form>
      
      
      <?php
      //connect to the database
      include('connect.php');
      if (isset($_POST['addsku'])) {
      $SearchCode = $_POST['searchcode'];
      $BrideDb = "";
      $GroomDb = "";
      $PhoneDb = "";
      $EmailDb = "";
      $WeddingDb = "";
      $ShowersDb = "";
      $RegistryDb = "";
      $StoreDb = "";
      $EmployeeDb = "";
      $query = "SELECT * FROM customerinfo WHERE REGISTRYCODE = '$SearchCode'";
      $result = mysqli_query($con, $query) or die('error getting data');

      if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
      $SearchCode = $row['REGISTRYCODE'];
      $BrideDb = $row['BRIDE'];
      $GroomDb = $row['GROOM'];
      $PhoneDb = $row['PHONE'];
      $EmailDb = $row['EMAIL'];
      $WeddingDb = $row['WEDDINGDATE'];
      $ShowersDb = $row['SHOWERSDATE'];
      $RegistryDb = $row['REGISTRYDATE'];
      $StoreDb = $row['STORE'];
      $EmployeeDb = $row['EMPLOYEENAME'];
      ?>
      <script type="text/javascript">
      function searchResult() {
      
      document.getElementById("newregistrycode").value = "<?php echo $SearchCode;?>";
      document.getElementById("newbride").value = "<?php echo $BrideDb;?>";
      document.getElementById("newgroom").value = "<?php echo $GroomDb;?>";
      document.getElementById("newphone").value = "<?php echo $PhoneDb;?>";
      document.getElementById("newemail").value = "<?php echo $EmailDb;?>";
      document.getElementById("newweddingdate").value = "<?php echo $WeddingDb;?>";
      document.getElementById("newshowersdate").value = "<?php echo $ShowersDb;?>";
      document.getElementById("newregistrydate").value = "<?php echo $RegistryDb;?>";
      document.getElementById("newstore").value = "<?php echo $StoreDb;?>";
      document.getElementById("newemployeename").value = "<?php echo $EmployeeDb;?>";
      document.getElementById("regcode").value = "<?php echo $SearchCode;?>";
      }
      </script>
      <script>
      $(document).ready(function(){
        var count = 1;
        $('#addRow').click(function(){
        count = count + 1;
        var e = '<div class="form-group row" id="row'+count+'"><div class="col-sm-2"><input type="number" name="skunumber" id="skunumber'+count+'" class="form-control item_sku" placeholder="SKU" required></div><div class="col-sm-4"><input type="text" name="description" id="description'+count+'" class="form-control item_description" placeholder="Description" required readonly></div><div class="col-sm-1"><input type="number" name="quantity" id="quantity" class="form-control item_quantity" placeholder="Qty" required></div><div class="col-sm-4"><input type="text" name="notes" id="notes" class="form-control item_notes" placeholder="Notes"></div><button class="btn btn-danger btn-block col-sm-1 remove" type="button" data-row="row'+count+'" name="remove">Clear</button></div>';
        $('#productRow').append(e);

        });

      $(document).on('click', '.remove', function(){
        // alert("remove button clicked");
        var delete_row = $(this).parent().attr('id');
        // alert(delete_row);
        $('#' + delete_row).remove();
      });

      $(document).on('keypress', '.item_description', function(){

       var descriptionId = $(this).attr('id');
       console.log(descriptionId);

       var item_sku = $(this).closest(".row").find(".item_sku").val();
       console.log(item_sku);

       var sku = {item_sku:item_sku};
       console.log(sku);
       $.ajax({
        url: "fetch-description.php",
        method: "POST",
        data: sku,
        success: function(ret){

          if(ret == 0)
          {
            alert("Please enter the right SKU number");

          }
          else{
          console.log(ret);
          // alert(ret);
          var descriptionDb = ret;
          $('#' + descriptionId).val(descriptionDb);

        }

        }
       });

      });


      $('#addskuform').submit(function(e){
        e.preventDefault();
        console.log("loju");
        var item_regcode = [];
        var item_sku = [];
        var item_description = [];
        var item_quantity = [];
        var item_notes = [];

        $('.item_regcode').each(function(){
          item_regcode.push($(this).val());
        });
        $('.item_sku').each(function(){
          item_sku.push($(this).val());
        });
        $('.item_description').each(function(){
          item_description.push($(this).val());
        });
        $('.item_quantity').each(function(){
          item_quantity.push($(this).val());
        });
        $('.item_notes').each(function(){
          item_notes.push($(this).val());
        });
        console.log(item_regcode, item_sku, item_description, item_quantity, item_notes);
        var newProducts = {item_regcode:item_regcode, item_sku:item_sku, item_description:item_description, item_quantity:item_quantity, item_notes:item_notes} ;
        console.log(newProducts);

        $.ajax({

          url: "insert.php",
          method: "POST",
          data: newProducts,
          success: function(data){
            // alert(data);
            $("#addskuform").remove();
            var del = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Successfully Saved to the Database!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $('#regdetails').append(del);
           
          }

        });

      });



      });

      </script>
      
      <?php
      echo'
      <form name="regdetails" id="regdetails" class="card form-registry">
        <h2 class="form-title">Search Results</h2>
        
        <div class="form-group row">
          <label for="newregistrycode" class="col-sm-4 col-form-label">Registry Code:</label>
          <div class="col-sm-8">
            <input type="text" name="newregistrycode" id="newregistrycode" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="bride" class="col-sm-4 col-form-label">Bride Name:</label>
          <div class="col-sm-8">
            <input type="text" name="newbride" class="form-control" id="newbride" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="groom" class="col-sm-4 col-form-label">Groom Name:</label>
          <div class="col-sm-8">
            <input type="text" name="newgroom" id="newgroom" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label">Contact Number:</label>
          <div class="col-sm-8">
            <input type="text" name="newphone" id="newphone" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Contact Email:</label>
          <div class="col-sm-8">
            <input type="email" name="newemail" id="newemail" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="weddingdate" class="col-sm-4 col-form-label">Date of Wedding:</label>
          <div class="col-sm-8">
            <input type="Date" name="newweddingdate" id="newweddingdate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="showersdate" class="col-sm-4 col-form-label">Date of Showers:</label>
          <div class="col-sm-8">
            <input type="Date" name="newshowersdate" id="newshowersdate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="registrydate" class="col-sm-4 col-form-label">Date of Registry:</label>
          <div class="col-sm-8">
            <input type="Date" name="newregistrydate" id="newregistrydate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="store" class="col-sm-4 col-form-label">Store of Registry:</label>
          <div class="col-sm-8">
            <input type="text" name="newstore" id="newstore" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="employeename" class="col-sm-4 col-form-label">Registry Taken By:</label>
          <div class="col-sm-8">
            <input type="text" name="newemployeename" id="newemployeename" class="form-control" readonly>
          </div>
        </div>
      </form>
      <form name="addskuform" id="addskuform" class="card form-addsku">
        <h3 class="form-title">Add Product Details Here</h3>
        <div class="row">
          <div class="col-sm-2">
            <label for="regcode" class="form-label">Registry Code:</label>
          </div>
          <div class="col-sm-2">
            <input type="text" name="regcode" id="regcode" class="form-control item_regcode" placeholder="Registry Code" required readonly>
          </div>
          <button class="btn btn-success col-sm-2" name="addRow" id="addRow" type="button">Add Product</button>
        </div>
        <br>
        <div id="productRow">
          <div class="form-group row" id="firstRow">
            
            <div class="col-sm-2">
              <input type="number" name="skunumber" id="skunumber1" class="form-control item_sku" placeholder="SKU" required>
            </div>
            <div class="col-sm-4">
              <input type="text" name="description" id="description1" class="form-control item_description" placeholder="Description" required readonly>
            </div>
            <div class="col-sm-1">
              <input type="number" name="quantity" id="quantity" class="form-control item_quantity" placeholder="Qty" required>
            </div>
            <div class="col-sm-4">
              <input type="text" name="notes" id="notes" class="form-control item_notes" placeholder="Notes">
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary btn-block" type="submit" id="productadd" name="productadd"><a>Save Products to Registry</a></button>
      </form>
      
      <script>
      searchResult();
      </script>';
      }
      }
      else {
      echo '<div class="alert alert-warning alert-dismissible fade show" style="width: 460px; margin: 0 auto;" role="alert">
        <strong>Make Sure you have entered right Registry Code</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      }
      ?>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>