<?php
    include_once '../connection.php';
    $data=$_POST['val'];
    $datat=$_POST['valt'];
    $datav=$_POST['valv'];
    $trans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$data' AND transTo='$datat' AND busType='$datav'");
    $dart=mysqli_fetch_array($trans);
    $num=$dart['nubSeats'];
    $run=0;
    ?>
        <option value="0">Select number of seat(s)</option>
    <?php
    while ($run < $num) {
        $run++;
        if($run == 1){
            ?>
                <option value="<?php echo $run?>"><?php echo $run?> Seat</option>
            <?php
        }else{
            ?>  
                <option value="<?php echo $run?>"><?php echo $run?> Seats</option>
            <?php
        }
    }
?>