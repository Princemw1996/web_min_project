<?php 
    include("./db/db.php");
    include("./headers/header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mzuni Tuck shop Product Listing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
    <h2>Product Listing</h2>

    <?php
        $db = new mysqli($hostname, $username, $password, $mzuni_db);
        if ($db->connect_error) {
          die("Connection failed: " . $db->connect_error);
        }

        // Retrieve the products from the database
        $query = "SELECT * FROM product";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
          echo '<table class="table table-striped">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>Product Name</th>';
          echo '<th>Price (MKW)</th>';
          echo '<th>Quantity</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';

          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["product_name"] . '</td>';
            echo '<td>' . $row["price"] . '</td>';
            echo '<td>' . $row["quantity"] . '</td>';
            echo '</tr>';
          }

          echo '</tbody>';
          echo '</table>';
        } else {
          echo '<p>No products found.</p>';
        }

        // Close the database connection
        $db->close();
    ?>

  </div>

</body>
</html>
