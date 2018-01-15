<?php


if($objetRequest->get("codebarre", "") == "commentaire")
{
    $objetFormCommentaire = new App\Controller\FormCommentaire;
        
    $objetFormCommentaire->creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession);

    $contenu  = $objetRequest->get("contenu", "");
    $idMembre = $objetSession->get("id_membre");
    $idArticle = $objetRequest->get("id_article");
    // UNE FOIS QUE LE COMMENTAIRE A ETE AJOUTE
    // ON VA L'AFFICHER

    echo
<<<CODEHTML
    
    <p>$contenu</p>

CODEHTML;
}


?>
