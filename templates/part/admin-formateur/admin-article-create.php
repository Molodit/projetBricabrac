<!-- Scripts JS et CSS pour initialiser Plupload WidgetUI avec jQuery et jQuery UI -->

<link rel="stylesheet" type="text/css" href="assets/js/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css"/>
         <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
         <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="assets/js/plupload/jquery.ui.plupload/jquery.ui.plupload.min.js"></script>
<script type="text/javascript" src="assets/js/plupload/i18n/fr.js"></script>

<section class="formulaireAdmin" id="article-create">
    <h3>Ecrire un nouvel article</h3>
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
    <form method="POST" enctype="multipart/form-data" class="formAdmin">
        <input type="text" name="titre" required placeholder="Titre">
        <input type="text" name="mot_cle" required placeholder="Mot-clé">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CreaTexte">CréaTexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea type="text" name="contenu" required placeholder="Votre texte" rows="30"></textarea>
        <input type="hidden" name="cheminImage">
            <div id="filelist"></div>
              <br />
              
              <br />
              <pre id="console"></pre>

              <div id="uploader">
                  <p>Le navigateur ne supporte pas Flash, Silverlight ou HTML5.</p>
              </div>

        <!-- Deux boutons pour donner la possibilité d'enregistrer en brouillon -->
        <button type="submit" name="statut" value="publie">Publier l'article</button>
        <button type="submit" name="statut" value="brouillon">Enregistrer comme brouillon</button>
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

<script type="text/javascript">
  
    //Plupload Widget UI
  // Initialize the widget when the DOM is ready
  $(function() {
      $("#uploader").plupload({
          // General settings
          runtimes : 'html5,flash,silverlight,html4',
          url : "../assets/upload/upload.php",
         
   
          // Maximum file size
          max_file_size : '15mb',
  
         // buttons: {browse: false, start: false, stop: false},
          
  
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


    
</section>