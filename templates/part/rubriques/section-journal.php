
<section class="journal">

           <h3>JOURNAL LA TANIERE</h3>


<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $journal

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
$objetRepositoryImages = $this->getDoctrine()->getRepository(App\Entity\Images::class);

?>

    <div>

        <ul class="tabs" >
                    
<?php

$tabResultat = $objetRepository->findBy([ "rubrique" => "Journal", "statut" => "publie"], [ "datePublication" => "DESC" ]);

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

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $index => $objetArticle)
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
    
    
    $classActive = "";
    if ($index == 0) {
        $classActive = 'class="article-journal tab-content active"';
    }

    else {
        $classActive = 'class="article-journal tab-content"';
    }


    $htmlFile = "";
    // S'il y a un fichier (image ou pdf)
    $objetImage     = $objetArticle->getImages();
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
       echo
    <<<CODEHTML
    
    <article $classActive id="art$idArticle">
    
   <div>
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        
    </div>   
        <td>écrit par - $pseudo</td>
      
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

