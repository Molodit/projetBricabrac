<?php 

if ($objetRequest->get("afficher", "") == "update")
{
    require_once("$cheminPart/admin-enfant/section-enfant-update.php");
}
else
{
    require_once("$cheminPart/admin-enfant/section-enfant-create.php");
}

require_once("$cheminPart/admin-enfant/section-admin-enfant-read.php");
