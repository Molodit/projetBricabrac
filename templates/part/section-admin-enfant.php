<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

 <?php

//J'appelle la section read
require_once("$cheminPart/section-admin-enfant-read.php");

?>




<section>
    <h3>Ecrire un nouvel article</h3>
    <!-- NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
    <!-- method="POST" enctype="multipart/form-data" -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="titre">
        <input type="text" name="mot_cle" required placeholder="mot-clé">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CréaTexte">Créatexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"></textarea>
        <input type="file" name="cheminImage" placeholder="insérer une image">
        <button type="submit">Publier l'article</button>
        <input type="hidden" name="codebarre" value="article">
        <div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "article")
{
     $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->creer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
    // https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->creerPersistence($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
?>
        </div>
    </form>
    
    
</section>


