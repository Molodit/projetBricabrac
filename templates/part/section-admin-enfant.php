<?php
$verifMembre = $objetSession->get("membre");

?>
 

 

<section id="formulaireEnfant">

<h2>BIENVENUE <?php echo $verifMembre ?></h2>

    <h3>Ecrire un nouvel article</h3>
    
 <hr>    

    <!-- NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
    <!-- method="POST" enctype="multipart/form-data" -->
    <form method="POST" enctype="multipart/form-data" class="formEnfant">
        <input type="text" name="titre" required placeholder="titre">
        <input type="text" name="mot_cle" required placeholder="mot-clé">
        <select name="rubrique" required>
            <option value="">-- Choisissez une rubrique --</option>
            <option value="Rhizome">Rhizome</option>
            <option value="CréaTexte">Créatexte</option>
            <option value="Journal">Journal La Tanière</option>
        </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30">    
        </textarea>
        <input type="file" name="cheminImage" placeholder="insérer une image">
        <button type="submit">Publier l'article</button>
        <button type="submit">Enregistrer en brouillon</button>
        <input type="hidden" name="statut" value="brouillon">
        <input type="hidden" name="statut" value="article">
        <div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "article")
{
     $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->creer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);


}
?>
        </div>
    </form>
    
    
</section>
<hr>
<?php
//J'appelle la section read
require_once("$cheminPart/section-admin-enfant-read.php");

?>



