<?php
$titre = $_POST['titre'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];

if(isset($_POST['email'])){
  $titre = isset($_POST['titre'])?$_POST['titre']:'';
  $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
	$nom = isset($_POST['nom'])?$_POST['nom']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';
  $message= isset($_POST['message'])?$_POST['message']:'';

}

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPmailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
// $mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom('antoni.dallenogare@gmail.com', 'Antoni');
$mail->addAddress('tonidano@live.be', 'Toni');
$mail->Subject  = 'First PHPMailer Message';
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Body='<html><body>';

$body = '<p>Bonjour ' .$titre. ' ' .$prenom. ' ' .$nom. ', <br />  Voici votre email :  ' .$email. '<br /> Votre message est le suivant : '.$message.'.</p>';
echo $body;
$mail->Body.='</body></html>';
$mail->MsgHTML($body);
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>

<?php include "formulaire.php" ?>
