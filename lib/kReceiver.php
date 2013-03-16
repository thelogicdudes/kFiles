<?

	class kReceiver
	{
		private $hr;
		
		function __construct() 
		{
			$this->hr = MY_URL;
			$action = $_POST['action'];
			switch($action)
			{
				case "contact":
					$this->contact();
					break;
				case "contact_webmaster":
					$this->contact_webmaster();
					break;
				default:
					echo "1";
					break;
			}
		}

		private function contact()
		{
			function clean_string($string)
			{
				$bad = array("content-type","bcc:","to:","cc:","href");
				return str_replace($bad,"",$string);
			}

			$contact_name = $_POST['contact_name'];
			$contact_email = $_POST['contact_email'];
			$contact_tel = $_POST['contact_tel'];
			$contact_subject = $_POST['contact_subject'];
			$contact_message = $_POST['contact_message'];
			$mail_to = CONTACT_EMAIL;
			$mail_from = MY_EMAIL;
			$mail_subject = "Website Contact: " . clean_string($contact_subject);
			$p_style = "display: block;	padding: 11px; background-color: black; color: white; font-size: 17px;  border-radius: 7px;";
			$mail_message .= "<html><head>";
			$mail_message .= "</head><body>";
			$mail_message .= "<img src='" . $this->hr . "style/images/logo-small.png' alt='ABA small logo' style='position: relative; top: -140px; left: -100px;'>";
			$mail_message .= "<br><br><div class='contact_details' style='display: block; background-color: gray;	padding: 7px; border-radius: 7px;'>";
			$mail_message .= "<p style='$p_style'>Name: ".clean_string($contact_name)."</p>\n";
			$mail_message .= "<p style='$p_style'>Email: <a href='mailto:".clean_string($contact_email)."'>".clean_string($contact_email)."</a></p>\n";
			$mail_message .= "<p style='$p_style'>Tel: <a href='tel:".clean_string($contact_tel)."'>".clean_string($contact_tel)."</a></p>\n";
			$mail_message .= "<p style='$p_style'>Subject: ".clean_string($contact_subject)."</p>\n";
			$mail_message .= "<p style='$p_style'>Message: ".clean_string($contact_message)."</p>\n";
			$mail_message .= "</div><footer></footer></body></html>";
			$headers = "From: $mail_from\r\n";
			$headers .= "Reply-To: $contact_email\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($mail_to, $mail_subject, $mail_message, $headers)
				or die('2There was a problem. Please email webmaster@logicdudes.com or call (407) 477-4284');
			echo "1Your message has been sent";
		}
		private function contact_webmaster()
		{
			function clean_string($string)
			{
				$bad = array("content-type","bcc:","to:","cc:","href");
				return str_replace($bad,"",$string);
			}

			$contact_name = $_POST['contact_name'];
			$contact_email = $_POST['contact_email'];
			$contact_tel = $_POST['contact_tel'];
			$contact_subject = $_POST['contact_subject'];
			$contact_message = $_POST['contact_message'];
			$mail_to = WEBMASTER_EMAIL;
			$mail_from = MY_EMAIL;
			$mail_subject = "Website Contact: " . clean_string($contact_subject);
			$p_style = "display: block;	padding: 11px; background-color: black; color: white; font-size: 17px;  border-radius: 7px;";
			$mail_message .= "<html><head>";
			$mail_message .= "</head><body>";
			$mail_message .= "<img src='" . $this->hr . "style/images/logo-small.png' alt='ABA small logo' style='position: relative; top: -140px; left: -100px;'>";
			$mail_message .= "<br><br><div class='contact_details' style='display: block; background-color: gray;	padding: 7px; border-radius: 7px;'>";
			$mail_message .= "<p style='$p_style'>Name: ".clean_string($contact_name)."</p>\n";
			$mail_message .= "<p style='$p_style'>Email: <a href='mailto:".clean_string($contact_email)."'>".clean_string($contact_email)."</a></p>\n";
			$mail_message .= "<p style='$p_style'>Tel: <a href='tel:".clean_string($contact_tel)."'>".clean_string($contact_tel)."</a></p>\n";
			$mail_message .= "<p style='$p_style'>Subject: ".clean_string($contact_subject)."</p>\n";
			$mail_message .= "<p style='$p_style'>Message: ".clean_string($contact_message)."</p>\n";
			$mail_message .= "</div><footer></footer></body></html>";
			$headers = "From: $mail_from\r\n";
			$headers .= "Reply-To: $contact_email\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($mail_to, $mail_subject, $mail_message, $headers)
				or die("2There was a problem. Please email <a href='mailto:webmaster@businessadvisors.pro'>webmaster@logicdudes.com</a> or call (407) 477-4284");
			echo "1Thank you for your feedback.";
		}
	}


?>