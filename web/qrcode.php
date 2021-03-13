<?php
class QrCode{
    // Google Chart API URL
    private $apiUrl = 'http://chart.apis.google.com/chart';
    public $data;
	public function TEXT($text){
        $this->data = $text;
    }
    
   // It Generates the Image type of Qr Code
	public function CONTENT($type = null, $size = null, $content = null) {
		$this->data = "CNTS:TYPE:{$type};LNG:{$size};BODY:{$content};;";
	}
    
    // Saving the Qr code image 
	public function QRCODE($size = 400, $filename = null) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$img = curl_exec($ch);
		curl_close($ch);
    
		if($img) {
			if($filename) {
				if(!preg_match("#\.png$#i", $filename)) {
					$filename .= ".png";
				}
				
				return file_put_contents($filename, $img);
			} else {
				header("Content-type: image/png");
				print $img;
				return true;
			}
		}

		return false;
	}
    
	// Saving the Qr code image 
	public static function QRCODE2($size = 400, $text, $filename = null) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://chart.apis.google.com/chart');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($text));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$img = curl_exec($ch);
		curl_close($ch);
    
		if($img) {
			if($filename) {
				if(!preg_match("#\.png$#i", $filename)) {
					$filename .= ".png";
				}
				
				return file_put_contents($filename, $img);
			} else {
				header("Content-type: image/png");
				print $img;
				return true;
			}
		}

		return false;
	}
}
?>