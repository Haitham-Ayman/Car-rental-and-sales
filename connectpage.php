<?php session_start(); 
if(empty($_SESSION['login'])||$_SESSION['login']==0)
    header("Location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cars page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info">
    <?php include 'header.php'?>
    <div class="container p-2">
        <form method="post">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <?php include 'list.php'; ?>
                </div>
            </div>        
            <?php 
            if(isset($_POST['carpage']))
               header("Location:carspage.php"); 
            else if(isset($_POST['aboutpage']))
                header("Location:aboutpage.php");
            else if(isset($_POST['connectpage']))
                header("Location:connectpage.php");
            else if(isset($_POST['mainpage']))
                header("Location:main.php");
            ?>
        </form>
        <div class="p-2 d-flex justify-content-center">
            <div class="border w-50 bg-primary text-light p-2 border border-warning rounded row">
                <?php
                include 'connection.php';
                $sqlCommand = "SELECT * FROM users WHERE username='admin';";
                $res = $connection->query($sqlCommand);
                if($res->num_rows>0){
                    $row = $res->fetch_assoc();
                    $_SESSION['adminemail']=$row['email'];
                    $_SESSION['adminphone']=$row['phone'];
                }
                ?>
                <div class="col-md-6"><span class="text-info">البريد الأكتروني: </span><?php echo"{$_SESSION['adminemail']}"; ?></div>
                <div class="col-md-6"><span class="text-info">رقم الهاتف : </span><?php echo"{$_SESSION['adminphone']}"; ?></div>
                <div>
                    <form method="post">
                    <br><input type="submit" class="btn btn-success p-2 border w-100" name="ad" value="ارسال إعلان"><br>
                    <?php
                        if(isset($_POST['ad'])){
                            include 'ad.php';
                        }
                    ?><br>
                </form>
                <?php
                    if(isset($_POST['send']) && !empty($_POST['send']))
                    {
                        if($_POST['text']!=""){
                            $info_id = $_POST['text'];
                            $user=$_SESSION['userid'];
                            include 'connection.php';
                            $sql = "INSERT INTO ads (ads_id, user_id, ads, ads_status) VALUES (NULL, '$user', '$info_id', '0');";
                            if($connection->query($sql)==TRUE){
                            header("Refresh:0");
                            }//end if (connection)
                            else{
                            echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                            }
                        }
                    }//end if (isset)
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>