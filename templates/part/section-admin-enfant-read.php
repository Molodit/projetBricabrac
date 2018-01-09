<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

	<h3> Les derniers articles :</h3>
<section class="read">

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\MonArticle::class);

$tabResultat = $objetRepository->trouverArticleUser($objetConnection);
$compteur = 0;

foreach($tabResultat as $tabLigne)
{
$compteur++;
extract($tabLigne);

$htmlImage = "";
    if ($chemin_image)
    {
        $htmlImage = 
<<<CODEHTML
    <img src="$chemin_image" alt="photo"/>
CODEHTML;
}

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$urlArticle = $this->generateUrl("article",["id_article" => "$idArticle"]);
if ($compteur < 4){	
echo
<<<CODEHTML

<div class="cercle-container container">

	<div class="cercle-link cercle$compteur">
		<div class="cercle-content" >
			<article class="articleBalle">
				<a href="$urlArticle"><h3>$titre</h3></a>
				<img src="$chemin_image"/>
				<p>écrit par $membre</p>
			</article>
		</div>
	</div>
</div>
CODEHTML;
	}
}
?>

</section>