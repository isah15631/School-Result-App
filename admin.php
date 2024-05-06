<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>FREE</title>
</head>
<body>
<?php

$dt = date("d-m-Y");
$connection = mysqli_connect("localhost","root","","sms_db");
if (!$connection) {
    echo "There's a problem with the database connection!";
}
session_start();
if (isset($_POST["view_students"])) {
    header("location:students.php");
}
if (isset($_POST["upload_students"])) {
    header("location:students-upload.php");
}
if (isset($_POST["view_subjects"])) {
    header("location:subjects.php");
}
if (isset($_POST["view_admins"])) {
    header("location:admins.php");
}
if (isset($_POST['check_students'])) {
    $_SESSION["student_class"]=$_POST["student_class"];
    $_SESSION["sub_class"]=$_POST["sub_class"];
    $_SESSION["subject"]=$_POST["subject"];
    
    
    $validate = "SELECT * FROM students WHERE student_class='$_POST[student_class]' AND sub_class='$_POST[sub_class]'";
    $validateQuery = mysqli_query($connection, $validate);
    $countResults = mysqli_num_rows($validateQuery);
    if ($countResults > 0) {
        header("location:computation.php");
    }else{
        header("location:noData.php");
    }
}
if (isset($_POST['proceed_psychomotor'])) {
    $_SESSION["student_class"]=$_POST["student_class"];
    $_SESSION["sub_class"]=$_POST["sub_class"];
    
    $validate = "SELECT * FROM students WHERE student_class='$_POST[student_class]' AND sub_class='$_POST[sub_class]'";
    $validateQuery = mysqli_query($connection, $validate);
    $countResults = mysqli_num_rows($validateQuery);
    if ($countResults > 0) {
        header("location:psychomotor.php");
    }else{
        header("location:noData.php");
    }
}
if (isset($_POST['check_availability'])) {
    $_SESSION["student_class"]=$_POST["student_class"];
    $_SESSION["sub_class"]=$_POST["sub_class"];
    $_SESSION['term'] = $_POST['term'];
    $_SESSION['year'] = $_POST['year'];
    $validate = "SELECT * FROM exams WHERE student_class='$_POST[student_class]' AND sub_class='$_POST[sub_class]'
    AND exam_term='$_POST[term]' AND exam_year='$_POST[year]'";
    $validateQuery = mysqli_query($connection, $validate);
    $countResults = mysqli_num_rows($validateQuery);
    if ($countResults > 0) {
    header("location:results.php");
    }else{
        header("location:noData.php");
    }
}



    $getTermDetails = "SELECT * FROM term_details";
    $query = mysqli_query($connection, $getTermDetails);
    $termRecords = mysqli_num_rows($query);
    $getTerm = mysqli_fetch_array($query);
  
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
}?>
<div class="header">DASHBOARD <span style="float: right;text-transform: uppercase;color:white;">
        <?php if ($termRecords > 0) {echo $getTerm["current_term"].", ".$getTerm["term_year"];}?> &emsp;&emsp;&emsp;&emsp;<a href="index.php">&#128682; Log out</a></span></div>
    
        <form action="" method="POST">
        <div class="container">

            <div class="nav">
              
                <table class="menu">
                    <tr>
                        <td style="position: relative; left:-20px;">
                            <button class="menuItem" name="add_term"> <span style="font-size: 17px;">&#128198;</span>&emsp;Term details</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:0px;">
                            <button class="menuItem" name="add_student"><span style="font-size: 17px;">&#127891;</span>&emsp;Add student</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:20px;">
                            <button class="menuItem" name="upload_students"><span style="font-size: 17px;">&#128228;</span>&emsp;upload students</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:30px;">
                            <button class="menuItem" name="view_students"><span style="font-size: 17px;">&#128228;</span>&emsp;view students</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:50px;">
                            <button class="menuItem" name="add_subject"><span style="font-size: 17px;">&#128218;</span>&emsp;Add subject</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:60px;">
                            <button class="menuItem" name="view_subjects"><span style="font-size: 17px;">&#128218;</span>&emsp;view subjects</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:70px;">
                            <button class="menuItem" name="compute_score"><span style="font-size: 17px;">&#128187;</span>&emsp;compute score</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:60px;">
                            <button class="menuItem" name="compute_psychomotor"><span style="font-size: 17px;">&#129504;</span>&emsp;compute psychomotor</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:50px;">
                            <button class="menuItem" name="check_results"><span style="font-size: 17px;">&#9881;</span>&emsp;Results</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:20px;">
                            <button class="menuItem" name="add_admin"><span style="font-size: 17px;">&#9881;</span>&emsp;Add Admin</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative; left:-20px;">
                            <button class="menuItem" name="view_admins"><span style="font-size: 17px;">&#9881;</span>&emsp;View Admins</button>
                        </td>
                    </tr>
                </table>

                <input type="hidden" name="flag" value="<%=flag%>" id="flag">
            </div>


            <div class="workspace">
            
<?php

if(!isset($_POST["add_student"]) && !isset($_POST['check_results'])  && !isset($_POST['add_term']) && !isset($_POST['add_subject']) && !isset($_POST['add_admin']) && !isset($_POST['compute_score']) && !isset($_POST['compute_psychomotor'])){
    echo '  
    <table class="display">
        <tr>
            <td class="day" colspan="4">'.strtoupper(date('l , jS F , Y')).'</td>
        </tr>
        <tr>
            <td class="hour">H</td>
            <td class="minute">M</td>
            <td class="second">S</td>
            <td class="section">T</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="bar"></td>
        </tr>
    </table>';
}
if (isset($_POST['add_term'])) {
    echo '
    <div class="contentContainer">
    <div class="contentHeader">TERM DETAILS</div>

   
    <div class="contentBody">
            <table class="structure">
                
                <tr>
                    <td class="labels"> &rAarr;</td>
                    <td class="inputs">
                        <select name="current_term" class="regularSelect" id="term">
                            <option value="">&#127891; select current term</option>
                            <option>first term</option>
                            <option>second term</option>
                            <option>third term</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="labels">&rAarr;</td>
                    <td class="inputs">
                        <input type="text" name="term_year" value="'.date('Y').'" class="regularInput" placeholder="&#128198; enter year ">
                    </td>
                </tr>

            </table>
            
        <button class="operationButtons" id="termButton" name="save_term">save term</button>
        
    </div>
    <div class="contentFooter"></div>
</div>   
    ';
}


if (isset($_POST['save_term'])) {
if (empty($_POST['current_term']) && empty($_POST['term_year'])) {

    echo '<div class="message" style="background:red;">Fields cannot be empty.</div>';

}else{
    $check = "SELECT * FROM term_details";
    $query =  mysqli_query($connection,$check);
    $nums = mysqli_num_rows($query);
    if ($nums > 0) {
        $update = "UPDATE term_details SET current_term='$_POST[current_term]', term_year='$_POST[term_year]' WHERE id=1";
        $query=mysqli_query($connection,$update);
        echo '<div class="message" style="background:green;">Term details successfully updated</div>';
    }else{
        $save = "INSERT INTO term_details(current_term,term_year)values('$_POST[current_term]','$_POST[term_year]')";
        $query = mysqli_query($connection,$save);
        echo '<div class="message" style="background:green;">Term details successfully saved</div>';
    }
    echo "<script type='text/javascript'> setTimeout(()=>{window.location.href='admin.php'},1000) </script>";
}
}


if (isset($_POST['add_student'])) {
    echo'
    <div class="contentContainer">

        <div class="contentHeader">STUDENT REGISTRATION DETAILS</div>

       
        <div class="contentBody">
            <form action="" method="POST">
                <table class="structure">
                    <tr>
                        <td class="labels"> &rAarr;</td>
                        <td class="inputs">
                            <input type="text" name="student_name" class="regularInput" placeholder="&#127891; enter student full name">
                        </td>
                    </tr>
                    <tr>
                        <td class="labels"> &rAarr;</td>
                        <td class="inputs">
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
                            </select> &nbsp;
                            <select name="sub_class" class="regularSelect" style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;">
                                <option value="">&#127891; select sub class (optional)</option>
                                <option value="SCIENCE">science</option>
                                <option value="ART">art</option>
                                <option value="COMMERCIAL">commercial</option>
                            </select>
                        </td>
                    </tr>

                </table>

            <button class="operationButtons" name="save_student">save</button>
            </form>
        </div>
        <div class="contentFooter"></div>
</div>   
';
}

if (isset($_POST['save_student'])) {
    if (empty($_POST['student_name']) && empty($_POST['student_class'])) {
        echo '<div class="message" style="background:red;">Fields cannot be empty.</div>';
    }else{
        $regno = generateRegno();
        $dt = date('Y');
        $saveStudents = "INSERT INTO students(full_name,regno,student_class,sub_class,dt)values
        ('$_POST[student_name]','$regno','$_POST[student_class]','$_POST[sub_class]','$dt')";
        $query = mysqli_query($connection,$saveStudents);
        echo "<div class='message' style='background:green;'>Student successfully added</div>";
    }
}
if (isset($_POST['add_subject'])) {
    echo'     

    <div class="contentContainer">

        <div class="contentHeader">SUBJECT REGISTRATION FORM</div>

       
        <div class="contentBody">
            <form action="/new-subject" method="post">
                <table class="structure">
                    <tr>
                        <td class="labels"> &rAarr;</td>
                        <td class="inputs">
                            <input type="text" name="subject_name" class="regularInput" placeholder="&#128218; enter subject name">
                        </td>
                    </tr>

                </table>

            <button class="operationButtons" name="save_subject">save</button>
            </form>
        </div>
        <div class="contentFooter"></div>
</div>                 
';
}
if (isset($_POST['save_subject'])) {
    if (empty($_POST['subject_name'])) {
       
    echo "<div class='message' style='background:red;'>Subject name can't be blank</div>";
    }else{
        $subject = strtoupper($_POST["subject_name"]);
    $save_subject = "INSERT INTO subjects(subject_name)values('$subject')";
    $query = mysqli_query($connection,$save_subject);
    echo "<div class='message' style='background:green;'>Subject successfully added</div>";
}
}


if (isset($_POST['compute_score'])) {
    echo'    <div class="contentContainer">

    <div class="contentHeader">SCORES COMPUTATION FORM</div>

   
    <div class="contentBody">
        <form action="/computation-check" method="post">
            <table class="structure">
                <tr>
                    <td class="labels"> &rAarr;</td>
                    <td class="inputs">
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
                        </select> &nbsp;
                        <select name="sub_class" class="regularSelect" style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;">
                            <option value="">&#127891;class category (optional)</option>
                            <option value="SCIENCE">science</option>
                            <option value="ART">art</option>
                            <option value="COMMERCIAL">commercial</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="labels"> &rAarr;</td>
                    <td class="inputs">
                    <select name="subject" class="regularSelect" id="">
                    <option value="">&#127891; select subject</option>
                        ';
                        $getSubjects = "SELECT * FROM subjects";
                        $query = mysqli_query($connection, $getSubjects);
                        $numberOfRecords = mysqli_num_rows($query);
                        if ($numberOfRecords>0) {
                            $rows = mysqli_fetch_array($query);
                        
                        
                            do{
                                echo "<option>".$rows['subject_name']."</option>";
                            }while( $rows = mysqli_fetch_array($query));
}
                        
                        echo '
                        </select>
                    </td>
                </tr>

            </table>

        <button class="operationButtons" name="check_students">proceed</button>
        </form>
    </div>
    <div class="contentFooter"></div>
</div>';                 
}

if(isset($_POST["compute_psychomotor"])){
echo '<div class="contentContainer">

<div class="contentHeader">PSYCHOMOTOR COMPUTATION FORM</div>


<div class="contentBody">
    <form action="" method="post">
        <table class="structure">
            <tr>
                <td class="labels"> &rAarr;</td>
                <td class="inputs">
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
                    </select> &nbsp;
                    <select name="sub_class" class="regularSelect" style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;">
                        <option value="">&#127891;class category (optional)</option>
                        <option value="SCIENCE">science</option>
                        <option value="ART">art</option>
                        <option value="COMMERCIAL">commercial</option>
                    </select>
                </td>
            </tr>

        </table>

    <button class="operationButtons" name="proceed_psychomotor">proceed</button>
    </form>
</div>
<div class="contentFooter"></div>
</div>  ';
}



if (isset($_POST['check_results'])) {
    echo'    <div class="contentContainer">

    <div class="contentHeader">RESULTS CHECKING FORM</div>

   
    <div class="contentBody">
        <form action="" method="POST">
            <table class="structure">
                <tr>
                    <td class="labels"> &rAarr;</td>
                    <td class="inputs">
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
                        </select> &nbsp;
                        <select name="sub_class" class="regularSelect" style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;">
                            <option value="">&#127891;class category (optional)</option>
                            <option value="SCIENCE">science</option>
                            <option value="ART">art</option>
                            <option value="COMMERCIAL">commercial</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="labels"> &rAarr;</td>
                    <td class="inputs">
                    <select name="term" class="regularSelect">
                        <option value="">&#127891; select current term</option>
                        <option>first term</option>
                        <option>second term</option>
                        <option>third term</option>
                    </select>&nbsp;
                    <select name="year" class="regularSelect" style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;">
                        <option value="">&#127891; select year</option>
                        ';
                        for ($i=2023; $i < 2041; $i++) { 
                            echo '<option>'.$i.'</option>';
                        }

                        echo '
                    </select>
                    </td>
                </tr>

            </table>

        <button class="operationButtons" name="check_availability">proceed</button>
        </form>
    </div>
    <div class="contentFooter"></div>
</div>';                 
}

if (isset($_POST["add_admin"])) {
   echo ' 
    

   <div class="contentContainer">

       <div class="contentHeader">ADMIN REGISTRATION FORM</div>

      
       <div class="contentBody">
           <form action="/add-admin" method="post">
               <table class="structure">
                   <tr>
                       <td class="labels">&rAarr;</td>
                       <td class="inputs">
                           <input type="text" name="fullname" class="regularInput" placeholder="&#9881; enter admin fullname ">
                       </td>
                   </tr>
                   <tr>
                       <td class="labels">&rAarr;</td>
                       <td class="inputs">
                           <input type="text" name="username" class="regularInput" placeholder="&#9881; enter admin username ">
                       </td>
                   </tr>
                   <tr>
                       <td class="labels"> &rAarr;</td>
                       <td class="inputs">
                           <input type="password" name="password" class="regularInput" placeholder="&#9881; enter password">
                       </td>
                   </tr>

               </table>

           <button class="operationButtons" name="save_admin">save</button>
           </form>
       </div>
       <div class="contentFooter"></div>
</div>                 
'; 
}

if (isset($_POST['save_admin'])) {
    if (empty($_POST['fullname']) && empty($_POST['username']) && empty($_POST['password'])) {

        echo '<div class="message" style="background:red;">Fields cannot be empty.</div>';
    
    }else{
        $saveAdmin = "INSERT INTO admins(full_name,username,password)VALUES
        ('$_POST[full_name]','$_POST[username]','$_POST[password]')";
        $saveAdminQuery = mysqli_query($connection, $saveAdmin);
        echo '<div class="message" style="background:green;">Admin successfully added</div>';

    }
}
?>
              

       
    


            </div>
            
    </div>
    </form>
    <script src="js/menu.js"></script>
</body>
</html>