	<h3> Tes articles en attentes de publications :</h3>
<section class="enfantRead">

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
<div class="articleEnfant">
	<article class="$compteur">
		<a href="$urlArticle"><h3>$titre</h3></a>
		<img src="$chemin_image"/>
		<p>écrit par $membre</p>
	</article>
</div>
CODEHTML;
	}
}
?>

</section>