<?php

session_start();
require 'dbh-inc.php';

$profileID = $_SESSION['u_id'];

/**
 * HANDLERS FOR EDIT
 */

if (isset($_POST['violation-update'])) {
    $mainID = mysqli_real_escape_string($conn, $_POST['main_ID']);
    // $violationID = mysqli_real_escape_string($conn, $_POST['violation_id']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $violation_details = mysqli_real_escape_string($conn, $_POST['details']);
    $violation_remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $date_created = mysqli_real_escape_string($conn, $_POST['date_created']);

    if (empty($student_id) || empty($violation_details) || empty($date_created)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $update_ViolationData_sql = "UPDATE violations SET
            student_id = '$student_id',
            details = '$violation_details',
            remarks = '$violation_remarks',
            date_created = '$date_created'
            WHERE id = '$mainID';
        ";
        mysqli_query($conn, $update_ViolationData_sql);

        header("Location: ../edit/violation.php?violation-id=" . $mainID);
        // echo "../edit/violation.php?violation-id=" . $mainID;
    };
}

if (isset($_POST['student-update'])) {
    $mainID = mysqli_real_escape_string($conn, $_POST['main_ID']);
    $old_studentID = mysqli_real_escape_string($conn, $_POST['old_ID']);
    $studentID = mysqli_real_escape_string($conn, $_POST['student_studentID']);
    $student_lastname = mysqli_real_escape_string($conn, $_POST['student_lastname']);
    $student_firstname = mysqli_real_escape_string($conn, $_POST['student_firstname']);
    $course_id = mysqli_real_escape_string($conn, $_POST['student_course']);

    if (empty($studentID) || empty($student_lastname) || empty($student_firstname) || empty($course_id)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {

        $update_ViolationsTableData_sql = "UPDATE violations SET
            student_id = '$studentID'
            WHERE student_id = '$old_studentID';
        ";

        $update_StudentData_sql = "UPDATE students SET
            student_id = '$studentID',
            student_lastname = '$student_lastname',
            student_firstname = '$student_firstname',
            course_id = '$course_id'
            WHERE id = '$mainID';
        ";

        mysqli_query($conn, $update_ViolationsTableData_sql);
        mysqli_query($conn, $update_StudentData_sql);

        header("Location: ../edit/student.php?student-id=" . $studentID);
        // echo "../edit/student.php?student-id=" . $studentID;
    };
}

if (isset($_POST['course-update'])) {
    $mainID = mysqli_real_escape_string($conn, $_POST['main_ID']);
    $old_courseID = mysqli_real_escape_string($conn, $_POST['old_ID']);
    $courseID = mysqli_real_escape_string($conn, $_POST['course_id']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);

    if(empty($courseID) || empty($course_name)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $update_StudentsTableData_sql = "UPDATE students SET
        course_id = '$courseID'
        WHERE course_id = '$old_courseID';
        ";

        $update_CourseData_sql = "UPDATE courses SET
        course_id = '$courseID',
        course_name = '$course_name'
        WHERE id = '$mainID';
        ";

        mysqli_query($conn, $update_StudentsTableData_sql);
        mysqli_query($conn, $update_CourseData_sql);

        header("Location: ../edit/course.php?course-id=" . $courseID);
    }
}