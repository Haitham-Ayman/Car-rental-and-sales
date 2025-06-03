<form method="post">
    <div class="row d-flex justify-content-between bg-dark text-light text-center p-2">
            <div class="col-md-4">
                <span class="text-light"><span class="text-info">Email: </span><?php echo $_SESSION['email'];?></span>
            </div>
            <div class="col-md-4">
                <span class="text-light"><a class="btn btn-info btn-sm" href="file.php"><?php echo $_SESSION['name'];?></a></span>
            </div>
            <div class="col-md-4">
                <input type="submit" name="out" class="btn btn-sm btn-outline-danger border-0 text-light" value="تسجيل خروج">
            </div>
    </div>
    <?php 
        if(isset($_POST['out'])){
            $_SESSION['login']=0;
            session_destroy();
            header("Location:login.php");
        }
    ?>
</form>
