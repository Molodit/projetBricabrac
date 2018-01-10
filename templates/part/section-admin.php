<?php

$verifMembre = $objetSession->get("membre");

?>

<section class="admin">
    <h2>Administration du site</h2>
    <h3>Bienvenu-e <?php echo $verifMembre ?></h3>
</section>

<?php 

if ($objetRequest->get("afficher", "") == "update")
{
    require_once("$cheminPart/admin-article-update.php");
}

elseif ($objetRequest->get("afficher", "") == "updateMembre")
{
    require_once("$cheminPart/admin-membre-update.php");
}
else
{
    require_once("$cheminPart/admin-article-create.php");
}

    require_once("$cheminPart/admin-read.php");
?>