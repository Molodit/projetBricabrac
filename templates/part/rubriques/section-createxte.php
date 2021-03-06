

<section class="createxte">

    <h2>Les articles de la rubrique « Créatexte »</h2> 
<?php

$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

$nbLigne =  $objetRepository->compterLigneArticle($objetConnection, "CreaTexte" );

//$nbArticle = compterArticle("article");
//echo "IL Y A $nbLigne ARTICLES";

$numeroPage     = 1;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["numeroPage"]))
{
    $numeroPage = intval($_REQUEST["numeroPage"]);
}

// JE VEUX AFFICHER 6 articles PAR PAGE
$nbArticleParPage = 6;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["nbArticleParPage"]))
{
    $nbArticleParPage = intval($_REQUEST["nbArticleParPage"]);
}

$nbPage         = ceil($nbLigne / $nbArticleParPage);
$indiceDepart   = ($numeroPage -1) * $nbArticleParPage;

?>

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $createxte

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
$objetRepositoryImages = $this->getDoctrine()->getRepository(App\Entity\Images::class);

// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy(
    [ "rubrique" => "CreaTexte", "statut" => "publie" ], 
    [ "datePublication" => "DESC" ],
    $nbArticleParPage,
    $indiceDepart);


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
    $datePublication = $objetArticle->getDatePublication("d/m/Y");
    
    
     $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }
    
    
    $htmlFile = "";

    // S'il y a un fichier (image ou pdf)
    $objetImage     = $objetArticle->getImages();
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    echo
<<<CODEHTML

     <article class="article-createxte">
     <div>
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <span>écrit par $pseudo, le $datePublication</span>
        <p>$contenu</p>
        <span>Mots-clés - $motCle</span>
       
      </div>

    
    
CODEHTML;

                    if ($objetImage)
                    {
                       

                        foreach ($objetImage as $image) {
                            $idImage = $image->getIdImage();
                            $cheminImage = $image->getCheminImage();
                            $objetExtension = new SplFileInfo($cheminImage);
                            $extension = $objetExtension->getExtension();
                       //     Si le fichier est un pdf
                            if ($extension == "pdf")
                        {
                            $htmlFile = 
                            <<<CODEHTML
                            <iframe src="$urlAccueil$cheminImage"></iframe><br><br>
                            <a href="{$urlAccueil}$cheminImage" target="_blank">Ouvrir le PDF dans une nouvelle fenêtre</a>
                            

CODEHTML;
   
                        }
    
                        else {
                            $htmlFile = 
                            <<<CODEHTML
                        
                            <img src="{$urlAccueil}$cheminImage" alt="$cheminImage">
CODEHTML;
                            }

                          
                          echo "<div>$htmlFile</div>";  

                        }

                    }
                else {
                    echo 
                <<<CODEHTML
                
                    <img src="{$urlAccueil}assets/img/logo.jpg" title="logo">
CODEHTML;
        }
        
        echo "</article>";
    

    
}
    


?>
<nav>
        <ul class="pages">Pages
<?php        

for($p=1; $p <= $nbPage; $p++)
{
    echo
<<<CODEHTML
        
        <li><a href="?numeroPage=$p&nbArticleParPage=$nbArticleParPage">$p</a></li>
        
CODEHTML;

}
?>
        </ul>
    </nav>


</section>