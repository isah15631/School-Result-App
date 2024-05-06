<?php
    session_start();
    
    $dt = date("d-m-Y");
    $connection = mysqli_connect("localhost","root","","sms_db");
    if (!$connection) {
        echo "There's a problem with the database connection!";
    }
    $getTermDetails = "SELECT * FROM term_details";
    $query = mysqli_query($connection, $getTermDetails);
    $termRecords = mysqli_num_rows($query);
    $getTerm = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/computation.css">
</head>
<body>
    <div class="header">DASHBOARD <span style="float: right;color:white;">
        <?php echo $_SESSION["subject"]." ".$_SESSION["student_class"]." ".$_SESSION['sub_class'] ?> &emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>
    <form action="" method="POST" id="form">
    <div class="uploadForm">
<span style="float: left;color: white;padding: 10px;font-weight: bold;padding-left:30px;text-transform:uppercase;"><?php echo $_SESSION["subject"];?> SCORESHEET</span>
        
        <button class="upload" id="calculate"><span style="font-size: 17px;">&#128187;</span> compute</button> &emsp;
        <button class="upload" id="save" name="save_results">&#128190; save</button>

    </div>
    <div class="uploadspace">
        
        
        <?php

            if(isset($_POST["save_results"])){
                    $checkExamRecordsForClass = "SELECT * FROM exams WHERE student_class='$_SESSION[student_class]'
                    AND sub_class='$_SESSION[sub_class]' AND exam_term='$getTerm[current_term]' AND exam_year='$getTerm[term_year]'
                    AND subject='$_SESSION[subject]'";
                    $queryCheck = mysqli_query($connection,$checkExamRecordsForClass) or die(mysqli_error($connection));
                    $numberOfExams = mysqli_num_rows($queryCheck);
                    if($numberOfExams>0){
                    for ($i=0; $i < sizeof($_POST['reg_no']); $i++) { 
                        $ca1 = $_POST['ca1'][$i];
                        $ca2 = $_POST['ca2'][$i];
                        $exams = $_POST['exams'][$i];
                        $total = $_POST['total'][$i];
                        $grade = $_POST['grade'][$i];
                        $position = $_POST['position'][$i];
                        $regno = $_POST["reg_no"][$i];
                        $updateScores = "UPDATE exams SET ca1='$ca1',ca2='$ca2',exam_score='$exams',total='$total',grade='$grade',subject_position='$position' WHERE student_class='$_SESSION[student_class]'
                        AND sub_class='$_SESSION[sub_class]' AND exam_term='$getTerm[current_term]' AND exam_year='$getTerm[term_year]'
                        AND subject='$_SESSION[subject]' AND regno='$regno'";
                        $updateScoreQuery = mysqli_query($connection, $updateScores);
                    }
                    
                    echo '<div class="message" style="background:green;">Update was Successful!</div>';
                    }else{
                        

                        for ($i=0; $i <sizeof($_POST["reg_no"]) ; $i++) { 
                            //upper
                            $ca1 = $_POST['ca1'][$i];
                            $ca2 = $_POST['ca2'][$i];
                            $exams = $_POST['exams'][$i];
                            $total = $_POST['total'][$i];
                            $grade = $_POST['grade'][$i];
                            $position = $_POST['position'][$i];
                            $regno = $_POST["reg_no"][$i];
                            $fullname = $_POST["student_name"][$i];
                            $saveResult = "INSERT INTO exams(regno,full_name,student_class,sub_class,subject,ca1,ca2
                            ,exam_score,total,grade,subject_position,exam_term,exam_year)values
                            ('$regno','$fullname','$_SESSION[student_class]','$_SESSION[sub_class]','$_SESSION[subject]'
                            ,'$ca1','$ca2','$exams','$total','$grade','$position','$getTerm[current_term]','$getTerm[term_year]')";
                            $saveResultQuery = mysqli_query($connection,$saveResult) or die(mysqli_error($con));
                        }
                        echo '<div class="message" style="background:green;">Results successfully Computed and Saved!</div>';
                        
                    }
            
            }
        ?>

        <input type="hidden" id="previous_result_ca1" value="<%= previous_result[0]%>">
        <input type="hidden" id="previous_result_ca2" value="<%= previous_result[1]%>">
        <input type="hidden" id="previous_result_exam" value="<%= previous_result[2]%>">
        <input type="hidden" id="previous_result_total" value="<%= previous_result[3]%>">
        <input type="hidden" id="previous_result_grade" value="<%= previous_result[4]%>">
        <input type="hidden" id="previous_result_position" value="<%= previous_result[5]%>">
        <input type="hidden" id="flag">
    <input type="hidden" name="exam_term" value="<?php $getTerm['current_term'];?>">
    <input type="hidden" name="exam_year" value="<?php $getTerm['term_year'];?>">
    <input type="hidden" name="exam_subject" value="<?php $_SESSION['subject'];?>">
    <input type="hidden" name="student_class" value="<?php $_SESSION['student_class'];?>">
    <input type="hidden" name="sub_class" value="<?php $_SESSION['sub_class'];?>">

        <table class="holder">
            <thead>
                <tr>
                    <th colspan="10"><?php echo $_SESSION['subject'];?></th>
                </tr>
                <tr class="datahead">
                    <th>registration no</th>
                    <th>student name</th>
                    <th>1st ca</th>
                    <th>2nd ca</th>
                    <th>exams</th>
                    <th>total</th>
                    <th>grade</th>
                    <th>position</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $filterStudents = "SELECT * FROM students WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'";
                $filterQuery = mysqli_query($connection, $filterStudents);
                $numberOfStudentsForExams = mysqli_num_rows($filterQuery);
                if ($numberOfStudentsForExams> 0) {
                    $fetchStudents = mysqli_fetch_array($filterQuery);
                    $checkExamRecordsForClass = "SELECT * FROM exams WHERE student_class='$_SESSION[student_class]'
                    AND sub_class='$_SESSION[sub_class]' AND exam_term='$getTerm[current_term]' AND exam_year='$getTerm[term_year]'
                    AND subject='$_SESSION[subject]'";
                    $queryCheck = mysqli_query($connection,$checkExamRecordsForClass);
                    $numberOfExams = mysqli_num_rows($queryCheck);
                    if($numberOfExams>0){
                        $results = mysqli_fetch_array($queryCheck);
                        $count = 0;
                        do{
                            echo '<tr>';
                            echo ' <td><input type="text" name="reg_no[]" class="student_id" value="'.$results['regno'].'"></td>';
                            echo ' <td><input type="text" name="student_name[]" class="student_name" value="'.$results['full_name'].'"></td>';
                            echo ' <td><input type="number" name="ca1[]" class="ca1" min="0" max="20" value="'.$results['ca1'].'"></td>';
                            echo ' <td><input type="number" name="ca2[]" class="ca2" min="0" max="20" value="'.$results['ca2'].'"></td>';
                            echo ' <td><input type="number" name="exams[]" class="exams" min="0" max="60" value="'.$results['exam_score'].'"></td>';
                            echo ' <td><input type="number" name="total[]" class="total" min="0" max="100" value="'.$results['total'].'"></td>';
                            echo ' <td><input type="text" name="grade[]" class="grade" value="'.$results['grade'].'"></td>';
                            echo ' <td><input type="number" name="position[]" class="position" value="'.$results['subject_position'].'"></td>';
                            echo '</tr>';
                            $count++;
                        }while($results = mysqli_fetch_array($queryCheck));
                    }else{
                        do{
                            echo '<tr>';
                            echo ' <td><input type="text" name="reg_no[]" class="student_id" value="'.$fetchStudents['regno'].'"></td>';
                            echo ' <td><input type="text" name="student_name[]" class="student_name" value="'.$fetchStudents['full_name'].'"></td>';
                            echo ' <td><input type="number" name="ca1[]" class="ca1" value="0" min="0" max="20"></td>';
                            echo ' <td><input type="number" name="ca2[]" class="ca2" value="0" min="0" max="20"></td>';
                            echo ' <td><input type="number" name="exams[]" class="exams" value="0" min="0" max="60"></td>';
                            echo ' <td><input type="number" name="total[]" class="total" min="0" max="100"></td>';
                            echo ' <td><input type="text" name="grade[]" class="grade"></td>';
                            echo ' <td><input type="number" name="position[]" class="position"></td>';
                            echo '</tr>';
                         }while($fetchStudents = mysqli_fetch_array($filterQuery));
                    }
            }
                ?>
                
                <tr class="datahead">
                    <th colspan="10" class="footer"></th>
                </tr>
            </tbody>
        </table>
    </form>
    </div>

    <script src="js/calculator.js"></script>
    <script src="js/notificationHandler.js"></script>
</body>
</html>