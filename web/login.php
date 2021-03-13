<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../materialize/css/materialize.css"> -->
    <link rel="stylesheet" href="../bootstrap-4/css/bootstrap.css">
    <link rel="icon" href="../webimg/index.jpg">
    <link href='styles/main.css' rel='stylesheet' />
    <link href='../slick.css' rel='stylesheet' />
    <link rel="stylesheet" href="../AOS/aos-master/aos-master/dist/aos.css">
    <link href='../slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="styles/custom.css">
    <title>Peace Mass Login Page</title>
</head>
<style>
    .form-control:focus {
        border:1px;
        border-color: rgb(255, 94, 0);
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 162, 100, 0.5);
    }
    .form_card{
        background:#f7f7f7;
        box-shadow: 9px 2px 22px;
        border-color: rgb(255, 94, 0);
        border-radius:50px 0px 50px 0px;max-width:400px
    }
    .btn-peace{
        background-color:#2b2d60d7;
        color:white;
    }
    .btn-peace:hover {
        color:white;
        background-color:#2b2d60 ;
    }
    .btn-peace:focus {
        border-color: rgb(255, 94, 0);
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 162, 100, 0.5);
    }
    @media only screen and (max-width: 600px) {
        .hide-on-small-and-down {
            display: none !important;
        }
    }
    @media only screen and (min-width: 993px) {
        .hide-on-large-only {
            display: none !important;
        }
    }
    @media only screen and (max-width: 600px) {
        .show-on-small {
            display: block !important;
        }
    }
</style>
<body id="dd" style="overflow: hidden;">
    <div class="row" style="height:100vh;background-image: url(../webimg/sf-bus.webp);background-repeat:no-repeat;background-size: cover;background-position:center">
        <div class="col-md-7 hide-on-small-and-down">

        </div>
        <div class="col-md-5" style="background: rgba(245, 245, 245, 0.407);display:flex;justify-content:center;align-items:center;">
            <?php
                session_start();
                include_once '../connection.php';
                $locate='';
                if(isset($_POST['login'])){
                    $user=$_POST['user'];
                    $password=$_POST['pass'];
                    $query= mysqli_query($pcon,"SELECT * FROM usersinfo WHERE (userId='$user' OR firstname='$user') AND passoword='$password'");
                    $nrows=mysqli_num_rows($query);
                    if($nrows==1){
                        $data=mysqli_fetch_assoc($query);
                        $_SESSION['username'] = $data['userId'];
                        $_SESSION['userType'] = $data['acctType'];
                        header('location:../');
                    }
                }
            ?>
            <form method="post">
                <div class="form_card card p-3 z-depth-5" data-aos-duration="2000" data-aos="zoom-out">
                    <input type="hidden" name="locate" value="<?php echo $locate ?>">
                    <img class="mb-2" src="../webimg/index.jpg" style="height:90px;width:90px;align-self:center;">
                    <div class="input-group mb-3 form-controler">
                        <div class="input-group-prepend">
                        <span class="input-group-text pl-1 pr-1"><img src="../webimg/user.png" style="height:20px;width:20px"></span>
                        </div>
                        <input type="text" name="user" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-3 form-controler">
                        <div class="input-group-prepend">
                        <span class="input-group-text pl-1 pr-1"><img src="../webimg/unlock.png" style="height:20px;width:20px"></span>
                        </div>
                        <input type="password" name="pass" class="form-control" class="password" placeholder="Password" style="border-right:none">
                        <div class="input-group-append">
                            <span class="input-group-text" style="background-color:white;border-left:none">
                                <img class="eye" src="../webimg/eye.png" style="cursor:pointer;height:20px;width:20px">
                                <img class="hide_eye" src="../webimg/hide_eye.png" style="display:none;cursor:pointer;height:20px;width:20px">
                            </span>
                        </div>
                    </div>
                    <button name="login" class="btn btn-peace mb-3">Login</button>
                    <div class="footer mb-3" style="align-self:center;">
                        Don't have an account <a href="register.php"> Register Now</a>
                    </div>
                    <a href="../index.php" class="footer mb-3 back" style="text-decoration:none;color:black;outline:none;align-self:center;cursor:pointer">
                        Goto Home
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/custom.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../bootstrap-4/js/bootstrap.js"></script>
    <script src="../materialize/js/materialize.js"></script>
    <script src="../AOS/aos-master/aos-master/dist/aos.js"></script>
    <script>
        AOS.init();
        $('.hide_eye').on('click',function(){
            $(this).css('display', 'none');
            $(this).siblings().css('display', 'block');
        })
        $('.eye').on('click',function(){
            $(this).css('display', 'none');
            $(this).siblings().css('display', 'block');
        })
    </script>
</body>
</html>