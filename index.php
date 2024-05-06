<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            outline: none;
            font-family: arial;
            box-sizing: border-box;
        }

        .container{
            width: 50%;
            margin: 100px auto;
            position: relative;
            box-shadow: 2px 2px 25px 5px black;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: green;
        }
        .header{
            padding: 15px;
            background-color:green;
            color: white;
            font-weight: bold;
            padding-left: 20px;
        }
        input{
            padding: 10px;
            width: 90%;
            margin: 20px;
            border-radius: 10px;
            border: 2px solid black;
            font-size: 18px;
            transition: all .5s;
            padding-left: 20px;
        }
        input:hover{
            border: 2px solid green;
        }
        .mainBody{
            padding: 50px;
            background-color: rgba(0,0,0,.5);
        }


        button{
            padding: 7px;
            width: 100px;
            border: 1px solid black;
            font-size: 18px;
            margin: 10px 20px;
            background-color:green;
            color: white;
            border-bottom-left-radius: 20px;
            border-top-right-radius: 20px;
            transition: all .5s;
        }
        button:hover{
            width: 150px;
            border-bottom-left-radius: 0px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            text-align: right;
            padding-right: 20px;
        }
        .footer{
            padding: 20px;
            background-color: green;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .loginBall{
            padding: 20px;
            background-color: green;
            width: 150px;
            margin: auto;
            height: 150px;
            border-radius: 100%;
        }
.message{
    padding: 12px;
    width: 50%;
    margin: 20px auto;
    z-index: 1;
    box-shadow: 3px 3px 20px 10px black;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    float: right;
    padding-left: 20px;
    position: relative;
    font-size: 17px;
    font-weight: light;
    animation-name: message;
    animation-duration: .5s;
    animation-fill-mode: forwards;
    animation-direction: alternate;
    display: block;
    color: white;
    background:red;
}

@keyframes message {
    0%{left:400px}
    50%{left: 0px;}
    100%{left: 400px;}
}
h1{
    background-color: green;
    padding: 10px;
    color: white;
}
    </style>
</head>
<body>

    
    <?php
    
        $connection = mysqli_connect("localhost","root","","sms_db");
        if (!$connection) {
            echo "There's a problem with the database connection!";
        }

        if (isset($_POST['login'])) {
            
        
        $check = "SELECT * FROM admins WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $query =  mysqli_query($connection,$check);
        $nums = mysqli_num_rows($query);
        if ($nums > 0) {
            header("location:admin.php");
        }else{
            echo '<div class="message">Invalid login credentials</div>';
        }
        }
    ?>
    <h1>Arewa Success School</h1>
    <div class="container">
        <div class="header">ADMIN LOGIN</div>
        <div class="mainBody">
            <form action="" method="POST">
        <input type="text" placeholder="&#9881; username" name="username">
        <input type="password" placeholder="&#9881; password" name="password">
        <button name="login">login</button>
    </form>
        </div>
        <div class="footer"></div>
    </div>

<script src="js/login.js"></script>

</body>
</html>