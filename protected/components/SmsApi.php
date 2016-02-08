<?php
class SmsApi  {
	public $r;

        public function init()
        {
                parent::init();
        }

        public function sendsms($to,$message)
        {
		$filename = dirname(__FILE__).'/../config/smsapi.txt';

		$fh = fopen($filename, 'r') or die("Can't open file.");

		$msg_api = fread($fh,filesize($filename));
	
		//$str_pos = strpos($msg_api, 'MOBILE_NO');
		$update_num = str_replace('MOBILE_NO', $to ,$msg_api);
		$update_msg=urlencode($message);
		$update_msg = str_replace('MESSAGE_CONTENT', $update_msg ,$update_num);
		
		
		fclose($fh);
		$update_msg = trim($update_msg);
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $update_msg);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($c, CURLOPT_RETURNTRANSFER,true);
		
		$this->r=curl_exec($c); 
		//var_dump($this->r); exit;
		return $this->r;
		                
        }
        
}
