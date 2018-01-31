<?php
$verifMembre = $objetSession->get("membre");

?>
 
<section id="formulaireEnfant">

<h2>BIENVENUE <?php echo $verifMembre ?></h2>

    <h3>Ecrire un nouvel article</h3>
    
 <hr>    


  <!-- BARRE DE RECHERCHE PAR MOT CLES -->
    <form method="POST" class="recherche">
    <input type="text" name="mot-cles" required placeholder="Recherche par mot clés"/>
    <button type="submit"> RECHERHCER </button>
    <input type="hidden" name="codebarre" value="mot-cles">
        <div class="response">
        </div>
    </form>

    <!--  NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
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
    <input type="hidden" name="cheminImage">
        <!-- Deux boutons pour donner la possibilité d'enregistrer en brouillon -->
        <div id="filelist"></div>
                <br />
                
                <div id="container">
                    <a id="pickfiles" href="javascript:;">[Select files]</a> 
                    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
                </div>
                
                <br />
                <pre id="console"></pre>
        <button type="submit" name="statut" value="publie">Publier l'article</button>
        <button type="submit" name="statut" value="brouillon">Enregistrer comme brouillon</button>
        <input type="hidden" name="codebarre" value="article">
        <div class="response">
        
<script type="text/javascript">
 
var uploader = new plupload.Uploader({
  runtimes : 'html5,flash,silverlight,html4',
  browse_button : 'pickfiles',
  container: document.getElementById('container'), 
  url : "../assets/upload/upload.php",

  
  filters : {
    max_file_size : '10mb',
    mime_types: [
      {title : "Image files", extensions : "jpg,gif,png,jpeg"},
      {title : "Zip files", extensions : "zip"}
    ]
  },
  init: {
    PostInit: function() {
      document.getElementById('filelist').innerHTML = '';
      document.getElementById('uploadfiles').onclick = function() {
        uploader.start();
        return false;
      };
    },
    FilesAdded: function(up, files) {
      plupload.each(files, function(file) {
          document.querySelector("input[name=cheminImage]").value += file.name + ",";
        document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
      });
    },
    UploadProgress: function(up, file) {
      document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
    },
    Error: function(up, err) {
      document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
    }
  }
});
uploader.init();

          
          
</script>         
    
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
