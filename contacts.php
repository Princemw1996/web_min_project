<?php
  $contacts = array(
    array(
      "name" => "Milton Chithenga",
      "registration_number" => "BSCDS0720"
    ),
    array(
      "name" => "Richard Luke",
      "registration_number" => "BSCDS2720"
    ),
    array(
      "name" => "Price Mwalughali",
      "registration_number" => "BSCDS5520"
    ),
    array(
      "name" => "Fatima Kanthea",
      "registration_number" => "BSCDS1920"
    )
  );
  include("./headers/header.php")
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Information</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .contact-card:nth-child(1) {
      background-color: #F8C471; /* Light Orange */
    }
    .contact-card:nth-child(2) {
      background-color: #85C1E9; /* Light Blue */
    }
    .contact-card:nth-child(3) {
      background-color: #F1948A; /* Light Pink */
    }
    .contact-card:nth-child(4) {
      background-color: #82E0AA; /* Light Green */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Contact Information</h2>
    
    <?php foreach ($contacts as $index => $contact): ?>
      <div class="card mb-3 contact-card">
        <div class="card-body">
          <h5 class="card-title">Name: <?php echo $contact['name']; ?></h5>
          <p class="card-text">Registration Number: <?php echo $contact['registration_number']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
