<?php
session_start();
if (isset($_SESSION['u_uid'])) {
    header("Location: home.php?login=alreadyLoggedIn");
}
echo '<script language="javascript">';
if (isset($_GET['login'])) {
    if ($_GET['login'] == "wrongcredentials") {
        echo 'alert("Wrong Password!")';
    }
    if ($_GET['login'] == "notregistered") {
        echo 'alert("User not found!")';
    }
}
echo '</script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Office of Student Affairs and Services - Student Violation Report System</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/osas_logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Custom Boostrap CSS File -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="div-center">
            <div class="content col-md-4 pt-5 mx-auto">
                <div class="text-center">
                    <img class="img-fluid" src="assets/img/osas_logo.png" style="max-width:35%;">
                    <h5>
                        Office of the Student Affairs <br>and Services
                    </h5>
                    <p style="color:maroon">
                        Student Violation Record System
                    </p>
                </div>
                <h3>Login</h3>
                <hr />
                <form action="includes/login-inc.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button name="login-submit" type="submit" class="btn btn-primary float-right">Login</button>
                    <!-- <hr />
                <button type="button" class="btn btn-link">Signup</button>
                <button type="button" class="btn btn-link">Reset Password</button> -->
                </form>
            </div>
            </span>
        </div>
    </div>