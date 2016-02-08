<?php
				require_once "Mail.php";
				 
				 $from = "<karmraj@rudrasoftech.com>";
				 $to = "karmraj.zala@gmail.com";
				 $subject = "Test Mail from core team";
				 $body = "Dear Student, Your fees recieved succesfully of amount :";
				 
				 $host = "smtp.gmail.com";
				 $username = "karmraj@rudrasoftech.com";
				 $password = "karmraj123";
				 
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',
				   array ('host' => $host,
				     'auth' => true,
				     'username' => $username,
				     'password' => $password));
				 
				 $mail = $smtp->send($to, $headers, $body);
				 
				 if (PEAR::isError($mail)) {
				   echo("<p>" . $mail->getMessage() . "</p>");
				  } else {
				   echo("<p>Message successfully sent!</p>");
				  }

?>
