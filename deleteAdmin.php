<?php
    $connection = mysqli_connect("localhost","root","","sms_db");
    $admin_id = $_GET['id'];
    $deleteStudent = "DELETE FROM admins WHERE id='$admin_id'";
    $query = mysqli_query($connection, $deleteStudent);
    header("location:admins.php");
?>