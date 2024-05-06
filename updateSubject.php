<?php

    $connection = mysqli_connect("localhost","root","","sms_db");
    $subject_id = $_POST['hidden_id'];
    $updateSubject = "UPDATE subjects SET subject_name='$_POST[subject_name]' WHERE id='$subject_id'";
    $query = mysqli_query($connection, $updateSubject);
    header("location:subjects.php");

?>