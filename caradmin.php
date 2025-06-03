<?php session_start(); 
if(empty($_SESSION['loginadmin'])||$_SESSION['loginadmin']==0)
    header("Location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <form method="post">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <input type="submit" class="btn btn-danger border-0 w-100" value="خروج" name="log">                
            </ul>
            <?php 
                if(isset($_POST['log'])){
                    $_SESSION['login']=0;
                    session_destroy();
                    header("Location:login.php");
                }
            ?>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="useradmin.php">
                                <div class="sb-nav-link-icon"></div>
                                Users
                            </a>
                            <a class="nav-link" href="adsadmin.php">
                                <div class="sb-nav-link-icon"></div>
                                Ads
                            </a>
                            <a class="nav-link" href="caradmin.php">
                                <div class="sb-nav-link-icon"></div>
                                Cars
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                                <br>
                                <div class="d-flex justify-content-md-center bg-success text-light p-2">موجودة</div>
                                <table class="table table-striped">
                                <tr align="center" bgcolor="yellow">
                                    <td>Car ID</td>
                                    <td>User ID</td>
                                    <td>Car Name</td>
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
                                    <td>Car Photo</td>
                                </tr>

                            <?php
                            include 'connection.php';
                            $sqlCommand = "SELECT * FROM product where car_status=1;";
                            $res = $connection->query($sqlCommand);
                            if($res->num_rows>0){
                            while ($row = $res->fetch_assoc()) {
                            ?>                                
                            <tr align="center">
                                <td>
                                <form method="POST">
                                    <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
                                    <input type="submit" name="delete" value="حذف"  class="btn btn-sm btn-danger">
                                </form>                                 
                                </td>
                                <td><?php echo $row['user_id']; ?></td>
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
                                <td><?php echo $row['car_photo']; ?></td>
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
                                header("Refresh:0");
                                }//end if (connection)
                                else{
                                echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                                }
                            }//end if (isset)
                            ?>
                            <div></div>
                            <br>
                                <div class="d-flex justify-content-md-center bg-warning text-light p-2 ">غير ظاهرة</div>
                                <table class="table table-striped w-100">
                                <tr align="center" bgcolor="yellow">
                                <td>Car ID</td>
                                    <td>User ID</td>
                                    <td>Car Name</td>
                                    <td>Car view</td>
                                    <td>Car Model</td>
                                    <td>Car Year</td>
                                    <td>Car Color</td>
                                    <td>Feul Type</td>
                                    <td>Car Accessories</td>
                                    <td>User Price</td>
                                    <td>Engine Size</td>
                                    <td>Transmission Type</td>
                                    <td>User City</td>
                                    <td>User Photo</td>
                                </tr>

                            <?php
                            include 'connection.php';
                            $sqlCommand = "SELECT * FROM product where car_status=0;";
                            $res = $connection->query($sqlCommand);
                            if($res->num_rows>0){
                            while ($row = $res->fetch_assoc()) {
                            ?>                                
                            <tr align="center">
                                <td>
                                <form method="POST">
                                <input type="hidden" name="info_id" value="<?php echo $row['car_id']; ?>">
                                <input type="submit" name="update" value="استعادة"  class="btn btn-sm btn-success">
                                </form>                               
                                </td>
                                <td><?php echo $row['user_id']; ?></td>
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
                                <td><?php echo $row['car_photo']; ?></td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                            </table>
                            <?php 
                            if(isset($_POST['update']) && !empty($_POST['update']))
                            {
                                $info_id = $_POST['info_id'];
                                include 'connection.php';
                                $sql = "UPDATE product SET car_status = 1 WHERE car_id = $info_id;";
                                if($connection->query($sql)==TRUE){
                                header("Refresh:0");
                                }//end if (connection)
                                else{
                                echo "<div class='text'>حدث خطأ أثناء الاضافة:   </div>".$connection->connect_error."<br/>";
                                }
                            }//end if (isset)
                            ?>
                            <div></div>
                            <br>
                                <div class="d-flex justify-content-md-center bg-danger text-light p-2 ">تم بيعها</div>
                                <table class="table table-striped w-100">
                                <tr align="center" bgcolor="yellow">
                                <td>Car ID</td>
                                    <td>User ID</td>
                                    <td>Car Name</td>
                                    <td>Car view</td>
                                    <td>Car Model</td>
                                    <td>Car Year</td>
                                    <td>Car Color</td>
                                    <td>Feul Type</td>
                                    <td>Car Accessories</td>
                                    <td>User Price</td>
                                    <td>Engine Size</td>
                                    <td>Transmission Type</td>
                                    <td>User City</td>
                                    <td>User Photo</td>
                                </tr>

                            <?php
                            include 'connection.php';
                            $sqlCommand = "SELECT * FROM product where car_status=2;";
                            $res = $connection->query($sqlCommand);
                            if($res->num_rows>0){
                            while ($row = $res->fetch_assoc()) {
                            ?>                                
                            <tr align="center">
                                <td><?php echo $row['car_id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
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
                                <td><?php echo $row['car_photo']; ?></td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                            </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
