<?php

$verifPseudo = $objetSession->get("pseudo");

?>
<section>
    <h3>SECTION MEMBRE RIZHOME</h3>
    <h4>BIENVENUE <?php echo $verifPseudo ?></h4>
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
$rubrique  = $objetArticleUpdate->getRubrique();
$contenu    = $objetArticleUpdate->getContenu();

?>
<section class="article container">
    <H3>FORMULAIRE UPDATE article</H3>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="TITRE" value="<?php echo $titre ?>">
        <input type="text" name="rubrique" required placeholder="RUBRIQUE" value="<?php echo $rubrique ?>">
        <input type="text" name="mot_cle" required placeholder="MOT CLE" value="<?php echo $motCle ?>">
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
			<h2>Merci pour Produit!!!!!</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. .</p>
			
			<form method="POST" enctype="multipart/form-data">
				<input  type="text" name="titre" placeholder="Nom de Produit">
				<input type="text" name="categorie" maxlength="100" placeholder="CATEGORIE" required>
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

            
 <section class="balles">
        <h3>DERNIERS ARTICLES</h3>
        <table>
            <tbody>
            
<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
    $id              = $objetArticle->getId();
    $idUser          = $objetArticle->getIdUser();
    $titre           = $objetArticle->getTitre();
    $categorie       = $objetArticle->getCategorie();
    $contenu         = $objetArticle->getContenu();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");
    
    
     $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
<<<CODEHTML

    <img src="$cheminImage" title="$cheminImage">

CODEHTML;
    }
    
    // POUR CONSTRUIRE UNE URL POUR UNE ROUTE DYNAMIQUE
    // IL FAUT FOURNIR LA VALEUR DU PARAMETRE DANS L'URL
    //      * @Route("categorie/{cat}", name="categorie")
    $urlCategorie = $this->generateUrl("categorie", [ "cat" => $categorie ]);
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id" => $id ]);
    
    echo
<<<CODEHTML

    <tr>
        <td>$id</td>
        <td>$idUser</td>
        <td><a href="$urlArticle">$titre</a></td>
        <td><a href="$urlCategorie">$categorie</a></td>
        <td>$contenu</td>
        <td>$htmlImage</td>
        <td>$datePublication</td>
        <td>
            <form method="GET" action="">
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="$id">
                <button type="submit">update</button>
            </form>
        </td>
         <td>
            <form method="POST" action="">
                <input type="hidden" name="codebarre" value="delete">
                <input type="hidden" name="idDelete" value="$id">
                <button type="submit">supprimer</button>
            </form>
        </td>
    </tr>
    
CODEHTML;
    
}

?>
            </tbody>
        </table>


</section>