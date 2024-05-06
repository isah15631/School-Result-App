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
        <a href="admin.php">&#128682; back</a></span>
    </div>



        <div class="uploadspace">


            <div class="message" style="display:block;background:green;">   update successful</div>
            <table class="recordHolder">
                <thead>
                    <tr class="datahead">
                        <th style="width:50px ;">SN</th>
                        <th style="width: 500px;">Student Name</th>
                        <th style="width: 150px;">Reg No</th>
                        <th style="width: 100px;">Previous Class</th>
                        <th style="width: 100px;">Promoted Class</th>
                        <th style="width: 100px;">Section</th>
                        <th style="width: 100px;">Set</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $connection = mysqli_connect("localhost","root","","sms_db");
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
                                echo "<td>".$rows['student_class']."</td>";
                                echo "<td>".$rows['sub_class']."</td>";
                                echo "<td>".$rows['dt']."</td>";
                                echo '
                                
                                <td class="actions">
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
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>
        </div>
        

</body>
</html>