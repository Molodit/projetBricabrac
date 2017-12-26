

<section class="ecrire container">
	 <article>
			<h2>Ecrire un nouvel article</h2>
			
			<form id="form" method="POST" enctype="multipart/form-data">
				<input  type="text" name="titre" placeholder="Titre de l'article">
				<input type="text" name="rubrique" maxlength="100" placeholder="Rubrique" required>
                <input type="text" name="motCle" maxlength="80" placeholder="Mot Cle" required>
                <label for="file" class="label-file">Choisir une image</label>
				<input id="file" class="input-file" type="file"  name="cheminImage">
				<textarea id="editor1" type="text" name="contenu" rows="10" cols="40" placeholder="Description"></textarea>
				<button class="submit" type="submit" name="button">Envoyer</button>
				<input type="hidden" name="codebarre" value="Article">
			<div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "Article")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->creer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
}
?>
        </div>
    </form>
  </article>  
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

<div class="bgimg-3">
</div>