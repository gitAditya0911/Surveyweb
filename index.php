<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand Suggestion form to get drunk at Trifest</title>
  <link rel="stylesheet" href="app.css">
  <style>
    .success-message {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #ffffff;
      padding: 20px;
      border: 2px solid #000000;
      z-index: 9999;
      display: none;
    }
  </style>
</head>
<body>                   
  <h1>
    Let's get Drunk at Trifest Night
  </h1>
  <p>
    Brand Suggestion form
  </p>

  <div id="container1" class="container1">
    <form action="index.php" method="post">
      <input type="text" name="Name" id="name" placeholder="Enter your Name">
      <input type="text" name="Brand" id="brand" placeholder="Enter the brand which you like" size="45px">
      <input type="text" name="Quantity" id="Qty" placeholder="Enter how much ML do you prefer" size="30px">
      <textarea name="Experiences" id="Experiences" cols="30"  rows="7" placeholder="Write something about your experiences after getting drunk"></textarea>
      
      <span>
        <button class="btn" type="submit">
          Submit
        </button>
        <button class="btn" type="reset">
          Reset
        </button>
      </span>
    </form>
  </div>
  <hr>
  <footer class="foot">
    <p class="foot-text">Created by ARDdev</p> 
  </footer>


  <script src="script.js"></script>
</body>
</html>

<?php
if(isset($_POST['Name'])){
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "trifest_plan";

  $con = mysqli_connect($server, $username, $password);

  if (!$con) {
    die("Could not connect to server" . mysqli_connect_error());
  }

  if (!mysqli_select_db($con, $database)) {
    die("Could not select database" . mysqli_error($con));
  }

  $name = isset($_POST['Name']) ? $_POST['Name'] : '';
  $brand = isset($_POST['Brand']) ? $_POST['Brand'] : '';
  $quantity = isset($_POST['Quantity']) ? $_POST['Quantity'] : '';
  $experiences = isset($_POST['Experiences']) ? $_POST['Experiences'] : '';

  $sql = "INSERT INTO `brand` (`Name`, `Brand`, `Quantity`, `Experiences`) VALUES ('$name', '$brand', '$quantity', '$experiences');";

  if (mysqli_query($con, $sql)) {
    header("Location: thank_you.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($con);
  }

  mysqli_close($con);
}
?>
