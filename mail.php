<!-- // Upload fichier // -->

<?php
$target_dir = 'C:\wamp\www\multipage-website-in-php\assets\files\ ';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Validation si conditions cochées

if (isset($_POST['conditions']))
{
    echo $_POST['conditions']; // Affiche : "on"
}
else
{
    echo 'Vous n\'avez pas coché la case.';
}
?>

<!-- // ecriture fichier txt // -->

<?php

$file = 'formulaire.txt';

$titre = $_POST['titre'].'';
$prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING).'';
$nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING).", \n";
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)."\n";
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING).". \n";



$texte = 'Bonjour ' .$titre. ' ' .$prenom. ' ' .$nom. 'Voici votre email :  ' .$email. 'Votre message est le suivant : '.$message.'Votre image : voir en fichier joint.';


file_put_contents($file, $texte, 0);
?>


<!-- // encodage image dans le mail// -->
<?php
$path = $_FILES["fileToUpload"]["tmp_name"];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<!-- <img src="<?php echo $base64 ?>"> -->

<!-- // envoie email // -->

<?php

$titre = $_POST['titre'];
$prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);
$image = '<img src="'.$base64.'">';


if(isset($_POST['email'])){
  $titre = isset($_POST['titre'])?$_POST['titre']:'';
  $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
	$nom = isset($_POST['nom'])?$_POST['nom']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';
  $message= isset($_POST['message'])?$_POST['message']:'';
  $conditions= isset($_POST['conditions'])?$_POST['conditions']:'';
}

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPmailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
include ('identifiants.php');
$mail->setFrom('antoni.dallenogare@gmail.com', 'Antoni');
$mail->addAddress('tonidano@live.be', 'Toni');
$mail->addAddress($email, $prenom);

$mail->Subject  = 'Vos réponses au formulaire';


if($_POST['choix'] == 'HTML'){
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Body='<html><body>';

  $body = '<p>Bonjour ' .$titre. ' ' .$prenom. ' ' .$nom. ', <br />  Voici votre email :  ' .$email. '<br /> Votre message est le suivant : '.$message.'.<br /> Votre image : <br />'.$image.' </p>';
            // echo $body;

  $mail->Body.='</body></html>';
}elseif ($_POST['choix'] == 'Texte') {
$mail->AddAttachment('./formulaire.txt', 'réponses');
$mail->AddAttachment($_FILES["fileToUpload"]["tmp_name"], 'image');
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Body='<html><body>';

$body = 'Vos réponses en fichier joint';
$mail->Body.='</body></html>';
}
$mail->MsgHTML($body);

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>

<?php include "contact.php" ?>
