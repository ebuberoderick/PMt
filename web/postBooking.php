<?php
    include_once '../connection.php';
    $Tfrom=$_POST['Tfrom'];
    $Tto=$_POST['Tto'];
    $Nseat=$_POST['Nseat'];
    $Pricet=$_POST['Pricet'];
    $Vtype=$_POST['Vtype'];
    $Ddate=$_POST['Ddate'];
    $Dtime=$_POST['Dtime'].':00';
    $update = $ocon->query("INSERT INTO transportflow(busType,nubSeats,depdate,departure,price,transTo,transFrom) VALUES ('$Vtype','$Nseat','$Ddate','$Dtime','$Pricet','$Tto','$Tfrom')");
    if($update) {
        ?>
            <script>
            setInterval(() => {
                $('.alert').css('margin-right','-3000px')
                }
            , 5000);
            $('.showAlert').html=();
            </script>
        <?php
    }
?>