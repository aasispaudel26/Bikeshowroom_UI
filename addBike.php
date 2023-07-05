<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Add bike</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>


</head>

<body>

  <?php
  include 'connection.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $query = "INSERT INTO Bike (Brand, color, cc, price, location) VALUES (?, ?, ?, ?, ?)";

    $Brand = $_POST["Brand"];
    $color = $_POST["color"];
    $cc = $_POST["cc"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $sql = "INSERT INTO Bike (Brand, color, cc, price, location) VALUES (?, ?, ?, ?, ?)";
    session_start();
    $id = $_SESSION["bike_id"];

    $params = array(&$Brand, &$color, &$cc, &$price, &$location, &$id);
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (sqlsrv_execute($stmt) === false) {
      die(print_r(sqlsrv_errors(), true));
    } else {
      // Redirect to seller.php
      header('Location: seller.php');
      exit;
    }
  }  // Attempt to execute the prepared statement

  ?>
  <header>
    <div class="logoo">
      <img src="logooooo-removebg-preview.png" alt="logo">
    </div>
  </header>
  <div class="wrapper">
    <div class="form-box login">
      <h2>Add Bike</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="bicycle"></ion-icon></span>
          <input type="text" required>
          <label>Brand</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="color-filter"></ion-icon></span>
          <input type="text" id="color" name="color" required>
          <label>color</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="bicycle"></ion-icon></span>
          <input type="text" required>
          <label>cc</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="wallet"></ion-icon></span>
          <input type="text" required>
          <label>Price</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="location"></ion-icon></ion-icon></span>
          <input type="text" required>
          <label>Location</label>
        </div>

        <button type="submit" class="btn">Add Bike</button>

      </form>
      </main>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>