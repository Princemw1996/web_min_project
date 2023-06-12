<?php
require_once("db.php");

date_default_timezone_set('UTC');

$searchName = "";
$searchMinPrice = "";
$searchMaxPrice = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchName = $_POST["search_name"];
    $searchMinPrice = $_POST["search_min_price"];
    $searchMaxPrice = $_POST["search_max_price"];

    $query = "SELECT * FROM product WHERE 1=1";
    if (!empty($searchName)) {
        $query .= " AND product_name LIKE '%$searchName%'";
    }
    if (!empty($searchMinPrice)) {
        $query .= " AND price >= $searchMinPrice";
    }
    if (!empty($searchMaxPrice)) {
        $query .= " AND price <= $searchMaxPrice";
    }
    $result = mysqli_query($connection, $query);
}
?>