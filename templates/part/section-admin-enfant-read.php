<h3> Tes articles en attente de publications :</h3>

<section class="enfantRead">

	<div>
<?php
	
// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\MonArticle::class);

$tabResultat = $objetRepository->trouverBrouillon($objetConnection);
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
<article id="articleEnfant" class="$compteur">
		<h3>$titre</h3>
		<hr>
		<img src="$chemin_image"/>
		<p>écrit par $membre</p>
		<td>
            <!-- ETAPE 1: AFFICHER LE FORMULAIRE POUR UN UPDATE -->
            <form method="GET" action="#section-update">
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="$idArticle">
				<button class="updateEnfant" type="submit">modifier</button>
				<input type="hidden" name="codebarre" value="update">
            </form>
        </td>
	</article>
CODEHTML;
	}
}
?>
	</div>
</section>