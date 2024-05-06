<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/psychomotor.css">
</head>
<body>
<?php 
session_start();
$connection = mysqli_connect("localhost","root","","sms_db");
if (!$connection) {
    echo "There's a problem with the database connection!";
}

$getTermDetails = "SELECT * FROM term_details";
$query = mysqli_query($connection, $getTermDetails);
$termRecords = mysqli_num_rows($query);
$getTerm = mysqli_fetch_array($query);
?>
    <div class="modal">
        <div class="modalContainer">
    
            <div class="modalHeader"><span id="nameOfStudent"> </span> <span style="float: right;"><a href="" class="closeModal">&times;</a></span></div>
    
            <div class="modalBody">
                <div class="guide">
                  
                     RATINGS GUIDE &nbsp;&nbsp;===>&nbsp;&nbsp;&nbsp;&nbsp; (5) EXCELLENT &nbsp;&nbsp; (4) VERY GOOD &nbsp;&nbsp; (3) GOOD &nbsp;&nbsp; (2) FAIR &nbsp;&nbsp; (1) POOR</div>
                <h1>PSYCHOMOTOR DOMAIN</h1>
<form action="" method="POST" id="psyform">
    <input type="hidden" name="psy_term" value="<?php echo $getTerm["current_term"];?>">
    <input type="hidden" name="psy_year"  value="<?php echo $getTerm["term_year"];?>" id="hidden_year">
    <input type="hidden" name="reg_no" id="hidden_id">
    <input type="hidden" name="psy_class" id="hidden_class">
    <input type="hidden" name="psy_subclass" id="hidden_subclass">
                <select name="psydom[]" class="psydom"> <br>
                    <option value="">handwriting</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="psydom[]" class="psydom">
                    <option value="">verbal fluency</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="psydom[]" class="psydom">
                    <option value="">games</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="psydom[]" class="psydom">
                    <option value="">sports</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                
                <select name="psydom[]" class="psydom">
                    <option value="">handling tools</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                
                <select name="psydom[]" class="psydom">
                    <option value="">drawing & painting</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                
                <select name="psydom[]" class="psydom">
                    <option value="">musical skills</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>

                <h1>AFFECTIVE DOMAIN</h1>

                
                <select name="affdom[]" class="affdom">
                    <option value="">punctuality</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">neatness</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">politeness</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">initiative</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">cooperation</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">leadership traits</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">helping others</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">emotional stability</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">attitude to work</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">perseverance</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <select name="affdom[]" class="affdom">
                    <option value="">relationship with teachers</option>
                    <option value="5">5 </option>
                    <option value="4">4 </option>
                    <option value="3">3 </option>
                    <option value="2">2 </option>
                    <option value="1">1 </option>
                </select>
                <br> <br>
                <button class="modalSubmit" name="save_records">save</button>
    
            </form>
            </div>
    
            <div class="modalFooter"></div>
            
        </div>
    </div>
    <div class="header">DASHBOARD <span style="float: right;">
       &emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>
<?php
    if (isset($_POST["save_records"])) {
        $psydom = serialize($_POST["psydom"]);
        $affdom = serialize($_POST["affdom"]);

        $testForDuplicates = "SELECT * FROM psychomotor_records WHERE regno='$_POST[reg_no]' AND exam_term='$getTerm[current_term]'
        AND exam_year='$getTerm[term_year]' AND student_class='$_POST[psy_class]'";
        $testForDuplicatesQuery = mysqli_query($connection, $testForDuplicates) or die(mysqli_error($connection));
        $numberofDuplicates = mysqli_num_rows($testForDuplicatesQuery);
        if ($numberofDuplicates > 0) {
            $updateDuplicates = "UPDATE psychomotor_records SET psy_domain='$psydom', aff_domain='$affdom' 
            WHERE regno='$_POST[reg_no]' AND exam_term='$getTerm[current_term]' AND exam_year='$getTerm[term_year]'
             AND student_class='$_POST[psy_class]'";
             $executeUpdate = mysqli_query($connection, $updateDuplicates);
             echo '<div class="message" style="background:green;">Success</div>';
        }else{
        $saveEvaluation = "INSERT INTO psychomotor_records(regno,student_class,sub_class,exam_term,exam_year,psy_domain,aff_domain,completion_status)
        VALUES('$_POST[reg_no]','$_POST[psy_class]','$_POST[psy_subclass]','$getTerm[current_term]','$getTerm[term_year]','$psydom','$affdom',1)";
        $saveEvaluationQuery = mysqli_query($connection, $saveEvaluation);
    echo '<div class="message" style="background:green;">Success</div>';
    }
}
?>
        <div class="uploadspace">
            <table>
                <thead>
                    <tr class="datahead">
                        <th>SN</th>
                        <th>Student Name</th>
                        <th>Registration No</th>
                        <th>Class</th>
                        <th>Sub Class</th>
                        <th>Set</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $checkStudents = "SELECT * FROM students WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'";
                        $checkStudentsQuery = mysqli_query($connection, $checkStudents);
                        $numberOfStudentsForPsychomotor = mysqli_num_rows($checkStudentsQuery);
                        if ($numberOfStudentsForPsychomotor > 0) {
                            $rows = mysqli_fetch_array($checkStudentsQuery);
                            $count=0;
                            do{
                                    echo '<tr>';
                                    echo '<td style="width: 5%;">'.++$count.'</td>';
                                    echo'<td>'.$rows['full_name'].'</td>';
                                    echo'<td>'.$rows['regno'].'</td>';
                                    echo'<td>'.$rows['student_class'].'</td>';
                                    echo'<td>'.$rows['sub_class'].'</td>';
                                    echo'<td>'.$rows['dt'].'</td>';
                                    $validateStudent = "SELECT * FROM psychomotor_records WHERE student_class='$rows[student_class]' AND sub_class='$rows[sub_class]' AND regno='$rows[regno]' AND exam_term='$getTerm[current_term]' AND exam_year='$getTerm[term_year]'";
                                    $validationQuery = mysqli_query($connection, $validateStudent);
                                    $validationStatus = mysqli_fetch_array($validationQuery);
                                    $validEntries = mysqli_num_rows($validationQuery);
                                    if($validEntries>0){
                                            echo '<td class="complete">completed</td>';
                                    }else{
                                            echo '<td class="notComplete">not completed</td>';
                                    }
                                    
                                    echo '<td class="actions">
                                        <button class="del">&times; delete</button>&ensp;
                                        <button class="edit">&#9998; edit</button>&ensp;
                                        </td>
                                         </tr>';
                                    }while($rows = mysqli_fetch_array($checkStudentsQuery));
                        }
                    ?>
                 
                        
                                    
                            
                                    
                                
                                    
                                    
                                
                            
                        
                        
                </tbody>
                
                <tr class="datahead">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>

<?php
    
?>
        </div>

        <script src="js/psymodal.js"></script>
</body>
</html>