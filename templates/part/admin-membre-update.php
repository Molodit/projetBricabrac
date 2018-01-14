<section id="section-membre-update">

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


?>
    <h3>Modifier les informations d'un membre</h3>
    
    <form method="POST" enctype="multipart/form-data" class="formAdmin" action="<?php echo $urlAdmin ?>">
            <label for="email">Email</label>
            <input type="text" name="email" required placeholder="Email" value="<?php echo $email ?>">
            <label for="membre">Pseudo</label>
            <input type="text" name="membre" required placeholder="Pseudo" value="<?php echo $membre ?>">
            <label for="niveau">Niveau</label>
            <select type="text" name="niveau" required placeholder="Niveau" value="Choisissez le niveau">
                    <option value="9">Formateur</option>
                    <option value="7">Enfant</option>
                    <option value="1">Membre inscrit</option>
                    <option value="0">Désinscrit la personne</option>
            </select>
            <button type="submit">Modifier</button>
            <input type="hidden" name="afficher" value="">
            <input type="hidden" name="idUpdateMembre" value="<?php echo $idUpdate ?>">
            <input type="hidden" name="codebarre" value="update">
            
       
            <div class="response">
                <?php echo $messageUpdate ?>
            </div>
        </td>
    </form>
    </tr>
    </table>
</section>
            <?php } ?>