<?php session_start(); 
//if(empty($_SESSION['login'])||$_SESSION['login']==0)
//    header("Location:login.php");
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cars page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info">
    <div class="container p-2">
    <form method="post" class="form-group text-light">
    <label for="car">Car :</label>
    <!-- <input type="radio" id="car" name="car" value="0" required> Used
    <input type="radio" id="car" name="car" value="1"> New<br><br> -->
    <select name="car" id="car" class="form-control w-25">
        <option value="New">New</option>
        <option value="Used">Used</option>
    </select><br>
    <label for="transmissiontype">Transmission Type :</label>
    <select name="transmissiontype" id="transmissiontype" class="form-control w-25">
        <option value="Automatic">Automatic</option>
        <option value="Manual">Manual</option>
    </select><br>
    
    <!-- <label for="carcity">Car City :</label>
    <input type="text" id="carcity" name="carcity" class="form-control w-50" required><br>
    <form method="POST" enctype="multipart/form-data">
	<input type="file" name="uploadfile" class="form-control w-25" required>
    </form> -->
    <input type="submit" name="submit" class="btn btn-success w-50" value="ارسال">
    </form>
    <?php
    // if(isset($_POST['car']))
    //     echo $_POST['car']."<br>";
    // if(isset($_POST['transmissiontype']))
    //     echo $_POST['transmissiontype'];
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        echo $_POST['car']."<br>";
        echo $_POST['transmissiontype'];
    // $folder = "image/";
    // $target_file=$folder.basename($_FILES['uploadfile']['name']);
    // $fileext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // $target_file_final=$folder.basename($_FILES['uploadfile']['name']);
    // $done = 1;
    // if(file_exists($target_file))
    // {
    //     echo "Error, File is already exist.";
    //     $done=0;
    // }
    // if($_FILES['uploadfile']['size']>1000000000) // Byte
    // {
    // echo "Error, Large Size";
    //     $done=0;	
    // }
    // if($fileext!="png" ){
    //     echo "Error, Only PNG file";
    //     $done=0;
    // }
    // if($done==1) 
    //     move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file_final);
    // }
    // include 'connection.php';
    // $sql = "INSERT INTO product (product_number, product_name, sal, store) VALUES (NULL, '{$_POST['transmissiontype']}', '{$_POST['car']}', '2341');";
    // if($connection->query($sql)==TRUE){
    // header("Refresh:0");
    // }//end if (connection)
    // else{
    // echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
    // }
    }
    ?>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>