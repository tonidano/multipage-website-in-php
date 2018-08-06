<div class="container-fluid formContainer">

    <div class="row">

        <div class="col-xs-12 col-md-8 offset-2">
            <h2>Contactez-nous</h2>
              <form action="mail.php" method="post" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0"><h6>Titre</h6></legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="titre" id="madameForm" value="Mme" checked>
                                <label class="form-check-label" for="madameForm">
                                Mme
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="titre" id="melleForm" value="Melle">
                                <label class="form-check-label" for="melleForm">
                                Melle
                                </label>
                            </div>
                            <div class="form-check form-check-inline disabled">
                                <input class="form-check-input" type="radio" name="titre" id="mrForm" value="Mr">
                                <label class="form-check-label" for="mrForm">
                                Mr
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="nomForm" class="col-sm-2 col-form-label"><h6>Nom</h6></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" id="nomForm" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenomForm" class="col-sm-2 col-form-label"><h6>Prénom</h6></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prenom" id="prenomForm" placeholder="Prénom">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailForm" class="col-sm-2 col-form-label"><h6>Email</h6> </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="emailForm" placeholder="Email">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0"><h6>Objet du message</h6> </legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <select class="form-check-input" name="objetSelect">
                                    <option selected>Choisissez...</option>
                                    <option value="1">Demande d'informations</option>
                                    <option value="2">Autre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="messageForm" class="col-sm-2 col-form-label"><h6>Votre message</h6> </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="messageForm" name="message"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="documentForm" class="col-sm-2 col-form-label"><h6>Document</h6> </label>
                    <div class="col-sm-10">
                        <input type="file" name="fileToUpload" class="form-control" id="documentForm">
                        <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0"><h6>Format de réponse souhaité</h6> </legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="htmlForm" value="HTML" checked>
                                <label class="form-check-label" for="htmlForm">
                                HTML
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="texteForm" value="Texte">
                                <label class="form-check-label" for="texteForm">
                                Texte
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Contactez-moi</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
