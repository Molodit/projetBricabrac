<?php

require_once("$cheminPart/header.php");

if ($rub == "Rhizome") 
        
{
    require_once("$cheminPart/section-rhizome.php");
}
elseif ($rub == "CreaTexte") 
{
	require_once("$cheminPart/section-createxte.php");
 } 
elseif ($rub == "Journal") 
{
   
    require_once("$cheminPart/section-journal.php");
}


require_once("$cheminPart/footer.php");