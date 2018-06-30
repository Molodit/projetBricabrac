<section class="formulaireAdmin" id="
<?php 
    if($verifNiveau == 9 )
    {echo 'section-update';} 
    else 
    {echo 'section-update-enfant';} ?>">

<?php

// RECUPERER L'ID DE LA LIGNE A MODIFIER
$idUpdate = $objetRequest->get("idUpdate", 0);
// RECUPERER LES AUTRES INFOS POUR PRE-REMPLIR LE FORMULAIRE
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
$objetArticleUpdate = $objetRepository->find($idUpdate);

            if ($objetArticleUpdate) {

// OK ON A TROUVE UN ARTICLE POUR CET ID
                $titre      = $objetArticleUpdate->getTitre();
                $contenu    = $objetArticleUpdate->getContenu();
                $motCle     = $objetArticleUpdate->getMotCle();
                $rubrique   = $objetArticleUpdate->getRubrique();
                $objetImage = $objetArticleUpdate->getImages();
                $htmlFile = "";

                //Si des images sont déjà présentes dans l'article, on les affiche
                if ($objetImage) {
                    foreach ($objetImage as $image) {
                        $idImage = $image->getIdImage();
                        $cheminImage = $image->getCheminImage();
                        $objetExtension = new SplFileInfo($cheminImage);
                        $extension = $objetExtension->getExtension();
                        
                    //     Si le fichier est un pdf
                     if ($extension == "pdf")
                     {
                        $htmlFile .= 
                     <<<CODEHTML
                     <div class="divUpdate">
                     <input type="checkbox" name="image[]" value="$idImage" class="ImageUpdate" id="id{$idImage}">
                     <label for="id{$idImage}">
                     <iframe src="$urlAccueil$cheminImage"></iframe><br><br>
                     <a href="{$urlAccueil}$cheminImage" target="_blank" class="pdf">Ouvrir le PDF</a>
                     <p class="inputHidden">Ce PDF sera supprimé</p>
                     </div>
CODEHTML;
                     }
                     else
                     {
                        $htmlFile .= 
                        <<<CODEHTML
                        
                        <div class="divUpdate">
                        <input type="checkbox" name="image[]" value="$idImage" class="ImageUpdate" id="id{$idImage}">
                        <label for="id{$idImage}">
                        <img src="$urlAccueil$cheminImage" alt="photo de l'article">
                        <p class="inputHidden">Cette image sera supprimée</p>
                        </div>
                     
CODEHTML;
                     }
                    }
                }
                
            }
            
            ?>
            <!-- Formulaire de modification de l'article prérempli avec les données de la bdd -->
            <h2>Modifier l'article <?php echo "\"$titre\"" ?></h2>
            <hr>
            <form method="POST" enctype="multipart/form-data" class="formAdmin" action="<?php 
                    if($verifNiveau === 9 )
                    {echo $urlAdmin;} 
                    else 
                    {echo $urlAdminEnfant;} ?>">
            <label for="titre">Titre</label>
            <input type="text" name="titre" required placeholder="Titre" value="<?php echo $titre ?>">
            <label for="mot_cle">Mot-clé</label>
            <input type="text" name="mot_cle" required placeholder="Mots-clés" value="<?php echo $motCle ?>">
            <label for="rubrique">Rubrique</label>
            <select name="rubrique" required>
            <option value="<?php echo $rubrique ?>"><?php echo $rubrique ?></option>
            <option value="Rhizome">Rhizome</option>
            <option value="CreaTexte">CréaTexte</option>
            <option value="Journal">Journal La Tanière</option>
            </select>
            <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"><?php echo $contenu ?></textarea>
            <input type="hidden" name="cheminImage">
            
                <p class="plImage">Images et/ou PDF de l'article. Cochez pour les supprimer de l'article</p>

            <br>
            <?php echo $htmlFile ?>
            <div id="filelist"></div>

              <!-- Eléments d'initialisation du widget plupload pour uploader plusieurs images ou PDF dans l'article -->
              <pre id="console"></pre>

              <div id="uploader">
                    <!-- Message en cas d'erreur -->
                  <p>Le navigateur ne supporte pas Flash, Silverlight ou HTML5.</p>
              </div>

        <!-- Trois boutons pour donner la possibilité de publier, d'enregistrer en brouillon ou d'annuler -->
        <button type="submit" name="statut" value="brouillon">Modifier et enregistrer</button>
        <?php if ($verifNiveau === 9) { 
            echo
            "<button type='submit' name='statut' value='publie'>Modifier et publier l'article</button>";
        }
        ?>
        <button type="reset" value="annuler" onclick="window.location.assign('<?php 
                    if($verifNiveau === 9 )
                    {echo $urlAdmin;} 
                    else 
                    {echo $urlAdminEnfant;} ?>')">Annuler</button>
        <input type="hidden" name="idUpdate" value="<?php echo $idUpdate ?>">
        <input type="hidden" name="codebarre" value="updateArticle">
        <div class="response">


<!-- Message de retour -->
<?php echo $messageUpdate ?>
        </div>
    </form>
    </section>
          

    