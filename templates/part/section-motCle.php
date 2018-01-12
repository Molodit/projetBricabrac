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

// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy(
    [ "motCle" => $mot_cle ], 
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

    <article class="article-motCle">
        <div >$htmlFile</div>
        <div class="article-mot">
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div>$mot_cle</div>
        <p>$contenu</p>
        <p> $datePublication</p>
        <td>$pseudo</td>
        </div>
      
    </article>
    
CODEHTML;
    
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

