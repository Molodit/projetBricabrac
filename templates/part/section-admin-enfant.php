<?php 

if ($objetRequest->get("afficher", "") == "update")
{
    require_once("$cheminPart/section-enfant-update.php");
}
else
{
    require_once("$cheminPart/section-enfant-create.php");
}

require_once("$cheminPart/section-admin-enfant-read.php");
