<?php
    session_start();
    include_once '../connection.php';
    $userType=$_SESSION['userType'];
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<input type="hidden" class="userid" value="<?php echo md5('PMT'.uniqid().$_SESSION['username']);?>">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../materialize/css/materialize.css">
    <link rel="stylesheet" href="../bootstrap-4/css/bootstrap.css">
    <link rel="icon" href="../webimg/index.jpg">
    <link href='../styles/main.css' rel='stylesheet' />
    <link href='../styles/slick.css' rel='stylesheet' />
    <link href='../styles/slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="../AOS/aos-master/aos-master/dist/aos.css">
    <link href='../slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="../styles/custom.css">
    <title>Peace Mass Logistics Booking</title>
</head>
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
                <img src="../webimg/clock.png" style="height:30px">
                WORKING HOUR <br>
                <span style="padding-left:33px">
                    6:30am - 6:30pm
                </span>
               
            </div>
            <div class="pl-3" style="border-left:2px solid #dd7723;margin-left:20px ">
                <img src="../webimg/cloud.png" style="height:30px">
                WORKING DAYS <br>
                <span style="padding-left:33px">
                    MONDAY - SUNDAY 
                </span>
               
            </div>
        </div>
    </div>
    <div class="wait" style="display:none;">
        <div class="white-text flow-text" style="position:fixed;background:#09090f8c;width:100%;height:100vh;z-index:99;bottom:0;display:flex;justify-content:center;align-items:center;">Please wait generating your recipt <img src="../webimg/loader.gif" class="ml-2"></div>
    </div>
    <div class="successpay" style="display:none;">
        <div style="position:absolute;background:#09090f8c;width:100%;height:100vh;z-index:99;top:0;display:flex;justify-content:center;align-items:center;">
            <div class="precpt p-3" style="min-width:350px;background:linear-gradient(to top,white,#f7f7f7)">
                <div class="center"><img src="/webimg/index.jpg" width="70px" height="70px"></div>
                <div class="download">
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2">Userid</div>
                            <div class="mt-2">From</div>
                            <div class="mt-2">TO</div>
                            <div class="mt-2">Transsit ID</div>
                            <div class="mt-2">Receiver Contact</div>
                            <div class="mt-2">Receiver Contact 2</div>
                            <div class="mt-2">Time booked</div>
                            <div class="mt-2">Amount paid</div>
                        </div>
                            <div class="col-6">
                                <div class="mt-2" id="userid" >: </div>
                                <div class="mt-2" id="Ufrom">: </div>
                                <div class="mt-2" id="uto">: </div>
                                <div class="mt-2" id="transitId">: </div>
                                <div class="mt-2" id="Receiver">: </div>
                                <div class="mt-2" id="ReceiverT">: </div>
                                <div class="mt-2" id="timeBook">: </div>
                                <div class="mt-2" id="price">: </div> 	
                            </div>
                    </div>
                    <div class="center"><img src="" id="qrcode_display" width="150px" height="150px"></div>
                </div>
                <div class="center">
                    <span class="btn btn-success">Print</span>
                    <span class="btn btn-primary">download</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container_fliud" style="position:sticky;top:0px;background:#f7f7f7;z-index:9">
        <div class="tpen p-2" style="position:absolute;width:100%;background:#f7f7f7;">
            <div class="container" style="">
                <img class="left" src="../webimg/index.jpg" style="height:50px;width:50px;align-self:center;">
                <ul class="nav justify-content-end p-2" style="margin-top:-2px">
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="../index.php">HOME</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="../index.php#testimonies">TESTIMONIES</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="../index.php#services">SERVICES</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="../index.php#about">ABOUT</a>
                    </li>
                    <li class="ml-1 nav-item hide-on-small-and-down">
                        <a class="nav-link" href="../index.php#contact">CONTACT</a>
                    </li>
                    <section class="drop" style="cursor:pointer">
                        <?php
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
                                            <img src="../profile_img/3.jpeg" style="width:40px;height:40px" alt="Profile image">
                                        </span>
                                        <span style="display:inline-block;vertical-align: top; padding-top:10px;">
                                            <?php echo $user ?>
                                        </span>
                                        <img src="../webimg/arrow.png" style="width:15px;height:15px;position:relative;bottom:13px">
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
                            <li class="ml-1 nav-item active">
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
                                        <a href="../logout.php" class="btn orange darken-1 white-text" style="">logout</a>
                                    </span>
                                <?php
                            }
                        }
                    ?>
                    <span class="ml-3 white menuTrigger show-on-small" style="display:none;border-radius:9px;cursor:pointer; position:relative;bottom:5px">
                        <img src="/webimg/more.png" style="height:45px;width:45px">
                    </span>
                </ul>
            </div>
            <div class="small_screen_menu" style="position:absolute;width:100%;background:#f7f7f7;display:none;">
                <ul class="navbar-nav hide-on-large-only" style="background:transparent;">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="../index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="../index.php#testimonies">TESTIMONIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="../index.php#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="../index.php#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="../index.php#contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div style="display:flex;justify-content:center;align-items:center;background:linear-gradient(to top,#2b2d60,#2b2d60da,#2b2d60b6,#dd7723);padding:4rem" class="center">
        <div class="form_cardd card p-3 z-depth-3" data-aos-duration="2000" data-aos="zoom-out" style="margin-top:80px;min-width:350px;max-width:400px">
            <form method="post" name="ticket" id="paymentForm" accept-charset="UTF-8">
                <div class="input-field mt-2" style="width:100% !important">
                    <select name="" class="browser-default fromD">
                        <option selected Disabled>From</option>
                        <?php
                            $check=mysqli_query($pcon,"SELECT Dfrom FROM directions");
                            while ($vald = mysqli_fetch_array($check)) {
                               ?>
                                    <option value="<?php echo $vald['Dfrom'] ?>"><?php echo $vald['Dfrom'] ?></option>
                               <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3 form-controler" style="width:100% !important">
                    <select name="" class="browser-default toD">
                        <option selected Disabled>To</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="number" required class="Receiver" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Receivers contact</label>
                </div>
                <div class="input-field">
                    <input type="number" class="ReceiverT" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Another Receivers contact</label>
                </div>
                <div class="input-field">
                    <input type="number" class="weight" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Weight In Kg</label>
                </div>
                <div style="display:">
                    <div style="display:">
                        <div class="price mb-3">
                            PRICE:
                            <div class="flow-text">
                                NGN 0.00
                            </div>
                        </div>
                        <input type="" id="totalPriced">
                    </div>
                    <button type="submit" onclick="payWithPaystack()" class="btn btn-peace mb-3 book btnre">Send goods now</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../scripts/jquery.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>     
    <script src="../scripts/custom.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../bootstrap-4/js/bootstrap.js"></script>
    <script src="../materialize/js/materialize.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../AOS/aos-master/aos-master/dist/aos.js"></script>
    <script>
        AOS.init();
        $('select').formSelect();
        $('.weight').on('keyup',()=>{
            $amm=$('.weight').val()*3;
            $('#totalPriced').val()=$amm;
        });
        $('#totalPriced').on('change',()=>{
            $btsd=$('#totalPriced').val();
            // if($btsd > 0){
                // $('.btnre')removeClass('disabled');
            // }
        });
    </script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_8a31e17376bd9b0413098cffc7b5a0475a0cf0cc',
                email: 'williams.nnu@gmail.com',
                amount: document.getElementById("totalPriced").value * 100,
                ref: 'PMT' + Math.floor((Math.random() * 1000000000) + 1),
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    alert('Transaction Canceled');
                },
                callback: function(response) {
                    $('.wait').css('display','block');
                    $shown = $('.fromD').val();
                    $showt = $('.toD').val();
                    $showv = $('.Receiver').val();
                    $showg = $('.ReceiverT').val();
                    $showe = $('#totalPriced').val();
                    $encyData= $('.userid').val();
                    $.ajax({
                        type: 'post',
                        url: 'paySuccessfulLogs.php',
                        data: { 'from':$shown,'to':$showt,'Receiver':$showv,'ReceiverT':$showg,'totalPrice':$showe,'ency':$encyData },
                        cache: false,
                        dataType:'json',
                        success: function(returnData) {
                            if(returnData.status == 'success'){
                                $('#userid').text(`: ${returnData.userid}`);
                                $('#Ufrom').text(`: ${returnData.Ufrom}`);
                                $('#uto').text(`: ${returnData.uto}`);
                                $('#transitId').text(`: ${returnData.transitId}`);
                                $('#Receiver').text(`: ${returnData.Receiver}`);
                                $('#ReceiverT').text(`: ${returnData.ReceiverT}`);
                                $('#timeBook').text(`: ${returnData.timeBook}`);
                                $('#price').text(`: ${returnData.price}`);
                                $('#qrcode_display').attr( 'src', `${returnData.image}`);
                                setInterval(() => {
                                    $('.successpay').css('display','block');
                                    $('.wait').css('display','none');
                                }, 300);
                            }
                        }
                    });
                }
            });
            handler.openIframe();
        }
    </script>
</body>
</html>