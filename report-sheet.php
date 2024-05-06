<?php

session_start();
$connection = mysqli_connect("localhost","root","","sms_db");
if (!$connection) {
    echo "There's a problem with the database connection!";
}
$getStudentsScores = "SELECT *  FROM exams WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'
AND exam_term='$_SESSION[term]' AND exam_year='$_SESSION[year]' AND regno='$_GET[regno]'";
$getStudentsScoresQuery = mysqli_query($connection, $getStudentsScores);
$getScores = mysqli_fetch_array($getStudentsScoresQuery);

$getPsychomotor = "SELECT aff_domain,psy_domain FROM psychomotor_records WHERE student_class='$_SESSION[student_class]' AND sub_class='$_SESSION[sub_class]'
AND exam_term='$_SESSION[term]' AND exam_year='$_SESSION[year]' AND regno='$_GET[regno]'";
$getPsychomotorQuery = mysqli_query($connection, $getPsychomotor);
$getPsychoScores = mysqli_fetch_array($getPsychomotorQuery);

$psydom = unserialize($getPsychoScores["psy_domain"]);
$affdom = unserialize($getPsychoScores["aff_domain"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
    <table class="mainCard">
        <tr>
            <td class="cardHeading" colspan="8"><a href="results.php">AREWA SUCCESS | Report Sheet</a></td>
        </tr>
        <tr>
            <td class="infoHoldersTitle"> Name </td>
            <td class="infoHolders" colspan="7"><?php echo $getScores["full_name"]; ?></td>
        </tr>
        <tr>
            <td class="infoHoldersTitle">Reg No </td>
            <td class="infoHolders" colspan="7"><?php echo $getScores["regno"];  ?></td>
        </tr>
        <tr>
            <td class="infoHoldersTitle">Class </td>
            <td class="infoHolders" colspan="7"><?php echo $_SESSION["student_class"]." ".$_SESSION["sub_class"];?></td>
        </tr>
        <tr>
            <td class="infoHoldersTitle">Term </td>
            <td class="infoHolders" colspan="7"><?php echo $_SESSION["term"].", ".$_SESSION["year"]; ?></td>
        </tr>
        <tr>
            <td class="infoHoldersTitle">Position </td>
            <td class="infoHolders" colspan="7" id="rank"><?php echo $_GET['rank'];?></td>
        </tr>
        <tr>
            <td class="guide" colspan="8">
                (A = 75 - 100) (B = 65 - 74) (C = 55 - 64)  (D = 45 - 54)  (E = 40 - 44)  (F = 0 - 39)
            </td>
        </tr>
        <tr>
            <td class="reportHeading" style="padding-left: 20px;">Subjects</td>
            <td class="reportHeading">1<sup>st</sup> CA</td>
            <td class="reportHeading">2<sup>nd</sup> CA</td>
            <td class="reportHeading">Exams</td>
            <td class="reportHeading">total</td>
            <td class="reportHeading">grade</td>
            <td class="reportHeading">Position</td>
        </tr>
       <?php
       do{
            echo '<tr>';
            echo '<td class="subnames">'.$getScores['subject'].'</td>';
            echo '<td class="data">'.$getScores['ca1'].'</td>';
            echo '<td class="data">'.$getScores['ca2'].'</td>';
            echo '<td class="data">'.$getScores['exam_score'].'</td>';
            echo '<td class="data totals">'.$getScores['total'].'</td>';
            echo '<td class="data grader">'.$getScores['grade'].'</td>';
            echo '<td class="data">'.$getScores['subject_position'].'</td>';
            echo '</tr>';
       }while($getScores=mysqli_fetch_array($getStudentsScoresQuery));
       ?>
        <tr>
            <td class="guide" colspan="8">
                (EXCELLENT = 5) (VERY GOOD = 4) (GOOD = 3)  (FAIR = 2)  (POOR = 1)
            </td>
        </tr>
        <tr>
            <td class="moto" colspan="7">

                
    
    <table class="psytable">
        <tr>
            <td class="psytitle" colspan="2">PSYCHOMOTOR DOMAIN</td>
            <td class="psytitle" colspan="2">AFFECTIVE DOMAIN</td>
        </tr>
        <tr>
            <td class="psydata">handwriting</td>
            <td class="psyscore"><?php  echo $psydom[0]; ?></td>
            <td class="psydata">punctuality</td>
            <td class="psyscore"><?php echo $affdom[0]?></td>
        </tr>
        <tr>
            <td class="psydata">verbal fluency</td>
            <td class="psyscore"><?php  echo $psydom[1]; ?></td>
            <td class="psydata">neatness</td>
            <td class="psyscore"><?php echo $affdom[1]?></td>
        </tr>
        <tr>
            <td class="psydata">games</td>
            <td class="psyscore"><?php  echo $psydom[2]; ?></td>
            <td class="psydata">politness</td>
            <td class="psyscore"><?php echo $affdom[2]?></td>
        </tr>
        <tr>
            <td class="psydata">sports</td>
            <td class="psyscore"><?php  echo $psydom[3]; ?></td>
            <td class="psydata">initiative</td>
            <td class="psyscore"><?php echo $affdom[3]?></td>
        </tr>
        <tr>
            <td class="psydata">handling tools</td>
            <td class="psyscore"><?php  echo $psydom[4]; ?></td>
            <td class="psydata">cooperation with others</td>
            <td class="psyscore"><?php echo $affdom[4]?></td>
        </tr>
        <tr>
            <td class="psydata">drawing and painting</td>
            <td class="psyscore"><?php  echo $psydom[5]; ?></td>
            <td class="psydata">leadership traits</td>
            <td class="psyscore"><?php echo $affdom[5]?></td>
        </tr>
        <tr>
            <td class="psydata">msucial skills</td>
            <td class="psyscore"><?php  echo $psydom[6]; ?></td>
            <td class="psydata">helping others</td>
            <td class="psyscore"><?php echo $affdom[6]?></td>
        </tr>
        <tr>
            <td class="psytitle" colspan="2">COMMENTS</td>
            <td class="psydata">emotional stability</td>
            <td class="psyscore"><?php echo $affdom[7]?></td>
        </tr>
        <tr>
            <td class="psydata comment_one" colspan="2" style="padding: 10px;">Form Master's comment : </td>
            <td class="psydata">attitude to work</td>
            <td class="psyscore"><?php echo $affdom[8]?></td>
        </tr>
        <tr>
            <td class="psydata comment_two" colspan="2" style="padding: 10px;">Form Master's comment : </td>
            <td class="psydata">perseverance</td>
            <td class="psyscore"><?php echo $affdom[9]?></td>
        </tr>
        <tr>
            <td class="psydata" colspan="2" ></td>
            <td class="psydata">relationship with teachers</td>
            <td class="psyscore"><?php echo $affdom[10]?></td>
        </tr>
    </table>
            </td>
        </tr>
        <tr>
            <td class="footer" colspan="7"></td>
        </tr>
    </table>
    <script src="js/grader.js"></script>
</body>
</html>