<section id="section-update">

<?php

// RECUPERER L'ID DE LA LIGNE A MODIFIER
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
$objetArticleUpdate = $objetRepository->find($idUpdate);

            if ($objetArticleUpdate) :

// OK ON A TROUVE UN ARTICLE POUR CET ID
$titre      = $objetArticleUpdate->getTitre();
$contenu    = $objetArticleUpdate->getContenu();
$motCle     = $objetArticleUpdate->getMotCle();
$rubrique   = $objetArticleUpdate->getRubrique();

?>
    <H3>Modifier un article</H3>
    <form method="POST" enctype="multipart/form-data" class="formAdmin" action="<?php echo $urlAdmin ?>">
        <input type="text" name="titre" required placeholder="titre" value="<?php echo $titre ?>">
        <input type="text" name="mot_cle" required placeholder="Mots-clés" value="<?php echo $motCle ?>">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CreaTexte">CréaTexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"><?php echo $contenu ?></textarea>
        <input type="file" name="chemin_image">
        <button type="submit" name="statut" value="brouillon">Modifier et enregistrer comme brouillon</button>
        <button type="submit" name="statut" value="publie">Modifier et publier l'article</button>
        <input type="hidden" name="afficher" value="">
        <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
        <input type="hidden" name="codebarre" value="updateArticle">
        <div class="response">
<?php echo $messageUpdate ?>
        </div>
    </form>
</section>
            <?php endif; ?>