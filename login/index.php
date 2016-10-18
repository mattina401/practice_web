<?php
session_start();
$submit = filter_input(INPUT_POST, 'submit');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if ($submit) {
    if ($username && $password) {
        $connection = mysqli_connect('localhost', 'root', '', '4400db');
        $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
        $numrows = mysqli_num_rows($query);
        // check user name is in DB or not
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }
            if ($username == $dbusername && $password == $dbpassword) {
                $query1 = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' and password = '$password' and review = '1'");
                $numrows1 = mysqli_num_rows($query1);
                // check user is under review or not
                if ($numrows1 != 0) {
                    $_SESSION['username'] = $username;
                    if ($username != admin) {
                        header('Location: Homepage.php');
                    } else {
                        header('Location: Manager Homepage.php');
                    }
                } else {
                    echo "<p align='center' style='color:red; '>your application is under review</p>";
                }
            } else
                echo "<p align='center' style='color:red; '>incorrect password</p>";
        } else
            echo "<p align='center' style='color:red; '>that user does not exist!</p>";
    } else
        echo "<p align='center' style='color:red; '>plz enter username and password</p>";
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

</head>
<body>
<div class="container">
    <div class="row">
        <form action="index.php" method="post">
            <div class="row" style="display: flex">
                <div class="col-md-6">
                    <h3 class="pull-right">ID</h3>
                </div>
                <div class="col-md-6">
                    <input type="text" name="username">
                </div>
            </div>
            <div class="row" style="display: flex">
                <div class="col-md-6">
                    <h3 class="pull-right">Password</h3>
                </div>
                <div class="col-md-6">
                    <input type="password" name="password">
                </div>
            </div>
            <div class="row" style="display: flex">
                <div class="col-md-6">
                    <input type="submit" name="submit" value="submit" class="pull-right">
                </div>
                <div class="col-md-6">
                    <input type="submit" name="register" value="register">
                </div>
            </div>
        </form>

    </div>
</div>

</body>

</html>
