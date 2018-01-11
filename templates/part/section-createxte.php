

<section class=createxte>

    <h3>CREATEXTE</h3> 

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $createxte

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);

// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([ "rubrique" => "CreaTexte" ], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $idArticle       = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre           = $objetArticle->getTitre();
    $contenu         = $objetArticle->getContenu();
    $rubrique        = $objetArticle->getRubrique();
    $motCle          = $objetArticle->getMotCle();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y");
    
    
     $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
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

     <article class="article-createxte">
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div>$rubrique</div>
        <p>$contenu $datePublication</p>
        <h4 title=$htmlFile <a href="$urlAccueil/$cheminImage" target="_blank"> PDF</a></h4>
        <div>$htmlFile</div>
        <td>$pseudo</td>
      

    </article>
    
CODEHTML;
    
}

?>


</section>