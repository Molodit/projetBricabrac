<section class="article-commentaire">
<section class="article-select">
    <h3>ARTICLE</h3>

<?php

$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

$tabResultat = $objetRepository->findBy([ "idArticle" => $id_article ], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
    $idArticle       = $objetArticle->getIdArticle();
    $titre           = $objetArticle->getTitre();
    $rubrique       = $objetArticle->getRubrique();
    $contenu         = $objetArticle->getContenu();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y");
    
    
    $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
<<<CODEHTML

    <img src="$urlAccueil/$cheminImage" title="$cheminImage">

CODEHTML;
    }

   // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    
    echo
<<<CODEHTML

    <article>
        <h4 title="$idArticle"><a href="$urlArticle">$titre</a></h4>
        <div><a href="">$rubrique</a></div>
        <p>$contenu</p>
        <div>$htmlImage</div>
        <div>$datePublication</div>
    </article>
    
CODEHTML;
    
}

?>
</section>

<?php

require_once("$cheminPart/section-comment-read.php")

?>


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
    // SI LES NIVEAU SONT SUPERIEUR A 1 ON AFFICHE LE FORMULAIRE POUR AJOUTER LES COMMENTAIRES
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
    
        // TRAITEMENT DU FORMULAIRE POUR L'INSERTION DES COMMENTAIRES
        if($objetRequest->get("codebarre", "") == "commentaire")
        {
        
        $objetFormCommentaire = new App\Controller\FormCommentaire;
            
        $objetFormCommentaire->creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
        }
        else
        {
    <<<CODEHTML
        <div class="response">
CODEHTML;
        }

    }

    
?>
        
        </div>
    </form>
    
    
</section>

</section>