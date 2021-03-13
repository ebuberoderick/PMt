<?php
    include_once '../connection.php';
    $data=$_POST['val'];
    $datat=$_POST['valt'];
    $trans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$data' AND transTo='$datat'");
    ?>
        <option disabled selected>Select your desired vehicle</option>
    <?php
    while ($valddel = mysqli_fetch_array($trans)) {
        ?>
            <option value="<?php echo $valddel['busType'] ?>"><?php echo $valddel['busType'] ?></option>
        <?php
    }
?>