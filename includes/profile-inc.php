<?php

session_start();

if (isset($_POST['profile-submit'])) {
    require 'dbh-inc.php';
    $username = mysqli_real_escape_string($conn, $_POST['usernameProf']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastnameProf']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstnameProf']);
    $profileID = $_SESSION['u_uid'];

    if (empty($username) || empty($lastname) || empty($firstname)) {
        header("Location: ../account/profile.php?profile=emptyfields");
        exit();
    } else {
        $sql = "UPDATE users SET
            username = '$username',
            lastname = '$lastname',
            firstname = '$firstname'
            WHERE username = '$profileID';
        ";
        mysqli_query($conn, $sql);
        $_SESSION['u_uid'] = $username;
        $_SESSION['u_last'] = $lastname;
        $_SESSION['u_first'] = $firstname;

        header("Location: ../account/profile.php?profile=success");
    }
} else {
    header("Location: ../account/profile.php?profile=error");
    exit();
}
