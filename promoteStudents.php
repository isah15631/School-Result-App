
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/students.css">
</head>
<body>
    
    <div class="header">DASHBOARD <span style="float: right;">
        <a href="students.php">&#128682; back</a></span>
    </div>
    <div class="uploadspace">
       


                <?php
    $connection = mysqli_connect("localhost","root","","sms_db");

    // Define valid classes and subclasses
    $classes = ["SS3","SS2","SS1","JS3","JS2","JS1","PRIMARY 6","PRIMARY 5","PRIMARY 4","PRIMARY 3","PRIMARY 2","PRIMARY 1","NURSERY 2","NURSERY 1"];
    $sub_classes = ["SCIENCE","ART","COMMERCIAL",""];

    $regnos = explode(",", $_POST["promotion_list"]);

    $new_class = strtoupper($_POST['promotion_class']);

    // Check if the entered class and subclass are valid
    if (in_array($new_class, $classes)) { 
        echo'
        <div class="message" style="display:block;background:green;">   students successfully promoted</div>
                <table class="recordHolder">
                    <thead>
                        <tr class="datahead">
                            <th style="width:50px ;">SN</th>
                            <th style="width: 400px;">Student Name</th>
                            <th style="width: 150px;">Reg No</th>
                            <th style="width: 100px;">From</th>
                            <th style="width: 100px;">To</th>
                            <th style="width: 100px;">Sub Class</th>
                            <th style="width: 100px;">Set</th>
                        </tr>
                    </thead>
                    <tbody>';
        for ($i = 0; $i < sizeof($regnos); $i++) {
            $getDetails = "SELECT * FROM students WHERE regno = '$regnos[$i]'";
            $getDetailsQuery = mysqli_query($connection, $getDetails) or die(mysqli_error($connection));
            $rows = mysqli_fetch_array($getDetailsQuery);

            echo "<tr>";
                echo "<td>".($i+1)."</td>";
                echo "<td>".$rows['full_name']."</td>";
                echo "<td>".$rows['regno']."</td>";
                echo "<td>".$rows['student_class']."</td>";
                echo "<td>".$new_class."</td>";
                echo "<td>".$rows['sub_class']."</td>";
                echo "<td>".$rows['dt']."</td>";
            echo "<tr>";

            // Update only if both class and subclass are valid
            $updateStudentClass = "UPDATE students SET student_class='$new_class' WHERE regno='$regnos[$i]'";
            $updateStudentClassQuery = mysqli_query($connection, $updateStudentClass) or die(mysqli_error($connection));
        }
    } else {
        echo "<div class='message' style='display:block;background:red;'>Invalid class entered.</div>";
    }
?>
<tr class="datahead">
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
</tr>
</tbody>
</table>
</body>
</html>