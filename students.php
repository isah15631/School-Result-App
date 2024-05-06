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
    
    <div class="modal">
        <div class="modalContainer">
    
            <div class="modalHeader">EDIT STUDENT DETAILS <span style="float: right;"><a href="" class="closeModal">&times;</a></span></div>
    
            <div class="modalBody">
                <form action="updateStudent.php" method="POST" id="updateForm">
                <input type="hidden" name="reg_no" id="hidden_id">
                &#9998; full name <br> 
    
                <input type="text" name="student_name" class="modalInput" placeholder=" "> <br> <br>
                &#9998; class <br> 
    
                <input type="text" name="student_class" class="modalInput" placeholder=" "> <br> <br>
                &#9998; sub class (optional) <br> 
    
                <input type="text" name="sub_class" class="modalInput" placeholder=" "> <br> <br>
                &#9998; set <br> 
    
                <input type="text" name="year_enrolled" class="modalInput" placeholder=" "> <br> <br>
    
                <button class="modalSubmit" id="updateButton">update</button>
            </form>
            </div>
    
            <div class="modalFooter"></div>
            
        </div>
    </div>
    <div class="header">DASHBOARD <span style="float: right;">
        <a href="admin.php">&#128682; back</a></span>
    </div>



    <div class="uploadForm">
        <form action="" method="POST">
            <input type="text" name="reg_no" placeholder="&#127891; search by reg no" class="search">



            <select name="year_enrolled" class="regularSelect" id="year">
                <?php
                    for ($i = 2023; $i < 2031; $i++) {
                        echo "<option>".$i."</option>";
                    }
                ?>
                
            </select>

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

            <select name="sub_class" class="regularSelect" >
                <option value="">&#127891; class category (optional)</option>
                <option value="SCIENCE">science</option>
                <option value="ART">art</option>
                <option value="COMMERCIAL">commercial</option>
            </select>&nbsp;
            <button class="upload" name="search">&#128269; search</button> &nbsp;
            <button class="promote">&rAarr; promote</button>
            </form>
        </div>
                
        <div class="uploadspace">


            <div class="message"><%=message%></div>
            <table class="recordHolder">
                <thead>
                    <tr class="datahead">
                        <th style="width:50px ;">SN</th>
                        <th style="width: 500px;">Student Name</th>
                        <th style="width: 150px;">Reg No</th>
                        <th style="width: 100px;">Class</th>
                        <th style="width: 100px;">Sub Class</th>
                        <th style="width: 100px;">Set</th>
                        <th style="width: 400px;">Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $connection = mysqli_connect("localhost","root","","sms_db");

                if(isset($_POST["search"])) {
                    
                    $filter = "SELECT *
                    FROM students
                    WHERE regno LIKE '%$_POST[reg_no]%'
                       AND student_class LIKE '%$_POST[student_class]%' AND sub_class LIKE '%$_POST[sub_class]%'
                       AND dt LIKE '%$_POST[year_enrolled]%'";
                    $filterQuery = mysqli_query($connection, $filter);
                    $results = mysqli_fetch_array($filterQuery);
                    $resultCount = mysqli_num_rows($filterQuery);
                    if ($resultCount > 0) {
                        $sn = 0;
                        do{
                            echo "<tr>";
                            echo "<td>".++$sn."</td>";
                            echo "<td>".$results['full_name']."</td>";
                            echo "<td>".$results['regno']."</td>";
                            echo "<td style='text-tranform:uppercase;'>".$results['student_class']."</td>";
                            echo "<td>".$results['sub_class']."</td>";
                            echo "<td>".$results['dt']."</td>";
                            echo '
                            
                            <td class="actions">
                            <button class="del">&times; delete</button>&ensp;
                            <button class="edit">&#9998; edit</button>&ensp;
                            </td>
                            </tr>';
                        }while($results = mysqli_fetch_array($filterQuery));
                    }else{

                        echo "<tr>";
                        echo "<td colspan='10' style='padding:20px;text-align:center;font-size:30px;'>NO DATA</td>";
                        echo "</tr>";
                    }
                }else{
                    $getRecords = "SELECT * FROM students";
                    $query = mysqli_query($connection, $getRecords);
                    $rows = mysqli_fetch_array($query);
                    $nums = mysqli_num_rows($query);
                    if ($nums > 0) {
                        $sn = 0;
                        do{
                            echo "<tr>";
                            echo "<td>".++$sn."</td>";
                            echo "<td>".$rows['full_name']."</td>";
                            echo "<td>".$rows['regno']."</td>";
                            echo "<td style='text-tranform:uppercase;'>".$rows['student_class']."</td>";
                            echo "<td>".$rows['sub_class']."</td>";
                            echo "<td>".$rows['dt']."</td>";
                            echo '
                            
                            <td class="actions">
                            <button class="del">&times; delete</button>&ensp;
                            <button class="edit">&#9998; edit</button>&ensp;
                            </td>
                            </tr>';
                        }while($rows = mysqli_fetch_array($query));
                    } else {
                        echo "<tr>";
                        echo "<td colspan='10' style='padding:20px;text-align:center;font-size:30px;'>NO DATA</td>";
                        echo "</tr>";
                    }
                }


                   


                        
                   ?>
                </tbody>
                
                <tr class="datahead">
                    <th colspan="10" class="totalContainer"></th>
                </tr>
            </table>
        </div>
        
    <input type="hidden" name="flag" value="<%=flag%>" id="flag">


    <form action="promoteStudents.php" method="POST" id="promotion_form">
        
    <input type="hidden" name="promotion_list" id="promotion_list">
    <input type="hidden" name="promotion_class" id="promotion_class">
    
    </form>

    <script src="js/modal.js"></script>
    <script src="js/notificationHandler.js"></script>
</body>
</html>