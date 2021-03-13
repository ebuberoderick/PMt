<?php
    include_once '../connection.php';
    $data=$_POST['val'];
    $trans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$data' AND status='1'");
    $num = mysqli_num_rows($trans);
    if($num > 0){
        ?>
          <option disabled selected>Select your destination</option>
        <?php
        while ($valddel = mysqli_fetch_array($trans)) {
            ?>
                <option value="<?php echo $valddel['transTo'] ?>" class="<?php echo $valddel['transTo'] ?>" class="<?php echo $valddel['transFrom'] ?>"><?php echo $valddel['transTo'] ?></option>
            <?php
        }
    }else{
        ?>
            <option disabled selected>No avaliable Tranport </option>
        <?php
    }
?>