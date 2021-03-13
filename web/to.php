<option selected Disabled>To</option>
<?php
    include_once '../connection.php';
    $to =$_POST['val'];
    $check=mysqli_query($pcon,"SELECT Dfrom FROM directions");
    while ($vald = mysqli_fetch_array($check)) {
        if($vald['Dfrom'] != $to){
            ?>
                <option value="<?php echo $vald['Dfrom'] ?>"><?php echo $vald['Dfrom'] ?></option>
            <?php
        }
    }
?>