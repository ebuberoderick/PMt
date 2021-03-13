<?php
include_once '../connection.php';
include_once '../web/qrcode.php';
session_start();
$userid=$_SESSION['username'];
$from=$_POST['from'];
$to=$_POST['to'];
$Receiver=$_POST['Receiver'];
$ReceiverT=$_POST['ReceiverT'];
$totalPrice=$_POST['totalPrice'];
$trid=mysqli_query($pcon,"SELECT * FROM transportflow WHERE transFrom='$from' AND transTo='$to'");
$trnasIdget=mysqli_fetch_array($trid);
$encyData=$_POST['ency'];
$response = [];
$book = $ocon->query("INSERT INTO logistics(ency,logFrom,logTo,price,receiver,receiverT,userId) VALUES ('$encyData','$from','$to','$totalPrice','$Receiver','$ReceiverT','$userid')");
if($book) {
	$qtname=$userid.uniqid();
	$qc = QRCODE::QRCODE2(400, $encyData, $qtname . '.png');
	if($qc){
		$DBqr=$qtname.'.png';
		$exec_query = mysqli_query($pcon,"UPDATE logistics SET qrCode='$DBqr' WHERE userId='$userid' AND ency='$encyData'");
		include_once '../connection.php';
		$returnQuery=mysqli_query($pcon,"SELECT * FROM logistics WHERE ency='$encyData'");
		while($retdata=mysqli_fetch_array($returnQuery)){
			$response = [
				'status' => 'success',
				'userid' => $retdata['userId'],
				'Ufrom' => $retdata['logFrom'],
				'uto' => $retdata['logTo'],
				'Receiver' => $retdata['receiver'],
				'ReceiverT' => $retdata['receiverT'],
				'timeBook' => $retdata['bookTime'],
				'price' => number_format($retdata['price']).'.00',
				'image' => "/web/".$qtname.".png"
			];							
		}
	}else{
		$response = [
            'status' => 'error',
            'message' => 'QrCode Could Not Be Genarate Due To Poor Network Please Try Again'
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