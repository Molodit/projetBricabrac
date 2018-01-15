<?php


if($objetRequest->get("codebarre", "") == "commentaire")
{
    $objetFormCommentaire = new App\Controller\FormCommentaire;
        
    $objetFormCommentaire->creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession);

    $contenu  = $objetRequest->get("contenu", "");
    $membre = $objetSession->get("membre");
    $idArticle = $objetRequest->get("id_article");
    // UNE FOIS QUE LE COMMENTAIRE A ETE AJOUTE
    // ON VA L'AFFICHER

    echo
<<<CODEHTML
    <article>
        <h3>$membre</h3>
        <hr>
        <p>$contenu</p>
    </article>

CODEHTML;
}


?>
