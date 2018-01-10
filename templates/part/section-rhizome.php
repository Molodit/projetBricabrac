

<section class="rhizome">

    <h3>LISTE DES ARTICLES DE RHIZOME</h3> 

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $createxte

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);


// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([ "rubrique" => "Rhizome" ], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $idArticle       = $objetArticle->getIdArticle();
    $titre           = $objetArticle->getTitre();
    $contenu         = $objetArticle->getContenu();
    $rubrique        = $objetArticle->getRubrique();
    $motCle          = $objetArticle->getMotCle();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");
    
    
    $htmlFile = "";
    // S'il y a un fichier (image ou pdf)
    if ($cheminImage)
    {
        $objetExtension = new SplFileInfo($cheminImage);
        $extension = $objetExtension->getExtension();

        // Si le fichier est un pdf
        if ($extension == "pdf")
    {
        $htmlFile = 
<<<CODEHTML
        <iframe src="$urlAccueil/$cheminImage"></iframe>
CODEHTML;
    }

    else {
        $htmlFile = 
<<<CODEHTML
    
        <img src="$urlAccueil/$cheminImage" title="$cheminImage">
CODEHTML;
        }
    
  }
?>
<?php

$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

$nbLigne =  $objetRepository->compterLigneArticle($objetConnection);

//$nbArticle = compterArticle("article");
echo "IL Y A $nbLigne ARTICLES";

$numeroPage     = 1;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["numeroPage"]))
{
    $numeroPage = intval($_REQUEST["numeroPage"]);
}

// JE VEUX AFFICHER 10 articles PAR PAGE
$nbArticleParPage = 10;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["nbArticleParPage"]))
{
    $nbArticleParPage = intval($_REQUEST["nbArticleParPage"]);
}

$nbPage         = ceil($nbLigne / $nbArticleParPage);
$indiceDepart   = ($numeroPage -1) * $nbArticleParPage;

?>

    <nav>
        <ul>
<?php        

for($p=1; $p <= $nbPage; $p++)
{
    echo
<<<CODEHTML
        <li><a href="?numeroPage=$p&nbArticleParPage=$nbArticleParPage">PAGE $p</a></li>
        
CODEHTML;

}
?>
        </ul>
    </nav>

<?php
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    echo
<<<CODEHTML

    <article class="article-rhizome">
   
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div>$rubrique</div>
        <p>$contenu</p>
        <p> $datePublication</p>
        <div >$htmlFile</div>
      
    </article>
    
CODEHTML;
    
}

?>

</section>