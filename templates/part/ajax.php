<?php


if($objetRequest->get("codebarre", "") == "commentaire")
{
    $objetFormCommentaire = new App\Controller\FormCommentaire;
        
    $objetFormCommentaire->creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession);

    $contenu  = $objetRequest->get("contenu", "");
    $idMembre = $objetSession->get("id_membre");
    // UNE FOIS QUE LE COMMENTAIRE A ETE AJOUTE
    // ON VA L'AFFICHER
    echo
<<<CODEHTML
    <p>$idMembre</p>
    <p>$contenu</p>

CODEHTML;
}


?>
