<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/upload.css">
</head>
<body>
<?php
    $connection = mysqli_connect("localhost","root","","sms_db");
    if (!$connection) {
        echo "There's a problem with the database connection!";
    }

function generateRegno() {
    $connection = mysqli_connect("localhost","root","","sms_db");
    if (!$connection) {
        echo "There's a problem with the database connection!";
    }

    $getStudentCount = "SELECT * FROM students";
    $query = mysqli_query($connection, $getStudentCount);
    $numberOfRecords = mysqli_num_rows($query);
    $regno = ($numberOfRecords>0) ? "RGN".($numberOfRecords+1) : "RGN".($numberOfRecords+1) ;
    return $regno;

}
?>
    <div class="header">DASHBOARD<span style="float: right;">
        <input type="hidden" name="flag" value="<%=flag%>" id="flag">
        &emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>
<form action="" method="post">
        <div class="uploadForm">

            <input type="file" name="studentListFile" accept=".csv" class="fileUploadInput"> &nbsp;&nbsp;

            
            <select name="student_class" class="regularSelect">
                <option value="">&#127891; select class</option>
                <option value="" class="optionGuide">senior secondary section</option>
                <option value="SS3">SS3</option>
                <option value="SS2">SS2</option>
                <option value="SS1">SS1</option>
                <option value="" class="optionGuide">junior secondary section</option>
                <option value="JS3">JS3</option>
                <option value="JS2">JS2</option>
                <option value="JS1">JS1</option>
                <option value="" class="optionGuide">primary section</option>
                <option value="PRIMARY 6">PRIMARY 6</option>
                <option value="PRIMARY 5">PRIMARY 5</option>
                <option value="PRIMARY 4">PRIMARY 4</option>
                <option value="PRIMARY 3">PRIMARY 3</option>
                <option value="PRIMARY 2">PRIMARY 2</option>
                <option value="PRIMARY 1">PRIMARY 1</option>
                <option value="" class="optionGuide">nursery section</option>
                <option value="NURSERY 2">NURSERY 2</option>
                <option value="NURSERY 1">NURSERY 1</option>
            </select>
            &nbsp;&nbsp;
            <select name="sub_class" class="regularSelect" >
                <option value="">&#127891; class category (optional)</option>
                <option value="SCIENCE">science</option>
                <option value="ART">art</option>
                <option value="COMMERCIAL">commercial</option>
            </select>&nbsp;&nbsp;
            <button class="upload">&#128228; upload</button> &nbsp;
            <button class="upload" id="completeUpload" name="save">&#128190; save</button>

        </div>

        <div class="uploadspace">


            <table>
                <thead>
                    <tr class="datahead">
                        <th>SN</th>
                        <th>Student Name &emsp;(you can edit names before saving)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


        </div>
    </form>
  
<?php
            if (isset($_POST["save"])) {  
                if (empty($_POST["student_class"])) {
                    echo '<div class="message" style="background:red;">Students class missinng</div>';
                }else{
                    $lenghtOfArray =  sizeof($_POST['student_name']);
                    for ($i=0; $i < $lenghtOfArray; $i++) {                  
                        $regno = generateRegno();
                        $dt = date('Y');
                        $student_name = $_POST["student_name"][$i];
                        $saveStudents = "INSERT INTO students(full_name,regno,student_class,sub_class,dt)values
                        ('$student_name','$regno','$_POST[student_class]','$_POST[sub_class]','$dt')";
                        $query = mysqli_query($connection,$saveStudents);
                    }
                    
                    echo '<div class="message" style="background:green;">Students Uploaded successfully</div>';
                }          
            }
    ?>
    <script src="js/reader.js"></script>
    <script src="js/notificationHandler.js"></script>
</body>
</html>