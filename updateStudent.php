<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .message{
            padding:50px;
            font-size: 50px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            margin: 100px auto;
        }
    </style>
</head>
<body>
   
    <?php
    
    $connection = mysqli_connect("localhost","root","","sms_db");
    $student_id = $_POST["reg_no"];
    $classes = ["SS3","SS2","SS1","JS3","JS2","JS1","PRIMARY 6","PRIMARY 5","PRIMARY 4","PRIMARY 3","PRIMARY 2","PRIMARY 1","NURSERY 2","NURSERY 1"];
    $sub_classes = ["SCIENCE","ART","COMMERCIAL",""];
        
    $studentClass = isset($_POST['student_class']) ? strtoupper($_POST['student_class']) : '';
    $subClass = isset($_POST['sub_class']) ? strtoupper($_POST['sub_class']) : '';

    if(in_array($studentClass, $classes)) {
        
        if(in_array($subClass, $sub_classes)) {
            $updateStudent = "UPDATE students SET 
            full_name='$_POST[student_name]',student_class='$studentClass',sub_class='$subClass',dt='$_POST[year_enrolled]'
            WHERE regno='$student_id'";
            $query = mysqli_query($connection, $updateStudent) or die(mysqli_error($connection));
            echo '  <div class="message">

            ✔️

            <br>

            <br>

            UPDATE WAS SUCCESSFUL!
    </div>';
        }else{
            echo '  <div class="message">

            ❌

            <br>

            <br>

            UPDATE WAS NOT SUCCESSFUL! <br /><br />

            INVALID INPUTS WERE SUPPLIED, PLEASE CROSS CHECK YOUR ENTRIES.
    </div>';
        }
    }
    
 
?>
    <script>
        setTimeout(() => {
            window.location.href="students.php";
        }, 3000);
    </script>
</body>
</html>


