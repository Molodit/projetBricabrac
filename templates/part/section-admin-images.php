<script type="text/javascript" src="assets/js/plupload.full.min.js"></script>

<section class="article container">
			<h2>Merci pour Produit!!!!!</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. .</p>
			
			<form method="POST" enctype="multipart/form-data">
				<input  type="text" name="titre" placeholder="Nom de Produit">
				<input type="text" name="categorie" maxlength="100" placeholder="CATEGORIE" required>
				<input type="hidden" name="cheminImage">
				<div id="filelist"></div>
                <br />
                
                <div id="container">
                    <a id="pickfiles" href="javascript:;">[Select files]</a> 
                    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
                </div>
                
                <br />
                <pre id="console"></pre>
				<textarea id="editor1" type="text" name="contenu" rows="10" cols="40" placeholder="Description"></textarea>
				<button class="submit" type="submit" name="button">Envoyer</button>
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
			{title : "Image files", extensions : "jpg,gif,png"},
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
    
    $objetFormArticle->creerDesImages($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
    // https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database
    //$objetEntityManager = $this->getDoctrine()->getManager();
    //$objetFormArticle->creerPersistence($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony);
}
?>
        </div>
    </form>
    
     <!-- https://sdk.ckeditor.com/samples/autogrow.html# -->
	<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'editor1', {
			extraPlugins: 'autogrow',
			autoGrow_minHeight: 200,
			autoGrow_maxHeight: 600,
			autoGrow_bottomSpace: 50,
			removePlugins: 'resize'
		} );
    </script>
    
</section>