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
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <br>
                                <button type="button" class="btn btn-dark position-relative">
                                <a href="useradmin.php" class="nav-link">Users</a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                <?php
                                include 'connection.php';
                                $sqlCommand = "SELECT * FROM users";
                                $res = $connection->query($sqlCommand);
                                $total1 = $res->num_rows;
                                echo $total1;
                                ?>                                
                                </button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-dark position-relative">
                                <a href="useradmin.php" class="nav-link">Active</a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                <?php
                                include 'connection.php';
                                $sqlCommand = "SELECT * FROM users where user_status=1;";
                                $res = $connection->query($sqlCommand);
                                $total1 = $res->num_rows;
                                echo $total1;
                                ?>                                
                                </button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-dark position-relative">
                                <a href="useradmin.php" class="nav-link">Not Active</a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                <?php
                                include 'connection.php';
                                $sqlCommand = "SELECT * FROM users where user_status=0;";
                                $res = $connection->query($sqlCommand);
                                $total1 = $res->num_rows;
                                echo $total1;
                                ?>                                
                                </button>
                                <div></div>
                                <button type="button" class="btn btn-dark position-relative mt-3 mb-3">
                                <a href="adsadmin.php" class="nav-link">Ads</a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                <?php
                                include 'connection.php';
                                $sqlCommand = "SELECT * FROM ads";
                                $res = $connection->query($sqlCommand);
                                $total2 = $res->num_rows;
                                echo $total2;
                                ?>                                
                                </button><div></div>
                                <button type="button" class="btn btn-dark position-relative">
                                <a href="caradmin.php" class="nav-link">Cars</a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                <?php
                                include 'connection.php';
                                $sqlCommand = "SELECT * FROM product";
                                $res = $connection->query($sqlCommand);
                                $total3 = $res->num_rows;
                                echo $total3;
                                ?>                                
                            </li>
                        </ol>
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
