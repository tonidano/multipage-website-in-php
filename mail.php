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
?>
<?php
$titre = $_POST['titre'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];
$image = '<img src="./assets/files/%20'. ( $_FILES["fileToUpload"]["name"]).'" />';

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

$body = '<p>Bonjour ' .$titre. ' ' .$prenom. ' ' .$nom. ', <br />  Voici votre email :  ' .$email. '<br /> Votre message est le suivant : '.$message.'.<br /> Votre image : '.$image.' </p>';
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
