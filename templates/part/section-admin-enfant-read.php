<?php
$verifMembre = $objetSession->get("membre");


?>
 <h2>BIENVENUE <?php echo $verifMembre ?></h2>

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
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
    $idArticle        = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre            = $objetArticle->getTitre();
    $motCle           = $objetArticle->getMotCle();
    $rubrique         = $objetArticle->getRubrique();
    $contenu          = $objetArticle->getContenu();
    $cheminImage      = $objetArticle->getCheminImage();
    $datePublication  = $objetArticle->getDatePublication("d/m/Y H:i:s");
    $dateModification = $objetArticle->getDateModification("d/m/Y H:i:s");
    
    // On ne prend que les 100 premiers caractères du texte de $contenu
    $contenu = mb_strimwidth($contenu, 0, 100, '...');
    // S'il y a une image
    $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
<<<CODEHTML

    <img src="$cheminImage" title="$cheminImage">
CODEHTML;
   
    }
    // $urlCategorie = "#";
    // if ($categorie)
    // {
    //     // POUR CONSTRUIRE UNE URL POUR UNE ROUTE DYNAMIQUE
    //     // IL FAUT FOURNIR LA VALEUR DU PARAMETRE DANS L'URL
    //     //      * @Route("categorie/{cat}", name="categorie")
    //     $urlCategorie = $this->generateUrl("categorie", [ "cat" => $categorie ]);
    // }
    
   // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
   $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle, "id_membre" => $idMembre ]);
    
    echo
<<<CODEHTML

<div class="circles-container no-padding container">

	<div class="circle-link circle1">
		<div class="circle-content" >
    		<a href="#" target="_blank">
        	<div class="article">
				<article>
		             <h2>$titre</h2>
		             <p>$contenu</p>
		             <img src="$htmlImage" title="$htmlImage">         
		        </article>
	        </div>
        	</a>
        </div>
    </div>
 
	<div class="circle-link circle2 col-sm-3">
		<div class="circle-content">
			<a href="#" target="_blank">
			<div class="article">
				<article>
 				<h2>$titre</h2>
 				<p>$contenu</p>
 				<img src="$htmlImage" title="$htmlImage">         
				</article>
			</div>
			</a>
		</div>
	</div>
    
  
	<div class="circle-link circle3 col-sm-2">
		<div class="circle-content" >
			<a href="#" target="_blank">
			<div>
				<article>
				<h2>$titre</h2>
 				<p>$contenu</p>
 				<img src="$htmlImage" title="$htmlImage"> 
				</article>
			</div>
			</a>
		</div>
	</div>

	<div class="circle-link circle4 col-sm-4">
		<div class="circle-content" >
			<a href="#" target="_blank">
			<div>
				<article>
				<h2>$titre</h2>
 				<p>$contenu</p>
 				<img src="$htmlImage" title="$htmlImage"> 
				</article>
			</div>
			</a>
		</div>
	</div>

	<div class="circle-link circle5 col-sm-3">
		<div class="circle-content" >
			<a href="#" target="_blank">
			<div>
				<article>
				<h2>$titre</h2>
 				<p>$contenu</p>
 				<img src="$htmlImage" title="$htmlImage"> 
				</article>
			</div>
			</a>
		</div>
	</div>

	<div class="circle-link circle6 col-sm-3">
		<div class="circle-content" >
			<a href="#" target="_blank">
			<div>
				<article>
				<h2>$titre</h2>
 				<p>$contenu</p>
 				<img src="$htmlImage" title="$htmlImage"> 
				</article>
			</div>
			</a>
		</div>
	</div>
</div>
CODEHTML;
}

?>

 </section>