<section id="section-membre-update">
<?php

// ON TRAITE LE FORMULAIRE UPDATE AVANT DE FAIRE LA REQUETE
// POUR RECUPERER LES INFOS QUI VONT REMPLIR LE FORMULAIRE
// => CELA PERMET D'AVOIR UN AFFICHAGE QUI EST A JOUR...
// POUR AFFICHER LE MESSAGE SOUS LE FORMULAIRE
// ON STOCKE LE MESSAGE DANS UNE VARIABLE
// ET ON L'AFFICHE ENSUITE

ob_start();

// TRAITER LE FORMULAIRE
if ($objetRequest->get("afficher", "") == "updateMembre")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetEntityManager = $this->getDoctrine()->getManager();
    $objetFormArticle->updateMembre($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}

$messageUpdate = ob_get_clean();

?>
<?php

// RECUPERER L'ID DE LA LIGNE A MODIFIER
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
$objetMembreUpdate = $objetRepositoryMembre->find($idUpdate);

            if ($objetMembreUpdate) {

// OK ON A TROUVE UN Membre POUR CET ID
$idMembre        = $objetMembreUpdate->getIdMembre();
$email           = $objetMembreUpdate->getEmail();
$membre          = $objetMembreUpdate->getMembre();
$niveau          = $objetMembreUpdate->getNiveau();
$dateInscription = $objetMembreUpdate->getDateInscription("d/m/Y H:i:s");

?>
    <H3>Modifier les informations d'un membre</H3>
    <table>
    <tr>
    <form method="POST" enctype="multipart/form-data">
        <td>
            <?php echo $idMembre ?>  
        </td>
        <td>
            <input type="text" name="email" required placeholder="Email" value="<?php echo $email ?>">
        </td>
        <td>
            <input type="text" name="membre" required placeholder="Pseudo" value="<?php echo $membre ?>">
        </td>
        <td>
            <input type="text" name="niveau" required placeholder="Niveau" value="<?php echo $niveau ?>">
        </td>
        <td>
            <?php echo $dateInscription ?>
        </td>
        <td>
            <button type="submit">MODIFIER</button>
            <input type="hidden" name="afficher" value="updateMembre">
            <input type="hidden" name="idUpdateMembre" value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="update">
            
        </td>
        <td>
            <div class="response">
                <?php echo $messageUpdate ?>
            </div>
        </td>
    </form>
    </tr>
    </table>
</section>
            <?php } ?>