<?php 
ob_start();

if ($objetRequest->get("codebarre", "") == "updateArticle")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->update($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

$messageUpdate = ob_get_clean();
if ($objetRequest->get("afficher", "") == "updateEnfant")
{
    require_once("$cheminPart/admin-formateur/admin-article-update.php");
}
else
{
    require_once("$cheminPart/admin-enfant/section-enfant-create.php");
}

require_once("$cheminPart/admin-enfant/section-admin-enfant-read.php");
