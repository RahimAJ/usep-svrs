<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">Student Violation Record System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./violations.php">Violations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./student-list.php">Student List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./courses.php">Courses</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Trash</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./trash/violations.php">Violations</a>
                    <a class="dropdown-item" href="./trash/students.php">Students</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./account/profile.php">Profile</a>
                    <a class="dropdown-item" href="./account/change-password.php">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./includes/logout-inc.php">Log Out</a>
                </div>
            </li>
        </ul>
        <form method="GET" action="search.php" class="form-inline my-2 my-lg-0 pl-4">
            <label for="searchSelect">Search by:</label>
            <select name="searchType" class="form-control ml-1 mr-1" id="searchSelect">
                <option value="student_id">ID</option>
                <option value="name">Name</option>
            </select>
            <input name="searchInput" class="form-control mr-sm-2" type="text">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<?php
if (isset($_SESSION['u_uid'])) {
    echo "<small class='pl-4 text-secondary' style='float:none;z-index:10000'>You are logged in as: " . $_SESSION['u_first'] . " " . $_SESSION['u_last'] . " (" . $_SESSION['u_uid'] . ") " . "</small>";
}
?>