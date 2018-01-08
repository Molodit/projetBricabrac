<section>
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
    $datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");
    
    
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

<section id="commentaire">
    <h3>Laisser un Commentaire : </h3>
    
    <form method="POST">
        <input type="text" name="titre" required placeholder="Votre Titre"/>
            <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"></textarea>
            <button type="submit">Ajouter votre commentaire <i class="far fa-hand-point-right"></i> </button>
        <input type="hidden" name="codebarre" value="commentaire">
        <div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "commentaire")
{
    $objetFormCommentaire = new App\Controller\FormCommentaire;
    
    $objetFormCommentaire->creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession);


}
?>
        </div>
    </form>
    
    
</section>

