<?php
session_start();
if (!isset($_SESSION['u_uid'])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <base href="http://localhost/usep-svrs/" />

    <title>Office of Student Affairs and Services - Student Violation Record System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./assets/img/osas_logo.png" rel="icon">

    <!-- Custom Boostrap CSS File -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>