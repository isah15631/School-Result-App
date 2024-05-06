<?php

$dt = date("d-m-Y");
$connection = mysqli_connect("localhost","root","","sms_db");
if (!$connection) {
    echo "There's a problem with the database connection!";
}

$getRecords = "SELECT * FROM admins";
$query = mysqli_query($connection, $getRecords);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admins.css">
</head>
<body>
    <div class="header">DASHBOARD <span style="float: right;">
        &emsp;&emsp;&emsp;&emsp;<a href="admin.php">&#128682; back</a></span>
    </div>

<div class="modal">
    <div class="modalContainer">

        <div class="modalHeader">EDIT ADMIN DETAILS <span style="float: right;"><a href="" class="closeModal">&times;</a></span></div>

        <div class="modalBody">

            &#9998; full name <br> 

            <form action="" method="POST" id="updateForm">
                
            <input type="text" name="fullname" class="modalInput" placeholder=" isah sulaiman"> <br> <br>

            &#9998; username <br> 

            <input type="text" name="username" class="modalInput" placeholder=" isah sulaiman"> <br> <br>

            &#9998; password <br> 

            <input type="text" name="password" class="modalInput" placeholder=" isah sulaiman"> <br> <br>

            <input type="hidden" name="id" class="modalInput">
            <button class="modalSubmit" id="updateButton" name="update">update</button>
            </form>

        </div>

        <div class="modalFooter"></div>
        
    </div>
</div>


          <?php
          
                if(isset($_POST["update"])) {
                    $update = "UPDATE admins SET full_name='$_POST[fullname]',username='$_POST[username]',
                    password='$_POST[password]'";
                    $updateQuery = mysqli_query($connection, $update);
                    echo '<div class="message" style="background:green;">Update was successful</div>';
                    
    echo "<script type='text/javascript'> setTimeout(()=>{window.location.href='admins.php'},1500) </script>";
                }
          ?>
       

        <div class="uploadspace">


<input type="hidden" name="hidden_id" id="hidden_id">
            <table>
                <thead>
                    <tr class="datahead">
                        <th>SN</th>
                        <th>User_ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nums = mysqli_num_rows($query);
                        if ($nums > 0) {
                            $rows = mysqli_fetch_array($query);
                            $sn=0;
                            do{
                                echo "<tr>";

                                echo '<td style="width: 5%;">'.++$sn.'</td>';
                                echo '<td>'.$rows['id'].'</td>';
                                echo '<td>'.$rows['full_name'].'</td>';
                                echo '<td>'.$rows['username'].'</td>';
                                echo '<td>'.$rows['password'].'</td>';
                                echo '<td class="actions">
                                    <button class="del">&times; delete</button>&ensp;
                                    <button class="edit">&#9998; edit</button>&ensp;
                                    
                                </td>';
                                echo "</tr>";
                            }while($rows = mysqli_fetch_array($query));
                        }else{

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
                </tr>
            </table>


        </div>

        <script src="js/adminmodal.js"></script>
</body>
</html>