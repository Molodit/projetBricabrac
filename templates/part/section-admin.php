<?php

$verifMembre = $objetSession->get("membre");

?>

<div class="illustrationAdmin">
<section class="admin">
    
    <h2>Bienvenu-e <?php echo $verifMembre ?></h2>
</section>

<?php 
// ON TRAITE LE FORMULAIRE UPDATE AVANT DE FAIRE LA REQUETE
// POUR RECUPERER LES INFOS QUI VONT REMPLIR LE FORMULAIRE
// => CELA PERMET D'AVOIR UN AFFICHAGE QUI EST A JOUR...
// POUR AFFICHER LE MESSAGE SOUS LE FORMULAIRE
// ON STOCKE LE MESSAGE DANS UNE VARIABLE
// ET ON L'AFFICHE ENSUITE

ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "update")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMembre($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

elseif ($objetRequest->get("codebarre", "") == "updateArticle")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->update($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

$messageUpdate = ob_get_clean();

if ($objetRequest->get("afficher", "") == "update")
{
    require_once("$cheminPart/admin-formateur/admin-article-update.php");
}

elseif ($objetRequest->get("afficher", "") == "updateMembre")
{
    require_once("$cheminPart/admin-formateur/admin-membre-update.php");
}
else
{
    require_once("$cheminPart/admin-formateur/admin-article-create.php");
}

    require_once("$cheminPart/admin-formateur/admin-read.php");
?>
</div>