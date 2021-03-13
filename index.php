<?php session_start(); 
    if(isset($_SESSION['username'])){
        $userType=$_SESSION['userType'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.css">
    <link rel="icon" href="webimg/index.jpg">
    <link href='styles/main.css' rel='stylesheet' />
    <link href='styles/slick.css' rel='stylesheet' />
    <link href='styles/slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="AOS/aos-master/aos-master/dist/aos.css">
    <link href='slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="styles/custom.css">
    <title>Peace Mass Web_Page</title>
</head>
<style>

.tify::before,
.tify::after {
    content: '';
    position:absolute;
    transform: translateX(-50%);
    border-radius: 50%;
    margin: auto;
}

.tify::after {
    left:16px;
    background-color: #2b2d60;
    height: 10px;
    width: 10px;
}
.tify::before {
    left:16px;
    background-color:#2b2d60b2 ;
    height: 20px;
    width: 20px;
    margin-top:-5px;
}
.serv{
    height:400px;background-repeat:no-repeat;background-size:cover;border:none;overflow:hidden;cursor:pointer
}
.testify :focus {
    outline:none;
    border: 1px;
    border-color: rgb(255, 94, 0);
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 162, 100, 0.5);
}
.inner_serv{
    background:linear-gradient(to top,#2b2d60,#2b2d60da,#2b2d60b6,transparent,transparent,transparent,transparent,transparent,transparent,transparent,transparent);
    height:100%;
    transition:0.6s;
    padding-top:300px !important;
}
.inner_serv:hover{
    background:linear-gradient(to top,#2b2d60,#2b2d60da,#2b2d60b6,transparent);
    padding-top:14px !important;
}
.content{
    height:1250px;background:linear-gradient(to top,#2b2d60,transparent);padding:3vw;border-radius:30px 30px 0px 0px;
}

</style>
<body>
    <div class="row m-0 p-0">
        <div class="center col-md-8 hide-on-small-and-down">
            Current Time
            <span style="font-size:4vh">
                08:45 am
            </span>
        </div>
        <div class="col-md-4" style="display:flex">
            <div class="pl-3" style="border-left:2px solid #dd7723;">
                <img src="webimg/clock.png" style="height:30px">
                WORKING HOUR <br>
                <span style="padding-left:33px">
                    6:30am - 6:30pm
                </span>
               
            </div>
            <div class="pl-3" style="border-left:2px solid #dd7723;margin-left:20px ">
                <img src="webimg/cloud.png" style="height:30px">
                WORKING DAYS <br>
                <span style="padding-left:33px">
                    MONDAY - SUNDAY 
                </span>
               
            </div>
        </div>
    </div>
    <div class="container_fliud" style="position:sticky;top:0px;background:#f7f7f7;z-index:9">
        <div class="tpen p-2" style="position:absolute;width:100%;background:#f7f7f7;">
            <div class="container" style="">
                <img class="left" src="../webimg/index.jpg" style="height:50px;width:50px;align-self:center;">
                <ul class="nav justify-content-end p-2" style="margin-top:-2px">
                    <li class="ml-1 nav-item hide-on-small-and-down active">
                        <a class="nav-link" href="#home">HOME</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="#testimonies">TESTIMONIES</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="#services">SERVICES</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="#about">ABOUT</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="#contact">CONTACT</a>
                    </li>
                    <section class="drop" style="cursor:pointer">
                        <?php
                            include_once 'connection.php';
                            if(isset($_SESSION['username'])){
                                $user = $_SESSION['username'];    
                                $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM usersinfo WHERE userId='$user'"));
                                if($nrows < 1){
                                    ?>
                                        <a href="web/login.php" class="ml-2 btn orange darken-1 white-text" style="">login</a>
                                        <a href="web/register.php" class="ml-2 btn orange darken-1 white-text" style="">register</a>
                                    <?php
                                }else{
                                    ?>
                                        <span class="ml-2 rounded-circle" style="display:inline-block;overflow:hidden">
                                            <img src="profile_img/3.jpeg" style="width:40px;height:40px" alt="Profile image">
                                            
                                        </span>
                                        <span style="display:inline-block;vertical-align: top; padding-top:10px;">
                                            <?php echo $user ?>
                                        </span>
                                        <img src="webimg/arrow.png" style="width:15px;height:15px;position:relative;bottom:13px">
                                    <?php
                                }
                            }else{
                                ?>
                                    <a href="web/login.php" class="btn orange darken-1 white-text ml-1">login</a>
                                    <a href="web/register.php" class="btn orange darken-1 white-text ml-1">register</a>
                                <?php
                            }
                        ?>
                        <div class="down" style="display:none;position: absolute;background:#f7f7f7">
                            <li class="ml-1 nav-item">
                                <a class="nav-link" href="/web/bookNow.php">BOOKINGS</a>
                            </li>
                            <li class="ml-1 nav-item">
                                <a class="nav-link" href="/web/logistics.php">LOGISTICS</a>
                            </li>
                            <?php
                                if($userType=='1'){
                                    ?>
                                        <li class="ml-1 nav-item">
                                            <a class="nav-link" href="/web/admin.php">ADMIN PAGE</a>
                                        </li>
                                    <?php
                                }
                            ?>
                            <li class="ml-1 nav-item">
                                <a class="nav-link" href="#testimonies">PROFILE</a>
                            </li>
                            <li class="ml-1 nav-item">
                                <a class="nav-link" href="#services">NOTIFICATIONS</a>
                            </li>
                        </div>
                    </section>
                    <?php
                        if(isset($_SESSION['username'])){
                            $user = $_SESSION['username'];
                            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM usersinfo WHERE userId='$user'"));
                            if($nrows > 0){
                                ?>
                                    <span class="ml-2">
                                        <a href="logout.php" class="btn orange darken-1 white-text" style="">logout</a>
                                    </span>
                                <?php
                            }
                        }
                    ?>
                    <span class="ml-5 white menuTrigger show-on-small" style="display:none;border-radius:9px;cursor:pointer; position:relative;bottom:5px">
                        <img src="/webimg/more.png" style="height:45px;width:45px">
                    </span>
                </ul>
            </div>
            <div class="small_screen_menu" style="position:absolute;width:100%;background:#f7f7f7;display:none;">
                <ul class="navbar-nav hide-on-large-only" style="background:transparent;">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#testimonies">TESTIMONIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="home" style="position:absolute;top:20vh;width:100%;padding:0px 10vw">
        <div class="z-depth-5 content">
            <div style="height:43%">
                <div class="row center">
                    <div class="col-md-6 blue-grey-text" data-aos-duration="2090" data-aos="flip-right" >
                        <h1 style="font-family:forte">PEACE MASS <br>TRANSPORT</h1>
                        <span style="font-family:Brush Script MT;font-size:2rem">Making transport fast and safe . . .</span>
                        <div style="border-left:2px solid #2b2d60;overflow:hidden;">
                            <p class="flow-text p-4" data-aos-duration="3000" data-aos="fade-right">
                               Transportation is an important part of human activity. It forms the basis of all socioeconomic interactions. In many developing countries,lack of transport facilities often hinders economic development. A good transport system is essential to support economic growth and development. 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="m-3" style="height:56%;" id="testimonies">
                <h3 class="center white-text pt-5" style="font-family:forte;position:relative;top:30px">TESTIMONIES</h3>
                <div class="row" style="height:100%;display:flex;justify-content:center;align-items:center">
                    <div class="col-md-6">
                        <div data-aos-duration="2090" data-aos="fade-in">
                            <p class="text-center flow-text white-text">
                                Lorem ipsum dolor, ne expedita. Officia ipsum cupiditate quidem iure itaque aut dignissimos fuga quod?
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 hide-on-small-and-down">
                        <!-- <div class="class " style=""> -->
                            <div class="tify"></div>
                            <div class="p-3 pl-5 flow-text white-text" style="border-left:2px solid #f7f7f7;display:flex;align-items:center;">
                                <div class="">
                                    <img src="/profile_img/3.jpeg" alt="" style="width:90px;height:90px" class="z-depth-4 circle">
                                </div>
                                <div class="">
                                    <span class="pl-3" style="font-size:20px;font-family:forte;text-transform:uppercase;font-weight:bold;position:relative;top:14px">
                                        Claudia Vivian<br>
                                    </span>
                                    <span class="pl-3 grey-text"  style="font-size:1rem">
                                        PUBLIC USER
                                    </span>
                                </div>
                            </div>
                            <div class="tify"></div>
                            <div class="p-3 pl-5 flow-text white-text" style="border-left:2px solid #f7f7f7;display:flex;align-items:center;">
                                <div class="">
                                    <img src="/profile_img/3.jpeg" alt="" style="transform:scale(1.3);width:90px;height:90px" class="z-depth-4 circle">
                                </div>
                                <div class="">
                                    <span class="pl-3" style="font-size:20px;transform:scale(1.3);font-family:forte;text-transform:uppercase;font-weight:bold;position:relative;top:14px">
                                        mudashir gbadebo <br>
                                    </span>
                                    <span class="pl-3 grey-text"  style="font-size:1rem">
                                        PUBLIC USER
                                    </span>
                                </div>
                            </div>
                            <div class="tify"></div>
                            <div class="p-3 pl-5 flow-text white-text" style="border-left:2px solid #f7f7f7;display:flex;align-items:center;">
                                <div class="">
                                    <img src="/profile_img/3.jpeg" alt="" style="width:90px;height:90px" class="z-depth-4 circle">
                                </div>
                                <div class="">
                                    <span class="pl-3" style="font-size:20px;font-family:forte;text-transform:uppercase;font-weight:bold;position:relative;top:14px">
                                        Obinna Adinde <br>
                                    </span>
                                    <span class="pl-3 grey-text"  style="font-size:1rem">
                                        PUBLIC USER
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height:700px;padding-top:60px;" class="blue-grey lighten-5"></div>
    <div style="height:700px;padding-top:60px;" class="blue-grey lighten-4"></div>
    <div style="padding-top:9px;overflow:hidden" class="blue-grey lighten-3" id="services">
        <h3 class="center white-text pt-5" style="font-family:forte;position:relative;top:30px">SERVICES</h3>
        <div class="row mt-5 mb-5 active" style="display:flex;margin:0px 40px;justify-content: center;">
            <div class="col-md-4" style="padding:0px 5vw">
                <div data-aos-duration="2500" data-aos="fade-right" class="card serv z-depth-4" style="background-image:url(webimg/indexsdf.jpg);">
                    <div class="inner_serv p-3 white-text">
                        <h4>PMT - Transport</h4><hr>WE TAKE YOU TO YOUR DESIRED LOCATION 
                        <div class="p-3" style="height:250px;display:flex;align-items:center;justify-content:center">
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officiis at eius a fuga sint maiores, delectus adipisci distinctio. Eligendi numquam eveniet facere cupiditate quisquam, beatae alias rerum cumque vero!</p>
                        </div>
                        <a href="web/bookNow.php" class="center btn btn-peac">BOOK NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="padding:0px 5vw">
                <div data-aos-duration="2500" data-aos="fade-left" class="card serv z-depth-4" style="background-image:url(webimg/indexsdfs.jpg);">
                    <div class="inner_serv p-3 white-text">
                        <h4>PMT - Logistics</h4><hr>WE DELIVER YOUR GOODS FOR YOU
                        <div class="p-3" style="height:250px;display:flex;align-items:center;justify-content:center">
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officiis at eius a fuga sint maiores, delectus adipisci distinctio. Eligendi numquam eveniet facere cupiditate quisquam, beatae alias rerum cumque vero!</p>
                        </div>
                        <a href="web/logistics.php" class="center btn btn-peac">SEND YOUR GOODS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top:9px;" class="blue-grey lighten-2" id="about">
        <div data-aos-duration="3000" data-aos="zoom-in">
            <h3 class="center white-text pt-5" style="font-family:forte;position:relative;top:30px">ABOUT US</h3>
            <div class="row mt-5 pb-5 white-text" style="display:flex;margin:0px 40px;justify-content: center;padding:0px 5vw">
                <h5>History & Development </h5>
                <p class="text-center">
                Peace Mass Transit (PMT) is a reputable transport company in Nigeria that offers excellent services in courier, travels, intra and interstate transportation services. Peace Mass Transportation is owned by the parent company Peace Group Nigeria. The transport firm was founded in 1995 and began operations with just a number of buses, in fact with just 2 buses at the UNN Nsukka and gradually grew to what it currently is right now (Over 1500 bus fleet across the country). Peace Mass Transport currently serves about 30,000 travelers on a daily basis across the country with the help of its over 2500 staff strength.
                </p>
                <p class="text-center">
                    Peace Mass Transit has 2,000 buses that move 30,000 commuters daily Fleet
                </p>
                <p class="text-center">
                    Peace Mass Transit company was established by Chief Sam Maduka Onyishi. Mr. Maduka holds the position of the Chairman and Managing Director of the transport firm. He is a well-known businessman and philanthropist.
                </p>
            </div>
        </div>
    </div>
    <div style="padding-top:9px;overflow:hidden" class="blue-grey lighten-1" id="contact">
        <h3 class="center white-text pt-5" style="font-family:forte;position:relative;top:30px">OUR CONTACTS</h3>
        <div class="row mt-5" style="height:100%;display:flex;justify-content:center;align-items:center">
            <?php
                $contactGet=mysqli_query($pcon,"SELECT * FROM directions");
                while ($contDetails = mysqli_fetch_array($contactGet)) {
                    ?>
                        <div class="col-md-3 p-3" data-aos-duration="3000" data-aos="fade-up">
                            <div class="card z-depth-5 p-3 m-3">
                                <div class="flow-text">Location</div>
                                <p  class="p-0"style="text-trnasform:capilalize"><?php echo $contDetails['Dfrom']?></p>
                                <div class="flow-text">Address</div>
                                <p class="p-0"><?php echo $contDetails['pAddress']?>.</p>
                                <div class="flow-text">Contact</div>
                                <p class="p-0"><span style="position:relative;top:10px"><?php echo $contDetails['pContact']?></span> <span class="btn right btn-peace">call now</span></p>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
    <?php
        if(isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM usersinfo WHERE userId='$user'"));
            if($nrows > 0){
                ?>
                    <div style="display:flex;justify-content:center;align-items:center;flex-direction:column" class="blue-grey p-5">
                        <h5 class="white-text flow-text">Testify</h5>
                        <textarea data-aos-duration="2090" data-aos="flip-up" name="" id="" cols="30" rows="10" placeholder="Type your message here . . ." class="testify mt-3 mb-3 z-depth-3 p-2" style="border:1px solid white;max-width:600px;border-radius:10px;min-height:300px;background:rgba(250, 235, 215, 0.384)"></textarea>
                        <span class="btn orange darken-3 waves-effect waves-grey">submit</span>
                    </div>
                <?php
            }
        }
    ?>
    <?php 
        // echo $uri =  $_SERVER["REQUEST_URI"];
    ?>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/custom.js"></script>
    <script src="scripts/slick.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script src="scripts/slick.min.js"></script>
    <script src="AOS/aos-master/aos-master/dist/aos.js"></script>
    <script>
        AOS.init();
        // $('.class').slick({
        //     autoplay: true,
        //     autoplaySpeed: 9000,
        //     infinite: true,
        //     speed: 500,
        //     fade: true,
        //     cssEase: 'linear'
        // });
        // $('.class').slick({
        //     autoplay: true,
        //     autoplaySpeed: 100,
        //     centerMode: true,
        //     centerPadding: '60px',
        //     slidesToShow: 3
        // })
    </script>
</body>
</html>
<!-- testimony
2.0
Obinna Adinde
25 Nov, 2020
Poor travelling condition
Hello, I have been a customer since my days at UNN in the nineties, I observed lately that buses plying port Harcourt do not have AC,even when you pay for one, I believe we have gone past this stage abeg.
Reply
Useful
Wrong
1.0
Claudia
14 Aug, 2020
Criminal staffs in Jabi branch Abuja
So one MR CJ with phone number: +234 806 690 4221 that works at the sending section has been taking parcels from people and collecting money and at the end , stops taking your calls nor delivers the items..not the only one who’s experienced this .
Peace park you guys would loose it soon like Mr Biggs
You don’t have a working customer service because u have past glory
PUBLIC USER
Vivian
25 Nov, 2020
Did you rate them 1.0? That's a big score. The best rating for peace mass transit both for transportation and waybill services is 0.0. Using them is a big error. Worst customer care services that I have ever seen. Rude customer care representatives. -->