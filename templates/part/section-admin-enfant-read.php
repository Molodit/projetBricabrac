<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

	<h3> Mes Articles :</h3>
<section>

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
	$idArticle        = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre            = $objetArticle->getTitre();
    $motCle           = $objetArticle->getMotCle();
    $rubrique         = $objetArticle->getRubrique();
    $contenu          = $objetArticle->getContenu();
    $cheminImage      = $objetArticle->getCheminImage();
    $datePublication  = $objetArticle->getDatePublication("d/m/Y H:i:s");
    $dateModification = $objetArticle->getDateModification("d/m/Y H:i:s");

	$contenu = mb_strimwidth($contenu, 0, 100, '...');
    // S'il y a une image
    $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
    <<<CODEHTML

    <img src="$cheminImage" title="$cheminImage">
CODEHTML;
	
	// CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
	$urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle, "id_membre" => $idMembre ]);
    
    echo
<<<CODEHTML
<section id="balle">
	<div class="circle-link circle1">
		<div class="circle-content" >
         	<div class="article">
				<article>
					<a href="$urlArticle" target="_blank"><h2>$titre</h2></a>
		            <img src="$htmlImage" title="$htmlImage"/>         
		        </article>
	        </div>
        </div>
    </div>
	
</section>
CODEHTML;
	}
}
/*<div class="circle-link circle2 col-sm-3">
		<div class="circle-content">
			<div class="article">
				<article>
					<a href="$urlArticle" target="_blank"><h2>$titre</h2></a>
					<img src="$htmlImage" title="$htmlImage"/>         
				</article>
			</div>
		</div>
	</div>
	<div class="circle-link circle3 col-sm-2">
		<div class="circle-content">
			
			<div>
				<article>
					<a href="$urlArticle" target="_blank"><h2>$titre</h2></a>
					<img src="$htmlImage" title="$htmlImage"/> 
				</article>
			</div>
		</div>
	</div>*/
?>

</section>