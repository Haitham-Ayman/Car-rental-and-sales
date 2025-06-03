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
    <style>
        img{
            max-height: 150px;
        }
    </style>
</head>
<body class="bg-info">
    <?php include 'header.php'?>
    <div class="container p-2">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                <form method="post">
                        <input type="submit" class="btn btn-primary" name="image" value="اضافة سيارة">
                        <?php
                        if(isset($_POST['image']))
                            header("Location:insertcar.php");
                        ?>
                    </form>
                </div>
                <div class="col-md-2">
                    <form method="post" class="row d-flex justify-content-center">
                        <div class="col-md-6 w-50">
                        <select name="sel" class="form-select">
                            <option selected value="all">All</option>
                            <option value="color">Color</option>
                            <option value="price">Price</option>
                            <option value="name">Name</option>
                            <option value="year">Year</option>
                        </select>    
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control">
                        </div>
                    </form>
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
        <br><div>
            <div class="row">
            <?php
            include 'connection.php';
            if($_POST['sel']=='color')
                $cmd="SELECT * FROM product WHERE car_status=1 AND car_color LIKE'%{$_POST['search']}%';";
            else if($_POST['sel']=='price')
                $cmd="SELECT * FROM product WHERE car_status=1 AND car_price='{$_POST['search']}';";
            else if($_POST['sel']=='name')
                $cmd="SELECT * FROM product WHERE car_status=1 AND car_model LIKE'%{$_POST['search']}%';";
            else if($_POST['sel']=='year')
                $cmd="SELECT * FROM product WHERE car_status=1 AND car_year='{$_POST['search']}';";
            else 
                $cmd="SELECT * FROM product WHERE car_status=1 AND (car_color LIKE'%{$_POST['search']}%' OR car_price='{$_POST['search']}' OR car_model LIKE'%{$_POST['search']}%' OR car_year='{$_POST['search']}');";
            $reslut=$connection->query($cmd);
            if($reslut->num_rows>0){
                while($row2=$reslut->fetch_assoc()){
            ?>
            <div class="p-3 col-md-4">    
                <form method="post">
                <div class="shadow-sm p-3 mb-5 border rounded bg-primary text-light m-4 p-2 card">
                <?php echo "<div><img src='{$row2['car_photo']}' height='100%' width='50%' class='card-img-top rounded border'></div>" ?>
                <div class="card-body">
                    <div class="d-flex justify-content-center"><?php echo $row2['car']; ?></div>
                    <div class="d-flex justify-content-center">Model: <?php echo $row2['car_model']; ?></div>
                    <div class="d-flex justify-content-center">Year: <?php echo $row2['car_year']; ?></div>
                    <div class="d-flex justify-content-center">Color: <?php echo $row2['car_color']; ?></div>
                    <div class="d-flex justify-content-center">Price: <?php echo $row2['car_price']; ?></div>
                </div>
                <div class="d-grid gap-2">
                <input type="hidden" name="car" value="<?php echo $row2['car_id'];?>">
                <input type="submit" class="btn btn-warning" name="show" value="عرض">
                </div>
                </form>
                </div>
                <?php
                if(isset($_POST['show'])&&!empty($_POST['show'])){
                    $_SESSION['view']=$_POST['car_id'];
                    $update = "UPDATE product SET car_view={$row2['car_view']}+1 WHERE car_id = {$_POST['car']};";
                    if($connection->query($update)==TRUE){
                        header("Location:view.php");
                    }//end if (connection)
                    else{
                        echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                    }
                }
                ?>      
            </div>
            <?php
            }
            }
            ?><br>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>