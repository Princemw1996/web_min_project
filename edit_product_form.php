<?php
    include("./db/db.php");

    // Check if product ID is provided
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];

        // Retrieve the product from the database
        $db = new mysqli($hostname, $username, $password, $mzuni_db);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $query = "SELECT * FROM product WHERE product_id = $edit_id";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo '<p>Product not found.</p>';
            exit;
        }

        // Check if form is submitted
        if (isset($_POST['submit'])) {
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            // Update the product in the database
            $update_query = "UPDATE product SET product_name = '$product_name', price = '$price', quantity = '$quantity' WHERE product_id = $edit_id";
            if ($db->query($update_query) === TRUE) {
                echo '<p>Product updated successfully.</p>';
                header("Location: index.php");
                exit;
            } else {
                echo '<p>Error updating product: ' . $db->error . '</p>';
            }
        }

        // Close the database connection
        $db->close();
    } else {
        echo '<p>Product ID not provided.</p>';
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>

        <form method="POST">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo $product['quantity']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
