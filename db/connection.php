<?php 
    require_once("db.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = new mysqli($hostname, $username, $password, $mzuni_db);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $product_name = $_POST["product_name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        // Insert the product into the database
        $query = "INSERT INTO product (product_name, description, price, quantity) VALUES ('$product_name', '$description', '$price', '$quantity')";
        if ($db->query($query) === TRUE) {
            echo "Product added successfully.";
        } else {
            echo "Error adding product: " . $db->error;
        }

        $db->close();
    }
?>
