<?php

session_start();

if (isset($_POST['password-change-submit'])) {
    require 'dbh-inc.php';
    $passcurr = mysqli_real_escape_string($conn, $_POST['passcurr']);
    $passnew = mysqli_real_escape_string($conn, $_POST['passnew']);
    $passretype = mysqli_real_escape_string($conn, $_POST['passretype']);
    $profileID = $_SESSION['u_uid'];

    if (empty($passcurr) || empty($passnew) || empty($passretype)) {
        header("Location: ../account/change-password.php?password=emptyfields");
        exit();
    } else {
        $checkpass_sql = "SELECT * FROM users WHERE username='$profileID'";
        $checkpass_row = mysqli_fetch_assoc(mysqli_query($conn, $checkpass_sql));
        if ($checkpass_row['password'] != $passcurr) {
            header("Location: ../account/change-password.php?password=wrongpassword");
        } else {
            if ($passnew != $passretype) {
                header("Location: ../account/change-password.php?password=wrongretype");
            } else {
                $sql = "UPDATE users SET
                    password = '$passnew'
                    WHERE username = '$profileID';
                ";

                mysqli_query($conn, $sql);
                header("Location: ../account/change-password.php?password=success");
            }
        }
    }
} else {
    header("Location: ../account/change-password.php?password=error");
    exit();
}
