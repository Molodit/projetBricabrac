<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

	<h3> Mes Articles :</h3>
<section>

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\MonArticle::class);

$tabResultat = $objetRepository->trouverArticleUser($objetConnection); 
// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([],["idArticle" => "DESC"]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{

	$idArticle        = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre            = $objetArticle->getTitre();
    $contenu          = $objetArticle->getContenu();
    $cheminImage      = $objetArticle->getCheminImage();
    $datePublication  = $objetArticle->getDatePublication("d/m/Y H:i:s");



	$contenu = mb_strimwidth($contenu, 0, 100, '...');

	extract($tabResultat);

    // S'il y a une image
    $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
<<<CODEHTML
    <img src="$cheminImage" title="$cheminImage"/>
CODEHTML;
	
	// CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
	$urlArticle = $this->generateUrl("article", ["id_article"=> $idArticle]);

	echo
	<<<CODEHTML
	<div class="circle-link circle1">
		<div class="circle-content">
         	<div class="article">
				<article>
					<a href="$$urlArticle" target="_blank"><h2>$titre</h2></a>
		            <img src="$htmlImage" title="$htmlImage"/>         
		        </article>
	        </div>
        </div>
	</div>
	</div>
CODEHTML;
	}
}

?>

</section>