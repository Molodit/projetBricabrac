<?php

$verifMembre = $objetSession->get("membre");

?>

<section>
    <h3>SECTION ADMIN</h3>
    <h4>BIENVENUE <?php echo $verifMembre ?></h4>
</section>


<?php 

if ($objetRequest->get("afficher", "") == "update")
{
    require_once("$cheminPart/admin-article-update.php");
}
else
{
    require_once("$cheminPart/admin-article-create.php");
}

    require_once("$cheminPart/admin-article-read.php");
?>