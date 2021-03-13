<?php
    session_start();
    include_once '../connection.php';
    $userType=$_SESSION['userType'];
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
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
    <title>Peace Mass Ticket Booking</title>
</head>
<style>
    
.list-group a {
    text-decoration: none;
    color:black;
}   
.list-group a:hover{
    text-decoration: none;
    background:#2b2d6059;
    color:white;
}
.acv{
    text-decoration: none;
    background:#2b2d6093;;
    color:white !important;
}
</style>
<script src="/scripts/jquery.js"></script>
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
                            <li class="ml-1 nav-item">
                                <a class="nav-link" href="/web/logistics.php">LOGISTICS</a>
                            </li>
                            <?php
                                if($userType=='1'){
                                    ?>
                                        <li class="ml-1 nav-item active ">
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
                    <span class="ml-5 white menuTrigger show-on-small" style="display:none;border-radius:9px;cursor:pointer; position:relative;bottom:5px">
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
    <div style="padding:4rem" class="pb-0">
        <div class="showAlert"></div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div data-aos-duration="2500" data-aos="fade-up"  class="z-depth-3 list-group test mx-auto mb-3" style="max-width:250px;align-self:center;position:sticky:top:80px;">
                    <a href="#" class="list-group-item TB acv">Ticket Booked</a>
                    <a href="#" class="list-group-item AL">Avaliable Logisticses</a>
                    <a href="#" class="list-group-item ST">Scan Ticket</a>
                    <a href="#" class="list-group-item UTB">Update Ticket Booking</a>
                    <a href="#" class="list-group-item MA">Make Admin</a>
                    <a href="#" class="list-group-item TR">Tranport Route / Tranport Route Update</a>
                </div>
            </div>
            <div class="col-md-8">
                <div style="display:" class="ticketBooked">
                    <h5 class="center flow-text">Ticket Booked</h5>
                    <div class="table-responsive-md" data-aos-duration="2500" data-aos="fade-out" >
                        <table class="highlight z-depth-3 white-text striped">
                            <thead style="background:#8486a3">
                                <tr>
                                    <th class="pl-2">From / To</th>
                                    <th class="">Vehicle </th>
                                    <th class="">Avaliable Seat(s)</th>
                                    <th class="">Booked Seat(s)</th>
                                    <th class="">Price </th>
                                    <th class="">Departure Time</th>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;background:#2b2d6059">
                                <?php
                                    $gettrans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE status='1' limit 10");
                                    $numdata=mysqli_num_rows($gettrans);
                                    while ($transsplit=mysqli_fetch_array($gettrans)) {
                                        $transitId=$transsplit['Id'];
                                        $gettransFlo=mysqli_query($pcon,"SELECT * FROM recipts WHERE transitId=$transitId");
                                        $numdataFlo=mysqli_num_rows($gettransFlo);
                                        $ti= $transsplit['departure']; $ime= new DateTime($ti); 
                                        ?>
                                            <tr>
                                                <td class="pl-2" style="text-transform:capitalize"><?php echo $transsplit['transFrom'].' / '.$transsplit['transTo']?></td>
                                                <td style="text-transform:capitalize"><?php echo $transsplit['busType']?></td>
                                                <td><?php echo $transsplit['nubSeats']-$numdataFlo;?></td>
                                                <td><?php echo $numdataFlo;?></td>
                                                <td style="text-transform:capitalize">&#8358; <?php echo $transsplit['price']?></td>
                                                <td style="text-transform:capitalize"><?php echo $transsplit['depdate'].' '. $transsplit['departure'].' ('. $ime->format('h:i a').')';?></td>
                                                <?php ?>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        $gettranst=mysqli_query($pcon,"SELECT * FROM transportflow WHERE status='1'");
                        $numdatat=mysqli_num_rows($gettranst);
                        if($numdatat > 10){
                            ?>
                                <ul class="pagination justify-content-center" style="margin:20px 0">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <?php
                                        $a=0;$b=0;$c=10;
                                        while ($a < $numdatat) {
                                            $a=$a+$c;$b++;
                                            ?>
                                                <li class="page-item"><a class="page-link" href="#"><?php echo $b?></a></li>
                                            <?php
                                        }
                                    ?>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            <?php
                        }

                    ?>
                </div>
                <div style="display:none" class="avaliableLogisticses">
                    <h5 class="center">Avaliable Logisticses</h5>
                </div>
                <div style="display:none" class="scanTicket">
                    <h5 class="center">Scan Ticket</h5>
                    <h6 class="center mt-3">Please place Qr-code Before The Camera</h6><hr>
                    <!-- <video src="webImage/373947032.sd.mp4" ></video> -->
                    <video width="300px" height="300px" autoplay="true" id="scanner" ></video>
                    <div class="form-group p-5">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div style="display:none" class="updateTicketBooking">
                    <h5 class="center">Update Ticket Booking</h5>
                    <form method="post">
                        <div class="mx-auto mt-3 shadow-lg card p-3" style="max-width:400px">
                            <div class="input-field">
                                <select required class="browser-default Tfrom">
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
                            <div class="input-field">
                                <select required class="browser-default Tto">
                                    <option selected Disabled>To</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <input type="text" class="inp Nseat" required style="">
                                <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Number of seats</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="inp Pricet" required style="">
                                <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Price</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="inp Vtype" required style="">
                                <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Vehicle type</label>
                            </div>
                            <div class="input-field">
                                <input type="date" class="inp Ddate" required style="">
                                <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Departure date</label>
                            </div>
                            <div class="input-field">
                                <input type="time" class="inp Dtime" required style="">
                                <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Departure time (24_Hours)</label>
                            </div>
                            <div class="center" style="">
                                <button type="submit" class="btn btn-peac mx-auto addtransit">add transit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div style="display:none" class="makeAdmin">
                    <h5 class="center">Make / Remove Admin</h5>
                </div>
                <div style="display:none" class="tranportRoute ">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="center">Tranport Route / Tranport Route Update</h5>
                        </div>
                        <div class="col-md-4">
                            <a class="modal-trigger z-depth-3 waves-effect right btn btn-peac" href="#logoutModal" style=""> add office</a>
                        </div>  
                        <div data-aos-duration="2090" data-aos="flip-up" id="logoutModal" class="modal" style="max-width:300px">
                            <div class="modal-content" style="border:none;height:100%">
                                <form method="post">
                                    <?php
                                        if(isset($_POST['addOffice'])){
                                            $offices=$_POST['office'];
                                            $address=$_POST['address'];
                                            $contact=$_POST['contact'];
                                            $office=mysqli_query($pcon,"SELECT * FROM directions WHERE Dfrom='$offices'");
                                            if(mysqli_num_rows($office)<=0){
                                                $addOffice = $ocon->query("INSERT INTO directions(Dfrom,pAddress,pContact)VALUE('$offices','$address','$contact')");
                                                if($addOffice){
                                                    ?>
                                                    <script>
                                                        $('.TR').click();
                                                        alert('Success! Office was Successfully Added');
                                                    </script>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                    <div class="input-field">
                                        <input type="text" class="inp put1" name="office" required>
                                        <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Place / Offices</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea name="address" cols="30" rows="10" required style="min-height:100px;max-height:200px" class="materialize-textarea" ></textarea>
                                        <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Physical Address</label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" class="inp put1" required name="contact" style="">
                                        <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Contact Number</label>
                                    </div>
                                    <div class="center" style="width:23%">
                                        <button class="btn btn-peac mx-auto" name="addOffice" style="width:200px;position:absolute;bottom:20px">add office</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table_div">
                        <table class="table table-bordered striped white">
                            <tr>
                                <th>Place / Offices</th>
                                <th width="65%">Physical Address</th>
                                <th>Contact Number</th>
                            </tr>
                            <tbody style="cursor:pointer;background:#2b2d6059">
                                <?php
                                    $dirction=mysqli_query($pcon,"SELECT * FROM directions limit 10");
                                    while ($places=mysqli_fetch_array($dirction)) {
                                        ?>
                                            <tr>
                                                <td class="pl-2"  style="text-transform:capitalize"><?php echo $places['Dfrom']?></td>
                                                <td class="pl-2"  style="text-transform:capitalize"><?php echo $places['pAddress']?></td>
                                                <td class="pl-2"  style="text-transform:capitalize"><?php echo $places['pContact']?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        $dirct=mysqli_query($pcon,"SELECT * FROM directions");
                        $drinum=mysqli_num_rows($dirct);
                        if($drinum > 10){
                            ?>
                                <ul class="pagination justify-content-center" style="margin:20px 0">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <?php
                                        $ae=0;$be=0;$ce=10;
                                        while ($ae < $drinum) {
                                            $ae=$ae+$ce;$be++;
                                            ?>
                                                <li class="page-item"><a class="page-link" href="#"><?php echo $be?></a></li>
                                            <?php
                                        }
                                    ?>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            <?php
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>  
    <script>
    </script>
    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/instascan.min.js"></script>
    <script src="../scripts/custom.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../bootstrap-4/js/bootstrap.js"></script>
    <script src="../materialize/js/materialize.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../AOS/aos-master/aos-master/dist/aos.js"></script>
    <script type="text/javascript">
        $('.modal').modal({});
        AOS.init();
        $('.Tfrom').on('change',()=>{
            $Trf=$('.Tfrom').val();
            $.ajax({
                type: 'post',
                url: 'to.php',
                data: { 'val': $Trf },
                cache: false,
                success: function(returnData) {
                    $('.Tto').html('<div class="pulse alert alert-success pt-4 pb-4 " style="position:absolute;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Update was Successful</div>');
                }
            });
        });
        $('.addtransit').on('click',(e)=>{
            $Tfrom=$('.Tfrom').val();
            $Tto=$('.Tto').val();
            $Nseat=$('.Nseat').val();
            $Pricet=$('.Pricet').val();
            $Vtype=$('.Vtype').val();
            $Ddate=$('.Ddate').val();
            $Dtime=$('.Dtime').val();
            e.preventDefault();
            if($Tfrom > 0 && $Tto > 0 && $Nseat > 0 && $Pricet > 0 && $Vtype > 0 && $Ddate > 0 && $Dtime > 0){
                $.ajax({
                    type: 'post',
                    url: 'postBooking.php',
                    data: {'Tfrom':$Tfrom,'Tto':$Tto,'Nseat':$Nseat,'Pricet':$Pricet,'Vtype':$Vtype,'Ddate':$Ddate,'Dtime':$Dtime},
                    cache: false,
                    success: function(returnData) {
                        $('.showAlert').html(returnData);
                        $('.Tfrom').val('');
                        $('.Tto').val('');
                        $('.Nseat').val('');
                        $('.Pricet').val('');
                        $('.Vtype').val('');
                        $('.Ddate').val('');
                        $('.Dtime').val('');
                    }
                });
            }else{
                alert('Please Fill All Inputs');
            }
        });
        $('.MA').on('click',()=>{
            $('.MA').addClass(' acv');
            $('.MA').siblings().removeClass(' acv');
            $('.makeAdmin').css('display','block');
            $('.makeAdmin').siblings().css('display','none');
        });
        $('.TR').on('click',()=>{
            $('.TR').addClass(' acv');
            $('.TR').siblings().removeClass(' acv');
            $('.tranportRoute').css('display','block');
            $('.tranportRoute').siblings().css('display','none');
        });
        $('.ST').on('click',()=>{
            $('.ST').addClass(' acv');
            $('.ST').siblings().removeClass(' acv');
            $('.scanTicket').css('display','block');
            $('.scanTicket').siblings().css('display','none');
        });
        $('.UTB').on('click',()=>{
            $('.UTB').addClass(' acv');
            $('.UTB').siblings().removeClass(' acv');
            $('.updateTicketBooking').css('display','block');
            $('.updateTicketBooking').siblings().css('display','none');
        });
        $('.TB').on('click',()=>{
            $('.TB').addClass(' acv');
            $('.TB').siblings().removeClass(' acv');
            $('.ticketBooked').css('display','block');
            $('.ticketBooked').siblings().css('display','none');
        });
        $('.AL').on('click',()=>{
            $('.AL').addClass(' acv');
            $('.AL').siblings().removeClass(' acv');
            $('.avaliableLogisticses').css('display','block');
            $('.avaliableLogisticses').siblings().css('display','none');
        });
        $('select').formSelect();
        let scanner = new Instascan.Scanner({video:document.getElementById('scanner')});
        scanner.addListener('scan',function(Qr){
            alert(Qr);
        });
        Instascan.Camera.getCameras().then(function(carmeras){
            if(carmeras.lenght > 0){
                scanner.start(carmeras[0]);
            }else{
                console.error('no carmera')
            }
        }).catch(function(e){
            console.error(e);
        });
    </script>
</body>
</html>