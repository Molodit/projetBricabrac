<?php

require_once("$cheminPart/header.php");

if (isset($_REQUEST["section"]) 
        && ($_REQUEST["section"] == "rhizome"))
{
    require_once("$cheminPart/section-rhizome.php");
}
elseif (isset($_REQUEST["section"]) 
        && ($_REQUEST["section"] == "createxte")) 
{
	require_once("$cheminPart/section-createxte.php");
 } 
elseif (isset($_REQUEST["section"]) 
        && ($_REQUEST["section"] == "journal")) 
{
   
    require_once("$cheminPart/section-journal.php");
}


require_once("$cheminPart/footer.php");