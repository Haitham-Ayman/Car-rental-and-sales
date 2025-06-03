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
                    <form method="post">
                        <input type="submit" class="btn btn-primary" name="image" value="اضافة سيارة">
                        <?php
                        if(isset($_POST['image']))
                            header("Location:insertcar.php");
                        ?>
                    </form>
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
            <br>
            <div class="d-flex justify-content-md-center bg-success text-light p-2">سياراتي</div>
                                <table class="table table-striped">
                                <tr align="center" bgcolor="yellow">
                                    <td>Car Number</td>
                                    <td>Car</td>
                                    <td>Car view</td>
                                    <td>Car Model</td>
                                    <td>Car Year</td>
                                    <td>Car Color</td>
                                    <td>Feul Type</td>
                                    <td>Car Accessories</td>
                                    <td>Car Price</td>
                                    <td>Engine Size</td>
                                    <td>Transmission Type</td>
                                    <td>Car City</td>
                                </tr>

                            <?php
                            include 'connection.php';
                            $sqlCommand = "SELECT * FROM product where car_status=1 AND user_id={$_SESSION['userid']}";
                            $res = $connection->query($sqlCommand);
                            if($res->num_rows>0){
                            while ($row = $res->fetch_assoc()) {
                            ?>                                
                            <tr align="center">
                                <td>
                                <form method="POST">
                                    <input type="hidden" name="car_id2" value="<?php echo $row['car_id']; ?>">
                                    <input type="submit" name="want" value="بيع"  class="btn btn-sm btn-danger">
                                    <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
                                    <input type="submit" name="delete" value="حذف"  class="btn btn-sm btn-danger">
                                </form>                                 
                                </td>
                                <td><?php echo $row['car']; ?></td>
                                <td><?php echo $row['car_view']; ?></td>
                                <td><?php echo $row['car_model']; ?></td>
                                <td><?php echo $row['car_year']; ?></td>
                                <td><?php echo $row['car_color']; ?></td>
                                <td><?php echo $row['feul_type']; ?></td>
                                <td><?php echo $row['car_accessories']; ?></td>
                                <td><?php echo $row['car_price']; ?></td>
                                <td><?php echo $row['engine_size']; ?></td>
                                <td><?php echo $row['transmission_type']; ?></td>
                                <td><?php echo $row['car_city']; ?></td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                            </table>
                            <?php 
                            if(isset($_POST['delete']) && !empty($_POST['delete']))
                            {
                                $info_id = $_POST['car_id'];
                                include 'connection.php';
                                $sql = "UPDATE product SET car_status = '0' WHERE car_id = $info_id;";
                                if($connection->query($sql)==TRUE){
                                header("Refresh:2");
                                }//end if (connection)
                                else{
                                echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                                }
                            }//end if (isset)
                            if(isset($_POST['want']) && !empty($_POST['want']))
                            {
                                $info_id = $_POST['car_id2'];
                                include 'connection.php';
                                $sql = "UPDATE product SET car_status = '2' WHERE car_id = $info_id;";
                                if($connection->query($sql)==TRUE){
                                header("Refresh:2");
                                }//end if (connection)
                                else{
                                echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                                }
                            }//end if (isset)
                            ?></div><br><br>
            </div>
        </form>
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>