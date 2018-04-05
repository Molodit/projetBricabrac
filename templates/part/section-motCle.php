<link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/flexslider.css"/>



<section class="motCle">

    <h3>DES ARTICLES DE <?php echo $mot_cle ?></h3>

    <?php

$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

$nbLigne =  $objetRepository->compterLigneMotCle($objetConnection, $mot_cle );

//$nbArticle = compterArticle("article");
//echo "IL Y A $nbLigne ARTICLES";

$numeroPage     = 1;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["numeroPage"]))
{
    $numeroPage = intval($_REQUEST["numeroPage"]);
}

// JE VEUX AFFICHER 6 articles PAR PAGE
$nbArticleParPage = 3;
// ON RECUPERE LE NUMERO DE PAGE DU PARAMETRE GET DANS L'URL
if (isset($_REQUEST["nbArticleParPage"]))
{
    $nbArticleParPage = intval($_REQUEST["nbArticleParPage"]);
}

$nbPage         = ceil($nbLigne / $nbArticleParPage);
$indiceDepart   = ($numeroPage -1) * $nbArticleParPage;

?> 



<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LES MOTS CLES $motCle

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
$objetRepositoryImages = $this->getDoctrine()->getRepository(App\Entity\Images::class);

// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy(
    [ "motCle" => $mot_cle, "statut" => "publie" ], 
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
    
    <article class="article-rhizome">
    
    <div>
    
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <p>$rubrique<p>
        <p>$contenu</p>
        <p> $datePublication</p>
        <td>$pseudo</td>
    
    <div class="flexslider">
  <ul class="slides">
   <li>
      
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
                            <a href="{$urlAccueil}$cheminImage" target="_blank" class="pdf">Ouvrir le PDF dans une nouvelle fenêtre</a>
                            

CODEHTML;
                           
                        }
    
                        else {
                            $htmlFile = 
                            <<<CODEHTML
                         
                            <img src="$urlAccueil$cheminImage" alt="$cheminImage">

CODEHTML;
                            }

                          
                          echo "<div>$htmlFile</div>";  

                        }

                    }
                else {
                    echo 
                <<<CODEHTML
                
                    <img src="{$urlAccueil}assets/img/logo.jpg" title="logo">
                    </li>
    
                    </ul>
                    </div>
                    </div>
CODEHTML;
        }
        
        echo "</article>";
    

    
}

?>
 <nav>
        <ul>
<?php        

for($p=1; $p <= $nbPage; $p++)
{
    echo
<<<CODEHTML
        
        <li><a href="?numeroPage=$p&nbArticleParPage=$nbArticleParPage"> $p</a></li>
        
CODEHTML;

}
?>
        </ul>
    </nav>
  

</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/jquery.flexslider-min.js"></script>

<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>

