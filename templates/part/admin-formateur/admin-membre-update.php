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
            <label for="niveau">Donner accès au niveau :</label>
            <select type="text" name="niveau" required placeholder="Niveau" value="Choisissez le niveau">
                    <option value="9">Formateur (publier, modifier et supprimer des articles, modifier et supprimer des membres)</option>
                    <option value="7">Enfant (écrire et modifier des articles, les enregistrer en brouillon)</option>
                    <option value="1">Simple membre inscrit (peut commenter les articles, pas d'accès à l'administration du site)</option>
                    <option value="0">Désinscrire la personne du site (ne peut plus commenter les articles)</option>
            </select>
            <button type="submit">Modifier</button>
            <button type="reset" value="annuler" onclick="window.location.assign('<?php echo $urlAdmin ?>')">Annuler</button>
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