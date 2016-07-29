<?php
if(isset($_GET['s'])){
 $mailto=$_GET['n'];
$title="TEST";
$content="From:TESTING";
$headers = 'From: nuwanliza@gmail.com' . "\r\n" .'Reply-To: test@test.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
mail('nuwansuom@gmail.com', $subject, $message, $headers);
		
echo $mailto.$headers;
mail($mailto, $title, $content,$headers, '-fwebmaster@example.com');   
require_once "Mail.php";


 /*   IMAP Port: 143
    POP3 Port: 110

Outgoing Server: 	mail.ceevee.2lk.co

    SMTP Port: 26
*/

$host = "rs39.abstractdns.com";
 $username = "ceevee2lk@ceevee.2lk.co";
 $password = "MIL2015$";
 
 $from = "Sandra Sender <ceevee2lk@ceevee.2lk.co> ";
 $to = "Ramona Recipient <nuwansuom@gmail.com>";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 
 
 $port = "26";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 
 




}



?>

<html>
<head>
</head>

<body>
<form method="get" action="mai.php">
<input name="n" type="text" />

<input name="s" type="submit" value="submit" />
</form>

</body>







</html>