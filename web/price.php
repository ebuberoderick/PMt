<?php
    include_once '../connection.php';
    $data=$_POST['val'];
    $datat=$_POST['valt'];
    $datav=$_POST['valv'];
    $datag=$_POST['valg'];
    $trans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$data' AND transTo='$datat' AND busType='$datav'");
    $dart=mysqli_fetch_array($trans);
    $nnm=mysqli_num_rows($trans);
    // if()
    if($nnm < 0){
        echo '0';
    }else{
        $j=strlen($datav);
        if($j > 0){
            echo $dart['price'] * $datag;
        }else{
            echo '0';
        };
    }
?>