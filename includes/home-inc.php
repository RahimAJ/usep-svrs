<?php

require 'dbh-inc.php';

$profileID = $_SESSION['u_id'];

/**
 * HANDLERS FOR INSERT IN HOMEPAGE
 */

if (isset($_POST['violation-add'])) {
    $studentID = mysqli_real_escape_string($conn, $_POST['violation_studentID']);
    $details = mysqli_real_escape_string($conn, $_POST['violation_details']);

    if (empty($studentID) || empty($details)) {
        header("Location: ./home.php?violation=emptyfields");
        exit();
    } else {
        $select_studentID_sql = "SELECT * FROM students WHERE student_id='$studentID'";
        $resultCheck = mysqli_num_rows(mysqli_query($conn, $select_studentID_sql));
        if ($resultCheck < 1) {
            header("Location: ./home.php?violation=studentnotfound");
            exit();
        } else {
            $violations_insert_sql = "INSERT INTO violations (student_id, details, created_by) VALUES
            ('$studentID', '$details', '$profileID')";
            mysqli_query($conn, $violations_insert_sql);
            header("Location: ./home.php?violation=violationadded");
        }
    }
}

if (isset($_POST['student-add'])) {
    $studentID = mysqli_real_escape_string($conn, $_POST['student_studentID']);
    $student_last = mysqli_real_escape_string($conn, $_POST['student_lastname']);
    $student_first = mysqli_real_escape_string($conn, $_POST['student_firstname']);
    $student_courseID = mysqli_real_escape_string($conn, $_POST['student_course']);

    if (empty($studentID) || empty($student_last) || empty($student_first) || empty($student_courseID)) {
        header("Location: ./home.php?student=emptyfields");
        exit();
    } else {
        $select_courseID_sql = "SELECT * FROM courses WHERE course_ID='$student_courseID'";
        $resultCheck = mysqli_num_rows(mysqli_query($conn, $select_courseID_sql));
        if ($resultCheck < 1) {
            header("Location: ./home.php?student=coursenotfound");
            exit();
        } else {
            $students_insert_sql = "INSERT INTO students (student_id, student_lastname, student_firstname, course_id) VALUES
            ('$studentID', '$student_last', '$student_first', '$student_courseID')";
            mysqli_query($conn, $students_insert_sql);
            header("Location: ./home.php?student=studentadded");
        }
    }
}

if (isset($_POST['course-add'])) {
    $courseID = mysqli_real_escape_string($conn, $_POST['course_courseID']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);

    if (empty($courseID) || empty($course_name)) {
        header("Location: ./home.php?course=emptyfields");
        exit();
    } else {
        $courses_insert_sql = "INSERT INTO courses (course_id, course_name) VALUES
        ('$courseID', '$course_name')";
        mysqli_query($conn, $courses_insert_sql);
        header("Location: ./home.php?course=courseadded");
    }
}
