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
            <a href="carspage.php" class="btn btn-primary">رجوع</a>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-6">
            
        </div>
        </div> 
        <br>
        <div>
        <?php
        include 'connection.php';
        
        $sqlCommand = "SELECT * FROM product where car_status=1 AND car_id='{$_SESSION['view']}';";
        $res = $connection->query($sqlCommand);
        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){
                $user = "SELECT * FROM users where user_id='{$row['user_id']}';";
                $done=$connection->query($user);
                while($row2= $done->fetch_assoc()){
                    $username=$row2['username'];
                    $email=$row2['email'];
                    $phone=$row2['phone'];
                }
        ?>
        <div class="row border p-3 rounded bg-dark">
            <div class="col-md-6">
                <img src="<?php echo $row['car_photo'] ?>" class="card-img img-fluid rounded border" alt="">
            </div>
            <div class="col-md-6 text-light">
                <div class="d-flex justify-content-center"><?php echo $row['car']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Model:&nbsp;</span><?php echo $row['car_model']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Year:&nbsp;</span><?php echo $row['car_year']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Color:&nbsp;</span><?php echo $row['car_color']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Feul Type:&nbsp;</span><?php echo $row['feul_type']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Price:&nbsp;</span><?php echo $row['car_price']." $"; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Engine Size:&nbsp;</span><?php echo $row['engine_size']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">City:&nbsp;</span><?php echo $row['car_city']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Transmission Type:&nbsp;</span><?php echo $row['transmission_type']; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Accessories:&nbsp;</span><?php echo $row['car_accessories']; ?></div><br>
                <div class="d-flex justify-content-center"><span class="text-info">Person Name:&nbsp;</span><?php echo $username; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Email:&nbsp;</span><?php echo $email; ?></div>
                <div class="d-flex justify-content-center"><span class="text-info">Phone:&nbsp;</span><?php echo $phone; ?></div>
            </div>
        </div>
        <?php
        }
        }
        ?>
        </div>
    </form><br>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>