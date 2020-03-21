<?php

session_start();

if (isset($_POST['login-submit'])) {
    require 'dbh-inc.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: ../login.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../login.php?login=notregistered");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //de-hashing
                // $hashedPwdCheck = password_verify($password, $row['password']);
                // if ($hashedPwdCheck == false) {
                //     header("Location: ../login.php?login=wrongcredentials");
                if ($password != $row['password']) {
                    header("Location: ../login.php?login=wrongcredentials");
                } else if ($password == $row['password']) {
                    session_start();
                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $_SESSION['u_uid'] = $row['username'];
                    $_SESSION['u_last'] = $row['lastname'];
                    $_SESSION['u_first'] = $row['firstname'];

                    header("Location: ../home.php?login=success");

                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../login.php?login=error");
    exit();
}
