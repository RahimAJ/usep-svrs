<?php

session_start();
//logout handler - logs out the user

if (isset($_SESSION['u_uid'])) {
    session_unset();
    // Regenerates session
    session_regenerate_id();
    session_destroy();
    header("Location: ../login.php?logout=success");
} else {
    header("Location: ../login.php?logout=notloggedin");
}
