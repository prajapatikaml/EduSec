<?php
class MailApi  {
	public $r;

    
        public function init()
        {
                parent::init();
        }

        public function sendmail($to,$message)
        {
		require_once "Mail.php";	
		$from = "EduSec<rudratestmail@gmail.com>";
		$subject = "Login details for Edusec";
		$body = $message;
		 
	 	$host = "ssl://smtp.gmail.com";
		$username = "rudratestmail@gmail.com";
		$password = "rudra@123";
		 
		$headers = array ('From' => $from,
		   'To' => $to,
		   'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		   array ('host' => $host,
			  'port'=>'465', 
		     'auth' => true,
		     'username' => $username,
		     'password' => $password));
		 
		$mail = $smtp->send($to, $headers, $body);
		 
		if (PEAR::isError($mail)) {
		   echo("<p>" . $mail->getMessage() . "</p>");
		  } else {
		   echo("<p>MAIL successfully sent!</p>");
		  }		               
	
        }
        
}
