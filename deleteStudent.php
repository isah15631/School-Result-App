<?php
    $connection = mysqli_connect("localhost","root","","sms_db");
    $student_id = $_GET['id'];
    $deleteStudent = "DELETE FROM students WHERE regno='$student_id'";
    $query = mysqli_query($connection, $deleteStudent);
    header("location:students.php");
?>