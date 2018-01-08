<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

	<h3> Mes Articles :</h3>
	
<section>

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\MonArticle::class);

$tabResultat = $objetRepository->trouverArticleUserLimit($objetConnection); 
// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([],["idMembre" => "DESC"]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{

	$idArticle        = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
	$titre            = $objetArticle->getTitre();
	$rubrique         = $objetArticle->getRubrique();
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
    <section id="admin-enfant">
    <div class="circle-content">
        <div class="circle1">
            <article>
            <a href="$urlArticle"><h3>$titre</h3></a>
            <img src="$cheminImage"/>
            </article>
        </div>
	</div>
	</section>
CODEHTML;
	}
}

?>

</section>