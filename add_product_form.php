<?php
  require_once("./db/connection.php");
  include("./headers/header.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Add Product</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price (MKW):</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>

  <script>
    function validateForm() {
      var productName = document.getElementById("product_name").value;
      var price = document.getElementById("price").value;
      var quantity = document.getElementById("quantity").value;

      if (productName == "" || price == "" || quantity == "") {
        alert("Please fill out all required fields.");
        return false;
      }

      return true;
    }
  </script>

</body>
</html>
