<link rel="stylesheet" type="text/css" href="assets/js/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css"/>
         <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
         <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="assets/js/plupload/jquery.ui.plupload/jquery.ui.plupload.min.js"></script>
<script type="text/javascript" src="assets/js/plupload/i18n/fr.js"></script>



<section class="formulaireAdmin" id="section-update">

<?php

// RECUPERER L'ID DE LA LIGNE A MODIFIER
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
$objetArticleUpdate = $objetRepository->find($idUpdate);

            if ($objetArticleUpdate) {

// OK ON A TROUVE UN ARTICLE POUR CET ID
                $titre      = $objetArticleUpdate->getTitre();
                $contenu    = $objetArticleUpdate->getContenu();
                $motCle     = $objetArticleUpdate->getMotCle();
                $rubrique   = $objetArticleUpdate->getRubrique();
                $objetImage = $objetArticleUpdate->getImages();
                $htmlFile = "";

                if ($objetImage) {
                    foreach ($objetImage as $image) {
                        $idImage = $image->getIdImage();
                        $cheminImage = $image->getCheminImage();
                        $htmlFile .= 
                        <<<CODEHTML
                        
                        <input type="checkbox" name="chemin_image[]" value="$idImage" checked="checked">
                        <img src="$urlAccueil$cheminImage" alt="photo de l'article">
CODEHTML;
                    }
                }
                
            }
            
            ?>
            
            <H3>Modifier l'article <?php echo "'$titre'" ?></H3>
            <hr>
            <form method="POST" enctype="multipart/form-data" class="formAdmin" action="<?php echo $urlAdmin ?>">
            <label for="titre">Titre</label>
            <input type="text" name="titre" required placeholder="Titre" value="<?php echo $titre ?>">
            <label for="mot_cle">Mot-clé</label>
            <input type="text" name="mot_cle" required placeholder="Mots-clés" value="<?php echo $motCle ?>">
            <label for="rubrique">Rubrique</label>
            <select name="rubrique" required>
            <option value="">-- Choisissez une rubrique --</option>
            <option value="Rhizome">Rhizome</option>
            <option value="CreaTexte">CréaTexte</option>
            <option value="Journal">Journal La Tanière</option>
            </select>
            <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"><?php echo $contenu ?></textarea>
            <div>
                <label for="chemin_image">Images de l'article. Décochez pour les supprimer de l'article</label>
            </div>
            <br>
            <?php echo $htmlFile ?>
            <div id="filelist"></div>
              <br />
              
              <br />
              <pre id="console"></pre>

              <div id="uploader">
                  <p>Le navigateur ne supporte pas Flash, Silverlight ou HTML5.</p>
              </div>

        <!-- Deux boutons pour donner la possibilité d'enregistrer en brouillon -->
        <button type="submit" name="statut" value="brouillon">Modifier et enregistrer</button>
        <button type="submit" name="statut" value="publie">Modifier et publier l'article</button>
        <input type="hidden" name="afficher" value="">
        <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
        <input type="hidden" name="codebarre" value="updateArticle">
        <div class="response">



<?php echo $messageUpdate ?>
        </div>
    </form>
    </section>
          

    <script type="text/javascript">
  
// Initialize the widget when the DOM is ready
$(function() {
    $("#uploader").plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "../assets/upload/upload.php",
       
 
        // Maximum file size
        max_file_size : '2mb',

        
        

        // Specify what files to browse for
        filters : [
            {title : "Image files", extensions : "jpg,gif,png,jpeg"},
            {title : "Zip files", extensions : "zip,avi"},
            {title : "PDF files", extensions : "pdf"},
            
        ],
 
        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,

        prevent_duplicates: true,
 
        // Views to activate
        views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs',
        },
        autostart: true,
 
        // Flash settings
        flash_swf_url : '/plupload/js/Moxie.swf',
     
        // Silverlight settings
        silverlight_xap_url : '/plupload/js/Moxie.xap'


        
    });
    // A l'envoi du formulaire, récupère les valeurs des inputs images générés pas plupload 
    // et les concatènent dans cheminImage séparés par une virgule

    $('form.formAdmin').on('submit', function () {
  
      var cheminImage = $("input[name=cheminImage]").val();
      var inputName = $( "input[name*='_name']" );
  
      inputName.each(function(){
         cheminImage += 'assets/upload/' + $(this).val() + ',';
        
      })
     
    $("input[name=cheminImage]").val(cheminImage);
          });
   
});

</script>
    
