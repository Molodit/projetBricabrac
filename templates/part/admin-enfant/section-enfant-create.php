<?php
$verifMembre = $objetSession->get("membre");

?>
 


<h2>BIENVENUE <?php echo $verifMembre ?></h2>
    
<div class="illustEnfant">   

    <?php require_once("$cheminPart/admin-formateur/admin-article-create.php");
?>

</div>
<hr>

