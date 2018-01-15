<section class="formulaireAdmin" id="article-create">
    <h3>Ecrire un nouvel article</h3>
    <hr>
    <!-- NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
    <!-- method="POST" enctype="multipart/form-data" -->
    <form method="POST" enctype="multipart/form-data" class="formAdmin">
        <input type="text" name="titre" required placeholder="Titre">
        <input type="text" name="mot_cle" required placeholder="Mot-clé">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CreaTexte">CréaTexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="Votre texte" rows="30"></textarea>
        <input type="file" name="cheminImage" placeholder="Insérer une image">
        <!-- Deux boutons pour donner la possibilité d'enregistrer en brouillon -->
        <button type="submit" name="statut" value="publie">Publier l'article</button>
        <button type="submit" name="statut" value="brouillon">Enregistrer l'article</button>
        <input type="hidden" name="codebarre" value="article">
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