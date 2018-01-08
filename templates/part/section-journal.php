
<section class="journal">

        <h3>LISTE DES ARTICLES DE JOURNAL LA TANIERE</h3> 


<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $createxte

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

?>
    <div>
        <ul class="tabs">
                    
<?php

$tabResultat = $objetRepository->findBy([ "rubrique" => "Journal" ], [ "datePublication" => "DESC" ]);

foreach($tabResultat as $index =>$objetMenu)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $idArticle       = $objetMenu->getIdArticle();
    $titre           = $objetMenu->getTitre();


 if($index == 0){
   
echo
<<<CODEHTML
        <li class="active"><a href="#art$idArticle">$titre</a></li>
CODEHTML;

 } 
 else
 {
 
    
    echo
<<<CODEHTML
        <li><a href="#art$idArticle">$titre</a></li>
CODEHTML;

}


}
?>

        </ul>

<div class="tabs-content">

<?php
$tabResultat = $objetRepository->findBy([ "rubrique" => "Journal" ], [ "datePublication" => "DESC" ]);
// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $index => $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $idArticle       = $objetArticle->getIdArticle();
    $titre           = $objetArticle->getTitre();
    $contenu         = $objetArticle->getContenu();
    $rubrique        = $objetArticle->getRubrique();
    $motCle          = $objetArticle->getMotCle();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");
    
    $classActive = "";
    if ($index == 0) {
        $classActive = 'class="article-journal tab-content active"';
    }

    else {
        $classActive = 'class="article-journal tab-content"';
    }


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
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    echo
<<<CODEHTML

    <article $classActive id="art$idArticle">
    
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div>$rubrique</div>
        <p>$contenu $datePublication</p>
        <div >$htmlFile</div>
    </article>
    
CODEHTML;
    
}

?>


</div>
</div>
</section>

