<?php
include_once('logger.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){     
 	 $log = new Logging();
     $admin_email = "info@beyondcorporation.com, beyondcorporation@yopmail.com";//"manik.biradar9@gmail.com,";
	 $personName = $_REQUEST["personName"];
	 $personEmail = $_REQUEST["personEmail"];
	 $personPhone = $_REQUEST["personPhone"];
	 $personMessage = $_REQUEST["personMessage"];
	 $subject = "Thank you for contacting us on www.beyondcorporation.com";
	 $subjectAdmin = "Message From Beyond-Corporation";
	 $headers = "From: " .$personEmail. "\n" ;	 
	 $message = '
		<html>
			<head>
			<title>Message From Website</title>
			</head>
			<body>
				<p>Dear <b>'.$personName.'</b><br/>Thank you for contacting us. We have received the following details from you:<br/></p>
					<table>
						<tr>
							<td style="width:100px;">Name</td>
							<th style="text-align:left;">'.$personName.'</th>
						</tr>
						<tr>
							<td style="width:100px;">Email</td>
							<th style="text-align:left;">'.$personEmail.'</th>
						</tr>
						<tr>
							<td style="width:100px;">Phone</td>
							<th style="text-align:left;">'.$personPhone.'</th>
						</tr>
					</table>
					<p><br/><b>You Sent This Message :</b><br/>'.$personMessage.'<br/></p>
					<p><br/> We shall get in touch with you soon.
					<br/><br/>Regards,
					<br/><strong><span style="color:#442076; font-family:arial;">BEYOND CORPORATION</span></strong>
					<br/><span style="color:#222; font-family:arial;">www.beyondcorporation.com </span></p>
			</body>
		</html>';


		$messageToAdmin = '
		<html>
			<head>
			<title>Message From Website</title>
			</head>
			<body>
				<p>Dear <b>Admin,</b><br/><b>'.$personName.'</b> Contacted to your Website.<br/>The list of details is as follows:</p>
					<table>
						<tr>
							<td style="width:100px;">Name</td>
							<th style="text-align:left;">'.$personName.'</th>
						</tr>
						<tr>
							<td style="width:100px;">Email</td>
							<th style="text-align:left;">'.$personEmail.'</th>
						</tr>
						<tr>
							<td style="width:100px;">Phone</td>
							<th style="text-align:left;">'.$personPhone.'</th>
						</tr>
					</table>
					<p><br/><b>Message :</b><br/>'.$personMessage.'<br/></p>
					<p><br/><br/>Regards,
					<br/><strong><span style="color:#442076; font-family:arial;">WebAdmin </span>
					<br/> <span style="color:#442076; font-family:arial;">BEYOND CORPORATION</span></strong>
					<br/><span style="color:#222; font-family:arial;">www.beyondcorporation.com </span></p>
			</body>
		</html>';
		
	 $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	 $headers .= 'From: Beyond Corporation <contact@beyondcorporation.com/>' . "\r\n";
	 $responses = array();
		for ($i = 0; $i < 1; $i++) {
					 //send email
					 mail($admin_email,$subjectAdmin,$messageToAdmin,$headers);
					 mail($personEmail,$subject,$message,$headers);
					 //Email response
					 $responses = "1";
					 
					 // set path and name of log file (optional)
					//$log->lfile('contact_log.html');
					// write message to the log file
					 /*?>$log->lwrite('
					<table>
						<tr>
							<td><strong style="color:#EF4A52;">Name</strong></td>
							<td>'.$personName.'</td>
						</tr>
						
						<tr>
							<td><strong style="color:#EF4A52;">Email </strong></td>
							<td>'.$personEmail.'</td>
						</tr>
						
						<tr>
							<td><strong style="color:#EF4A52;">Phone </strong></td>
							<td>'.$personPhone.'</td>
						</tr>
						<tr>
							<td><strong style="color:#EF4A52;">Message </strong></td>
							<td>'.$personMessage.'</td>
						</tr>
					</table>
						');
					// close log file
					$log->lclose();<?php */
			}
		echo $responses;

}	

?>