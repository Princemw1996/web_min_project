<?php
    include("./db/db.php");

    // Check if product ID is provided
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Create a database connection
        $db = new mysqli($hostname, $username, $password, $mzuni_db);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Delete the product from the database
        $query = "DELETE FROM product WHERE id = $productId";
        if ($db->query($query) === true) {
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting product: " . $db->error;
        }

        // Close the database connection
        $db->close();
    } else {
        echo "Product ID not provided.";
    }
?>
