<?php
include_once '../connection.php';
include_once '../web/qrcode.php';
session_start();
$userid=$_SESSION['username'];
$from=$_POST['from'];
$to=$_POST['to'];
$Vehicle=$_POST['Vehicle'];
$seatval=$_POST['seatval'];
$totalPrice=$_POST['totalPrice'];
$trid=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$from' AND transTo='$to'");
$trnasIdget=mysqli_fetch_array($trid);
$trnasId=$trnasIdget['Id'];
$encyData=$_POST['ency'];
$departure=$trnasIdget['depdate'].' '.$trnasIdget['departure'];
$response = [];
$book = $ocon->query("INSERT INTO recipts(departure,userId,Ufrom,uto,bustype,seats,price,transitId,ency) VALUES ('$departure','$userid','$from','$to','$Vehicle','$seatval','$totalPrice','$trnasId','$encyData')");
if($book) {
	$qtname=$userid.uniqid();
	$qc = QRCODE::QRCODE2(400, $encyData, $qtname . '.png');
	// $qc = new QRCODE(); 
	// $qc->TEXT($encyData);
	// $qc->QRCODE(400, $qtname . '.png');
	if($qc){
		$DBqr=$qtname.'.png';
		$exec_query = mysqli_query($pcon,"UPDATE recipts SET Qrcode='$DBqr' WHERE userId='$userid' AND transitId='$trnasId' AND ency='$encyData'");
		include_once '../connection.php';
		$returnQuery=mysqli_query($pcon,"SELECT * FROM recipts WHERE ency='$encyData'");
		while($retdata=mysqli_fetch_array($returnQuery)){
			$response = [
				'status' => 'success',
				'userid' => $retdata['userId'],
				'Ufrom' => $retdata['Ufrom'],
				'uto' => $retdata['uto'],
				'transitId' => $retdata['transitId'],
				'bustype' => $retdata['bustype'],
				'seats' => $retdata['seats'],
				'timeBook' => $retdata['timeBook'],
				'price' => number_format($retdata['price']).'.00',
				'departure' => $retdata['departure'],
				'image' => "/web/" . $qtname . ".png"
			];							
		}
	}else{
		$response = [
				'status' => 'error',
				'message' => ''
			];
	}
}else{
	
	$response = [
			'status' => 'error',
			'message' => 'An error occured while booking!'
		];
}

echo json_encode($response);
?>