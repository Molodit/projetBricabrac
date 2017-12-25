<?php

$verifPseudo = $objetSession->get("membre");

?>
<section>
    <h3>SECTION MEMBRE RIZHOME</h3>
    <h4>BIENVENUE <?php echo $verifAuteur ?></h4>
</section>

<?php if ($objetRequest->get("afficher", "") == "update") : ?>

<?php
// RECUPERER L'ID DE LA LIGNE A MODIFIER
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
$objetArticleUpdate = $objetRepository->find($idUpdate);

    if ($objetArticleUpdate) :

// OK ON A TROUVE UN ARTICLE POUR CET ID
$titre      = $objetArticleUpdate->getTitre();
$rubrique   = $objetArticleUpdate->getRubrique();
$motCle     = $objetArticleUpdate->getMotCle();
$contenu    = $objetArticleUpdate->getContenu();

?>
<section class="article container">
    <H3>UPDATE ARTICLE RIZHOME</H3>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="TITRE" value="<?php echo $titre ?>">
        <input type="text" name="rubrique" required placeholder="RUBRIQUE" value="<?php echo $rubrique ?>">
        <input type="text" name="motCle" required placeholder="MOT CLE" value="<?php echo $motCle ?>">
        <textarea id="editor1" type="text" name="contenu" required placeholder="CONTENU" rows="30"><?php echo $contenu ?></textarea>
        <input type="file" name="cheminImage">
        <button type="submit">MODIFIER ARTICLE</button>
        <input type="hidden" name="afficher" value="update">
        <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
        <input type="hidden" name="codebarre" value="update">
        <div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "update")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->update($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
}
?>
        </div>
    </form>
</section>
<?php endif; ?>

<?php else: ?>

<section class="article container">
			<h2>Merci POUR VOTRE ARTICLE</h2>
			
			<form method="POST" enctype="multipart/form-data">
				<input  type="text" name="titre" placeholder="Nom de l'Article">
				<input type="text" name="rubrique" maxlength="100" placeholder="Rubrique" required>
                <input type="text" name="motCle" maxlength="100" placeholder="Mot Cle" required>
				<input type="file" name="cheminImage">
				<textarea id="editor1" type="text" name="contenu" rows="10" cols="40" placeholder="Description"></textarea>
				<button class="submit" type="submit" name="button">Envoyer</button>
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

<?php endif; ?>


<?php 
// FAIRE LE TRAITEMENT DU FORMULAIRE AVANT DE FAIRE LE READ
if ($objetRequest->get("codebarre", "") == "delete")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
}

?>

            
 