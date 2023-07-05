<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $phoneNumber = $_POST['phoneNumber'];
    $Email = $_POST['Email'];
    $userName = $_POST['userName'];
    $Password = $_POST['Password'];

    $query = "INSERT INTO customers (Name,Address,phoneNumber,Email,userName,Password) 
    VALUES(?, ?, ?, ?, ?, ?)";

    $params = array(&$Name, &$Address, &$phoneNumber, &$Email, &$userName, &$Password);
    $stmt = sqlsrv_prepare($conn, $query, $params);

    // Execute the statement
    if (sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
        <div class="form-box login">
            <h2>Register</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="location"></ion-icon></ion-icon></span>
                    <input type="text" required>
                    <label>Address</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="tel" required>
                    <label>Phone number</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" required>
                    <label>UserName</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>

                <button type="submit" class="btn">Register</button>

            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>