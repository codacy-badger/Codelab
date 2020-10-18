<?php
	class clEmail {

		// IP ##################################################################
		public static function template($alias)
		{
			$getTemplate = array(
			    'table' => 'mailTemplates',
			    'columns' => sql::columns('mailTemplates'),
			    'where' => 'alias = "' . sql::str($alias) . '"',
			    'limit' => 1
			);
			$getTemplate = sql::get($getTemplate);
			return $getTemplate['template'];
		}
		// IP ##################################################################
		public static function send($to, $subject, $message, $attachments = null)
		{

			if (registry::read('mailbox.transport') == 'mail'):

				$headers = "From:" . registry::read('mailbox.mail.from') . "\r\n";
				$headers .= "Reply-To:" . registry::read('mailbox.mail.reply') . "\r\n";
				$headers .= registry::read('mailbox.mail.headers');
				$messageToGo = '';
				$messageToGo .= registry::read('mailbox.header');
				$messageToGo .= $message;
				$messageToGo .= registry::read('mailbox.footer');
				if(@mail($to, $subject, $messageToGo, $headers))
				{
					$sql_insert = array(
						'datetime' => calendar::now(),
						'status' => 1,
						'email' =>  sql::str($to),
						'subject' => sql::str($subject),
						'message' => sql::str($messageToGo),
					);
					sql::insert('logsMail', $sql_insert);
					return true; //SENT
				}else{
					$sql_insert = array(
						'datetime' => calendar::now(),
						'status' => 0,
						'email' =>  sql::str($to),
						'subject' => sql::str($subject),
						'message' => sql::str($messageToGo),
					);
					sql::insert('logsMail', $sql_insert);
					return false;
				}
			endif;
			if (registry::read('mailbox.transport') == 'PHPMailer'):

				$mail = new PHPMailer();
				$mail->CharSet = 'UTF-8';
				$mail->SMTPDebug = registry::read('mailbox.PHPMailer.SMTPDebug');           // Enable verbose debug output


				if (registry::read('mailbox.PHPMailer.isSMTP') == '1'):

					$mail->IsSMTP();
					$mail->Host = registry::read('mailbox.PHPMailer.host');

					if (registry::read('mailbox.PHPMailer.SMTPAuth') == '1'):
						$mail->SMTPAuth = true;
					endif;

					$mail->Username = registry::read('mailbox.PHPMailer.username');
					$mail->Password = crypto::out(registry::read('mailbox.PHPMailer.password'));
					$mail->SMTPSecure = registry::read('mailbox.PHPMailer.SMTPSecure');
					$mail->Port = registry::read('mailbox.PHPMailer.port');
				endif;

				if (registry::read('mailbox.PHPMailer.name') != ''):
					$mail->setFrom(registry::read('mailbox.PHPMailer.from'), registry::read('mailbox.PHPMailer.name'));
				else:
				// From without name
					$mail->setFrom(registry::read('mailbox.PHPMailer.from'));
				endif;

				$mail->addAddress($to);

				$mail->addReplyTo(registry::read('mailbox.PHPMailer.reply'));


				// attachments
			 	if ($attachments != null) :
					foreach($attachments as $key => $value) {
						$mail->addAttachment($value);
					}
			 	endif;

				$mail->isHTML(true); // Set email format to HTML
				$messageToGo = '';
				$messageToGo .= registry::read('mailbox.header');
				$messageToGo .= $message;
				$messageToGo .= registry::read('mailbox.footer');

				$mail->Subject = $subject;
				$mail->Body    = $messageToGo;

				if(@$mail->send()) {
					$sql_insert = array(
						'datetime' => calendar::now(),
						'status' => 1,
						'email' =>  sql::str($to),
						'subject' => sql::str($subject),
						'message' => sql::str($messageToGo),
					);
					sql::insert('logsMail', $sql_insert);

						return true; //SENT

				} else {
					$sql_insert = array(
						'datetime' => calendar::now(),
						'status' => 0,
						'email' =>  sql::str($to),
						'subject' => sql::str($subject),
						'message' => sql::str($messageToGo),
					);
					sql::insert('logsMail', $sql_insert);
					return false;
				}
			endif;
		}


	}


?>
