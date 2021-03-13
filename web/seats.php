<?php
    include_once '../connection.php';
    $data=$_POST['val'];
    $datat=$_POST['valt'];
    $datav=$_POST['valv'];
    $trans=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$data' AND transTo='$datat' AND busType='$datav'");
    $dart=mysqli_fetch_array($trans);
    echo $dart['nubSeats'];
?>