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
        &emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>

<div class="modal">
    <div class="modalContainer">

        <div class="modalHeader">EDIT SUBJECT <span style="float: right;"><a href="" class="closeModal">&times;</a></span></div>

        <div class="modalBody">
        <form action="updateSubject.php" method="POST" id="updateForm">
            <input type="hidden" name="hidden_id" id="hidden_id">
            &#9998; subject name <br> 

            <input type="text" name="subject_name" class="modalInput" placeholder="edit subject"> <br> <br>

            <button class="modalSubmit" id="updateSubject">update</button>
        </form>
        </div>

        <div class="modalFooter"></div>
        
    </div>
</div>

        <div class="uploadspace">

            <div class="message"><%= message %></div>

            <table class="recordHolder">
                <thead>
                    <tr class="datahead">
                        <th>SN</th>
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                        <th style="width:300px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $connection = mysqli_connect("localhost","root","","sms_db");
                        $getRecords = "SELECT * FROM subjects";
                        $query = mysqli_query($connection, $getRecords);
                        $rows = mysqli_fetch_array($query);
                        $nums = mysqli_num_rows($query);
                        if ($nums > 0) {
                            $sn = 0;
                            do{
                                echo "<tr>";
                                echo "<td>".++$sn."</td>";
                                echo "<td>".$rows['id']."</td>";
                                echo "<td>".$rows['subject_name']."</td>";
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

                        
                   ?>
                  
                </tbody>
                
                <tr class="datahead">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>


        </div>

        <input type="hidden" name="flag" value="<%=flag%>" id="flag">
        <script src="js/subjectModal.js"></script>
        <script src="js/notificationHandler.js"></script>
</body>
</html>