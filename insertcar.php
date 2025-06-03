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
    <div class="row">
        <div class="col-md-4">
            <a href="main.php" class="btn btn-primary">رجوع</a>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-6">
            
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
        ?><br>
    </form><br>
    <form method="post" class="form-group text-light" enctype="multipart/form-data">
    <label for="car">Car :</label>
    <!-- <input type="radio" id="car" name="car" value="0" required> Used
    <input type="radio" id="car" name="car" value="1"> New<br><br> -->
    <select name="car" id="car" class="form-select w-25">
        <option selected value="New">New</option>
        <option value="Used">Used</option>
    </select><br>
    <label for="carmodel">Car Model :</label>
    <input type="text" id="carmodel" name="carmodel" class="form-control w-50" required><br>
    <label for="caryear">Car Year :</label>
    <input type="text" id="caryear" name="caryear" class="form-control w-50" required><br>
    <label for="carcolor">Car Color:</label>
    <input type="text" id="carcolor" name="carcolor" class="form-control w-50" required><br>
    <label for="feultype">Feul Type :</label>
    <input type="text" id="feultype" name="feultype" class="form-control w-50" required><br>
    <label for="caraccessories">Car Accessories :</label>
    <textarea type="text" id="caraccessories" name="caraccessories" class="form-control w-50"></textarea><br>
    <label for="carprice">Car Price :</label>
    <input type="text" id="carprice" name="carprice" class="form-control w-50" required><br>
    <label for="enginesize">Engine Size :</label>
    <input type="text" id="enginesize" name="enginesize" class="form-control w-50" required><br>
    <label for="transmissiontype">Transmission Type :</label>
    <select name="transmissiontype" id="transmissiontype" class="form-select w-25">
        <option selected value="Automatic">Automatic</option>
        <option value="Manual">Manual</option>
    </select><br>
    <label for="carcity">Car City :</label>
    <input type="text" id="carcity" name="carcity" class="form-control w-50" required><br>
    <input type="file" name="uploadfile" class="form-control w-25" required><br>
    <input type="submit" name="submit" class="btn btn-success w-50" value="ارسال">
    </form>
    <?php
    //if(isset($_POST['submit']) && !empty($_POST['submit'])&&!empty($_POST['carmodel'])&&!empty($_POST['caryear'])&&!empty($_POST['carcolor'])&&!empty($_POST['feultype'])&&!empty($_POST['carprice'])&&!empty($_POST['enginesize'])&&!empty($_POST['carcity']))
    if(isset($_POST['submit']) && !empty($_POST['submit'])){       
        $folder = "image/";
        $target_file=$folder.basename($_FILES['uploadfile']['name']);
        $fileext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $done = 1;
        if($fileext!="png" ){
            echo "Error, Only PNG file";
            $done=0;
        }
        if($done==1) {
            move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file);
            include 'connection.php';
            $sql = "INSERT INTO product (car_id, user_id, car, car_view, car_model, car_year, car_color, feul_type, car_accessories, car_price, engine_size, transmission_type, car_city, car_photo, car_status) VALUES (NULL, '{$_SESSION['userid']}', '{$_POST['car']}', '0', '{$_POST['carmodel']}', '{$_POST['caryear']}', '{$_POST['carcolor']}', '{$_POST['feultype']}', '{$_POST['caraccessories']}', '{$_POST['carprice']}', '{$_POST['enginesize']}', '{$_POST['transmissiontype']}', '{$_POST['carcity']}', '$target_file', '0');";
            //$sql="INSERT INTO product (car_id, user_id, car, car_view, car_model, car_year, car_color, feul_type, car_accessories, car_price, engine_size, transmission_type, car_city, car_photo, car_status) VALUES (NULL, '2', '1', 'Used', 'BMW', '2007', 'white', 'desiel', NULL, '100000', '1000', '0', 'seir', 'image/8.jpg', '0');";
            if($connection->query($sql)==TRUE){
            header("Location:main.php");
            }//end if (connection)
            else{
            echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
            }
        }
    }
    else{
        echo "<div class='text'>يجب إدخال جميع البيانات وانتظار موافقة المسؤول</div><br/>";
    }
    ?>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>