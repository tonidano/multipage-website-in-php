<?php
$foo = new Upload($_FILES['fichier']);
if ($foo->uploaded) {
   // save uploaded image with no changes
   $foo->Process('/home/user/files/');
   if ($foo->processed) {
     echo 'original image copied';
   } else {
     echo 'error : ' . $foo->error;
   }
   // save uploaded image with a new name
   $foo->file_new_name_body = 'foo';
   $foo->Process('/home/user/files/');
   if ($foo->processed) {
     echo 'image renamed "foo" copied';
   } else {
     echo 'error : ' . $foo->error;
   }
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = 'image_resized';
   $foo->image_resize = true;
   $foo->image_convert = gif;
   $foo->image_x = 100;
   $foo->image_ratio_y = true;
   $foo->Process('/home/user/files/');
   if ($foo->processed) {
     echo 'image renamed, resized x=100
           and converted to GIF';
     $foo->Clean();
   } else {
     echo 'error : ' . $foo->error;
   }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include "head.php" ?>

  </head>
  <body>

    <?php include "header.php" ?>
    <div class="row">


<div class="col-md-4">
</div>
<div class="col-md-4">
  <h3>Contact</h3>

  <form action="formulaire.php" method="post">
  <p> <label for="">
  <input type="radio" name="titre" value="Mme">Mme
  <input type="radio" name="titre" value="Melle">Melle
  <input type="radio" name="titre" value="Mr">Mr
    </label></p>
  <p>  <label for="">Prénom
  <input type="text" name="prenom" value="prenom">
    </label></p>
  <p>  <label for="">Nom
  <input type="text" name="nom" value="nom">
    </label></p>
  <p>  <label for="">Email
  <input type="text" name="email" value="email">
    </label></p>

    <div class="form-group">
        <label for="message">Objet du message</label>
        <select id="message" name="message">
          <option value="reservation">Réservation</option>
          <option value="réclamation">Réclamation</option>
          <option value="evenement">Evénements</option>
          <option value="autre">Autre</option>
        </select>
    </div>
  <p>  <label for="">Votre message
  <input type="textarea" name="message" value="message">
    </label></p>

    <label for="">Documents
      <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
      <input type="file" name="fichier" id=fichier />
      <input type="submit" name="submit" value="Envoyer" />
    </label>

    <p> <label for="">Format de réponse
    <input type="radio" name="choix" value="HTML">HTML
    <input type="radio" name="choix" value="Texte">Texte

      </label></p>
      <button type="sumit" name="envoyer">Envoyer</button>
  </form>
</div>
<div class="col-md-4">

</div>
  </div>

  </body>
</html>
