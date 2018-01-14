<h3> Tes articles en attentes de publications :</h3>

<section class="enfantRead">

	<div>
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
$urlArticle = $this->generateUrl("article",["brouillon" => "$statut"]);
if ($compteur < 4){	
echo
<<<CODEHTML
<a href="$urlArticle"><article id="articleEnfant" class="$compteur">
		<h3>$titre</h3>
		<hr>
		<img src="$chemin_image"/>
		<p>écrit par $membre</p>
		<p>$statut</p>
	</article></a>
CODEHTML;
	}
}
?>
	</div>
</section>