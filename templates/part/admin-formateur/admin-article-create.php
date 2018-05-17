<section class="formulaireAdmin" id="article-create">
    <h3>Écrire un nouvel article</h3>
    <hr>


    <!-- BARRE DE RECHERCHE PAR MOT CLES -->
    <!-- <form method="POST" id="recherche">
    <input type="text" name="mot-cles" required placeholder="Recherche par mot clés"/>
    <button>RECHERCHER</button>
    <input type="hidden" name="codebarre" value="mot-cles">
      <div class="response">
      </div>
    </form> -->

        <!-- NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
        <!-- method="POST" enctype="multipart/form-data" -->
          <!-- Formulaire de création d'un l'article -->

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
        <input type="hidden" name="cheminImage">
            <div id="filelist"></div>
          
               <!-- Eléments d'initialisation du widget plupload pour uploader plusieurs images ou PDF dans l'article -->
              <pre id="console"></pre>

              <div id="uploader">
                  <!-- Message en cas d'erreur -->
                  <p>Le navigateur ne supporte pas Flash, Silverlight ou HTML5.</p>
              </div>

        <!-- Trois boutons pour donner la possibilité de publier, d'enregistrer en brouillon ou d'annuler -->
        <button type="submit" name="statut" value="publie">Publier</button>
        <button type="submit" name="statut" value="brouillon">Enregistrer</button>
        <button type="reset" value="annuler" onclick="window.location.reload(true)">Annuler</button>
        <input type="hidden" name="codebarre" value="article">
        <div class="response">
        
         
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "article")
{
  $objetFormArticle = new App\Controller\FormArticle;
  $objetEntityManager = $this->getDoctrine()->getManager();
  $objetFormArticle->creer($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
  
}
?>
        </div>
    </form>


    
</section>