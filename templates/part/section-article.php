<section class="article-commentaire">
<section class="article-select">

<?php

$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);

$tabResultat = $objetRepository->findBy([ "idArticle" => $id_article ], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
    $idArticle       = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre           = $objetArticle->getTitre();
    $rubrique       = $objetArticle->getRubrique();
    $contenu         = $objetArticle->getContenu();
    $cheminImage     = $objetArticle->getCheminImage();
    $motCle          = $objetArticle->getMotCle();
    $datePublication = $objetArticle->getDatePublication("d/m/Y");
    
    $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }
    $htmlImage = "";
    if ($cheminImage)
    {
        $objetExtension = new SplFileInfo($cheminImage);
        $extension = $objetExtension->getExtension();

        // Si le fichier est un pdf
        if ($extension == "pdf")
    {
        $htmlFile = 
        <<<CODEHTML
        <iframe src="$cheminImage"></iframe>
CODEHTML;
    }

    else {
        $htmlFile = 
        <<<CODEHTML
    
        <img src="$cheminImage" title="$cheminImage">
CODEHTML;
        }
    }

   // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    
    echo
<<<CODEHTML

    <article>
        <h3 title="$idArticle"><a href="$urlArticle">$titre</a></h3>
        
        <span>de $pseudo</span>
        <p>$contenu</p>
        <div>$htmlImage</div>
        <div><a href="">$motCle</a></div>
        <div>$datePublication</div>
    </article>
    
CODEHTML;
    
}

?>
</section>




<section id="commentaire">
        

        
<?php
// VARIABLE GLOBALE POUR VERIFIER LES NIVEAU DE SESSION
$verifNiveau = $objetSession->get("niveau");
//SI LE NIVEAU EST INFERIEUR A 1
if($verifNiveau < 1)
{
    echo
<<<CODEHTML
<form class="commentaires" style="display:none">
    <textarea type="text" name="contenu" required placeholder="contenu" rows="30"></textarea>
    <button type="submit"> <i class="far fa-hand-point-right"></i> Ajouter votre commentaire  </button>
    <input type="hidden" name="codebarre" value="commentaire">
CODEHTML;
}
    // SI LES NIVEAUX SONT SUPERIEURS A 1 ON AFFICHE LE FORMULAIRE POUR AJOUTER LES COMMENTAIRES
    elseif($verifNiveau >= 1)
    {
        echo
<<<CODEHTML
<h3>Laisser un Commentaire :</h3>
<form class="commentaires">
    <textarea type="text" name="contenu" required placeholder="contenu" rows="30"></textarea>
    <button type="submit"> <i class="far fa-hand-point-right"></i> Ajouter votre commentaire  </button>
    <input type="hidden" name="codebarre" value="commentaire">
    
CODEHTML;
    
    }

    
?>
        
        </div>
    </form>
    
    
</section>

<?php

require_once("$cheminPart/section-comment-read.php")

?>
