<section class="motCle">

    <h3>LISTE DES ARTICLES PAR MOT CLE</h3> 

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LES MOTS CLES $motCle

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);


// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([ "motCle" => $mot_cle ], [ "datePublication" => "DESC" ]);


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
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    echo
<<<CODEHTML

    <article class="article-motCle">
   
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div>$mot_cle</div>
        <p>$contenu</p>
        <p> $datePublication</p>
        <div >$htmlFile</div>
      
    </article>
    
CODEHTML;
    
}

?>


</section>


