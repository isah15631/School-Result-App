<?php
$connection = mysqli_connect("localhost","root","","sms_db");
if (!$connection) {
    echo "There's a problem with the database connection!";
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/results.css">
</head>
<body>
    <div class="header">DASHBOARD <span style="float: right;text-transform: uppercase;color:white;">
    <?php echo $_SESSION["student_class"].", ".$_SESSION["term"]." RESULTS,  ".$_SESSION["year"];?>&emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>

        <div class="uploadForm">
<input type="search" name="" id="" style="width: 100%;padding:10px;padding-left:20px;border-radius:10px;" placeholder="&#128269; Search" class="search">
            

        </div>

        <input type="hidden" name="flag" value="<%=flag%>" id="flag">
        <div class="message"><%=message%></div>
        <div class="uploadspace">
            <table class="recordHolder">
                <thead>
                    <tr class="datahead">
                        <th>SN</th>
                        <th>Student Name</th>
                        <th>Reg No</th>
                        <?php
                            $getSubjectNames = "SELECT DISTINCT subject FROM exams WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'
                            AND exam_term='$_SESSION[term]' AND exam_year='$_SESSION[year]'";
                            $getSubjectNamesQuery = mysqli_query($connection, $getSubjectNames);
                            $subjectNames = mysqli_fetch_array($getSubjectNamesQuery);
                            do{
                                echo "<th>".substr($subjectNames['subject'],0,3)."</th>";
                            }while($subjectNames = mysqli_fetch_array($getSubjectNamesQuery));

                        ?>
                        
                        
                        
                        <th>Total</th>
                        <th>Rank</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $getStudentsScores = "SELECT DISTINCT regno,full_name FROM exams WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'
                            AND exam_term='$_SESSION[term]' AND exam_year='$_SESSION[year]'";
                            $getStudentsScoresQuery = mysqli_query($connection, $getStudentsScores);
                            $getScores = mysqli_fetch_array($getStudentsScoresQuery);
                            $sn = 0;
                            do{
                                echo "<tr>";
                                echo '<td style="width: 5%;">'.++$sn.'</td>';
                                echo "<td>".$getScores['full_name']."</td>";
                                echo "<td>".$getScores['regno']."</td>";
                                $regno = $getScores['regno'];
                                $total = 0;
                                $individualScores = "SELECT DISTINCT subject,total FROM exams WHERE regno='$regno' AND student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'
                            AND exam_term='$_SESSION[term]' AND exam_year='$_SESSION[year]'";
                            $individualScoresQuery = mysqli_query($connection, $individualScores);
                            $individualTotal = mysqli_fetch_array($individualScoresQuery);
                                do{
                                    echo "<td>".$individualTotal['total']."</td>";
                                    $total+=$individualTotal['total'];

                                }while($individualTotal = mysqli_fetch_array($individualScoresQuery));

                                echo '<td class="total">'.$total.'</td>';
                                $total = 0;
                                echo '
                                <td class="rank"></td>
                                <td style="text-align: center;">
                                    <a href="report-sheet.php?regno='.$regno.'"><button class="print">&#128424; print</button></a>
                                </td>
                            </tr>';
                            }while($getScores = mysqli_fetch_array($getStudentsScoresQuery));

                        ?>

                        
                </tbody>
                
                <tr class="datahead">
                    <th colspan="20"></th>
                </tr>
            </table>
            
        </div>

    
        <script src="js/rank.js"></script>
         <script src="js/resultsFilter.js"></script>
        <script src="js/notificationHandler.js"></script>
</body>
</html>