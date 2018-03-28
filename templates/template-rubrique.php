<?php

require_once("$cheminPart/header.php");

if ($rub == "Rhizome") 
        
{
    require_once("$cheminPart/rubriques/section-rhizome.php");
}
elseif ($rub == "CreaTexte") 
{
	require_once("$cheminPart/rubriques/section-createxte.php");
 } 
elseif ($rub == "Journal") 
{
   
    require_once("$cheminPart/rubriques/section-journal.php");
}


require_once("$cheminPart/footer.php");