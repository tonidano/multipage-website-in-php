<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <form action="mail.php" method="post" enctype="multipart/form-data">
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
          <select name="message">
            <option value="informations">Informations</option>
            <option value="réclamation">Réclamation</option>
            <option value="evenement">Evénements</option>
            <option value="autre">Autre</option>
          </select>
      </div>
    <p>  <label for="">Votre message
    <input type="textarea" name="message" value="message">
      </label></p>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Envoyer" name="submit">



      <!-- <label for="">Documents
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input type="file" name="fichier" id=fichier />
        <input type="submit" name="submit" value="Envoyer" />
      </label> -->

    <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /> -->
    <!-- <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
  </form> -->

      <p> <label for="">Format de réponse
      <input type="radio" name="choix" value="HTML">HTML
      <input type="radio" name="choix" value="Texte">Texte

        </label></p>
        <!-- <button type="submit" name="envoyer">Envoyer</button> -->
    </form>


  </body>
</html>
