
<section class="journal">

           <h2>Les journaux de la tanière</h2>


<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $journal

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
$objetRepositoryImages = $this->getDoctrine()->getRepository(App\Entity\Images::class);

?>

    <div id="tabContainer">

        <div class="tabs">
            <ul class="journalUl">
                    
<?php

$tabResultat = $objetRepository->findBy([ "rubrique" => "Journal", "statut" => "publie"], [ "datePublication" => "DESC" ]);
$compteurLi = 0;
$compteurArt = 0;
foreach($tabResultat as $index => $objetMenu)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $compteurLi++;
    $idArticle       = $objetMenu->getIdArticle();
    $titre           = $objetMenu->getTitre();


    if ($index == 0){
   
        echo
        <<<CODEHTML
        <li id="tabHeader_$compteurLi" class="tabActiveHeader">$titre</li>
CODEHTML;

            } 
    else
    {    
        echo
        <<<CODEHTML
        <li id="tabHeader_$compteurLi">$titre</li>
CODEHTML;

}


}
?>
        </ul>
    </div>


<div id="tabscontent">

<?php

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $index => $objetArticle)
{
    $compteurArt++;
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE MonArticle
    $idArticle       = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre           = $objetArticle->getTitre();
    $motCle          = $objetArticle->getMotCle();
    $datePublication = $objetArticle->getDatePublication("d/m/Y");

     $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }
    
    
    $classActive = "";
    if ($index == 0) {
        $classActive = "class='article-journal tabpage' id='tabpage_$compteurArt' style='display: block;'";
    }

    else {
        $classActive = "class='article-journal tabpage' id='tabpage_$compteurArt'";
    }


    $htmlFile = "";
    // S'il y a un fichier (image ou pdf)
    $objetImage     = $objetArticle->getImages();
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
       echo
    <<<CODEHTML
    
    <article $classActive>
    
   
        <h4 title="$idArticle">
            <a href="$urlArticle">$titre</a>
        </h4>
        
    
        <p>Écrit par $pseudo le $datePublication</p>
        
      
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
                            
                            
                            <iframe src="{$urlAccueil}$cheminImage"></iframe><br><br>
                            <p><a href="{$urlAccueil}$cheminImage" target="_blank" class="pdf">Ouvrir le PDF dans une nouvelle fenêtre</a></p>
                            

CODEHTML;
                           
                        }
    
                        else {
                            $htmlFile = 
                            <<<CODEHTML
                        
                            <img src="{$urlAccueil}$cheminImage" alt="$cheminImage">
CODEHTML;
                            }

                          
                          echo "<p>$htmlFile</p>";  

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
 

 </div>

</div>


</section>

