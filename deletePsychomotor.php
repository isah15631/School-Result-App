<?php
    $connection = mysqli_connect("localhost","root","","sms_db");
    $student_id = $_GET['id'];

    
$getTermDetails = "SELECT * FROM term_details";
$query = mysqli_query($connection, $getTermDetails);
$termRecords = mysqli_num_rows($query);
$getTerm = mysqli_fetch_array($query);

    $deleteStudent = "DELETE FROM psychomotor_records WHERE regno='$student_id' AND exam_term='$getTerm[current_term]'
    AND exam_year='$getTerm[term_year]'";
    $query = mysqli_query($connection, $deleteStudent)or die(mysqli_error($connection));
    header("location:psychomotor.php");
?>