<?php
require_once("./db/db.php");
include("./headers/header.php");
require("./db/search.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Search Product</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="search_name">Product Name:</label>
                    <input type="text" class="form-control" id="search_name" name="search_name" value="<?php echo $searchName; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="search_min_price">Minimum Price:</label>
                    <input type="number" step="0.01" class="form-control" id="search_min_price" name="search_min_price" value="<?php echo $searchMinPrice; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="search_max_price">Maximum Price:</label>
                    <input type="number" step="0.01" class="form-control" id="search_max_price" name="search_max_price" value="<?php echo $searchMaxPrice; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <h2>Search Results</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Product Name</th>';
                echo '<th>Price</th>';
                echo '<th>Quantity</th>';
                echo '<th>Category</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row["product_name"] . '</td>';
                    echo '<td>' . $row["price"] . '</td>';
                    echo '<td>' . $row["quantity"] . '</td>';
                    echo '<td>' . $row["category"] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No products found.</p>';
            }
        }
        ?>
    </div>
</body>
</html>