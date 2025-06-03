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
    </div>
    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>