<?php
    $connection = mysqli_connect("localhost","root","","sms_db");
    $subject_id = $_GET['id'];
    $deleteStudent = "DELETE FROM subjects WHERE id='$subject_id'";
    $query = mysqli_query($connection, $deleteStudent);
    header("location:subjects.php");
?>