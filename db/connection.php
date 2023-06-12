<?php
date_default_timezone_set('UTC');

require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new mysqli($hostname, $username, $password, $mzuni_db);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $stmt = $db->prepare("INSERT INTO product (product_name, description, price, quantity) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }

    $productName = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $stmt->bind_param("ssdi", $productName, $description, $price, $quantity);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product: " . $stmt->error;
    }

    $stmt->close();
    $db->close();

    header("Location: index.php");
    exit();
}
?>
