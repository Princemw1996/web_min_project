<?php
include("./db/db.php");
include("./headers/header.php");

// Delete a product
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];

  // Delete the product from the database
  $db = new mysqli($hostname, $username, $password, $mzuni_db);
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  $delete_query = "DELETE FROM product WHERE product_id = $delete_id";
  if ($db->query($delete_query) === TRUE) {
    echo '<p>Product deleted successfully.</p>';
  } else {
    echo '<p>Error deleting product: ' . $db->error . '</p>';
  }

  // Close the database connection
  $db->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Mzuni Tuck shop Product Listing</title>
  <link id="theme" rel="stylesheet" href="theme-light.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
    }

    .search-form {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .search-form label {
      margin-right: 10px;
    }

    .search-form input {
      flex-grow: 1;
    }

    .table-container {
      overflow-x: auto;
    }
  </style>
</head>
<body>

  <div class="container">
  <h2 class>Product List</h2>


    <div class="row justify-content-between">
      <div class="col-auto">
        <a href="add_product_form.php" class="btn btn-primary">Add Product</a>
      </div>

      <div class="col-auto">
        <form class="form-inline search-form">
          <div class="form-group">
            <label for="search-input"></label>
            <input type="text" class="form-control" id="search-input" placeholder="Search">
          </div>
        </form>
      </div>

      <div class="col-auto">
        <label for="theme-selector"></label>
        <select id="theme-selector">
          <option value="theme-light">Light</option>
          <option value="theme-dark">Dark</option>
        </select>
      </div>
    </div>

    <div class="table-container">
      <?php
      $db = new mysqli($hostname, $username, $password, $mzuni_db);
      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }

      $query = "SELECT * FROM product";
      $result = $db->query($query);

      if ($result->num_rows > 0) {
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Product Name</th>';
        echo '<th>Description</th>';
        echo '<th>Price (MKW)</th>';
        echo '<th>Quantity</th>';
        echo '<th>Actions</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["product_name"] . '</td>';
          echo '<td>' . $row["description"] . '</td>';
          echo '<td>' . $row["price"] . '</td>';
          echo '<td>' . $row["quantity"] . '</td>';
          echo '<td>';
          echo '<a href="edit_product_form.php?edit_id=' . $row["product_id"] . '">Edit</a>';
          echo ' | ';
          echo '<a href="index.php?delete_id=' . $row["product_id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>';
          echo '</td>';
          echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p>No products found.</p>';
      }

      $db->close();
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Search functionality
      $('#search-input').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        $('tbody tr').each(function () {
          var productName = $(this).find('td:first').text().toLowerCase();
          if (productName.includes(searchText)) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });

      // Theme selection functionality
      $('#theme-selector').on('change', function() {
        var selectedTheme = $(this).val();
        $('#theme').attr('href', selectedTheme + '.css');
      });
    });
  </script>
</body>
</html>