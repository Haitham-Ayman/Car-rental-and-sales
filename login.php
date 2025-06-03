<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    margin: 5px;
    height: 500px;
    width: 500px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}

input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.label:hover{
    background-color: blue;
    color: white;
}
    </style>
</head>
<body>
    <form method="post">
    <h3 class="d-flex justify-content-center">الدخول</h1>
    <label for="username">الاسم</label>
    <input type="text" placeholder="Name" id="username" name="username" required>
    <label for="password">كلمة المرور</label>
    <input type="password" placeholder="Password" id="password" name="password" required>
    <input type="submit" name="login" value="الدخول">
    <?php
        if(isset($_POST['login']) && !empty($_POST['login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            include 'connection.php';
            $sqlCommand = "SELECT * FROM users WHERE username='$username' AND user_password ='$password' AND user_status=1;";
            $res = $connection->query($sqlCommand);
            if($res->num_rows>0){
                $row = $res->fetch_assoc();
                if($row['username']=="admin"){
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['loginadmin']=1;
                    header("Location:index.php");
                }
                else{
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['name']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['login']=1;
                    header("Location: main.php");
                }
            }
            else{
                echo "<h4 class='d-flex justify-content-center'>لا يوجد لديك حساب أو أن حسابك غير مفعل</h4>";
            }
        }
    ?>
    <br><div><a href="signup.php" class="d-flex justify-content-center link-underline-info">التسجيل</a href="signup.php"></div>
    </form>
</body>
</html>