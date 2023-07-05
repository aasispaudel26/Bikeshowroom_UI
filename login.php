<?php
include 'connection.php';

$username = $password = "";
$username_err = $user_password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST['username']))) {
    $username_err = "please enter a username";
  } else if (empty(trim($_POST['password']))) {
    $user_password_err = "please enter a password";
  } else if (strlen(trim($_POST["password"])) < 6) {
    $user_password_err = "password must be at least 6 characters long";
  } else {
    $sql = "SELECT * FROM seller WHERE username = ? AND password = ?";
    $params = array(trim($_POST["username"]), trim($_POST["password"]));
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
      die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($row) {
      session_start();
      $_SESSION["id"] = $row["user_id"];
      header('Location: seller.php');
      exit;
    } else {
      $username = trim($_POST["username"]);
    }

    sqlsrv_free_stmt($stmt);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Showroom</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <div class="logoo">
      <img src="logooooo-removebg-preview.png" alt="logo" />
      <h2 class="logo">AaSis</h2>
    </div>
    <!-- <h2 class="logo">AaSis</h2> -->

    <nav class="navigation">
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="seller.php">Seller</a>
      <a href="contactUS.php">Contact US</a>
      <a href="search.php">Search</a>
      <button class="btn"><a href="login.php">login</a></button>
    </nav>
  </header>
  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" required />
          <label>Password</label>
        </div>
        <div class="remember-forget">
          <label><input type="checkbox" />Remember me</label>
          <a href="#">Forget Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="login-register">
          <p>
            Don't have an account?<a href="register.html" class="register-link">Register</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>