<?php

      include ('connect.php');
      if(isset($_POST['getProducts'])) {
        $RegCode = $_POST['dbProducts'];
        $SkuNumber = "";
        $Description = "";
        $Quantity = "";
        $Notes = "";
        $Gifted = "";

        $query = "SELECT * FROM CUSTOMERPRODUCTS WHERE REGISTRYCODE = '$RegCode'";
        $result = mysqli_query($con, $query) or mysqli_error($con);
        echo "<table border ='1px'>";
        while($row=mysqli_fetch_array($result))
        {
          
          echo "<tr>";
          echo "<td>" . $row['SKUNUMBER'] . "</td>";
          echo "<td>" . $row['DESCRIPTION'] . "</td>";
          echo "<td>" . $row['QUANTITY'] . "</td>";
          echo "<td>" . $row['NOTES'] . "</td>";
          echo "<td>" . $row['GIFTED'] . "</td>";
          echo "</tr>";
        }
      echo "</table>";  
      }
        
      ?>


      echo "<p class='result'>".$row['SKUNUMBER']."<br>".$row['DESCRIPTION']."</p>";
          echo "<p class='result'>".$row['QUANTITY']."<br>".$row['NOTES']."</p>";
          echo "<p class='result'>".$row['GIFTED']."</p>";