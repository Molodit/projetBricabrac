
            <section class="ArticleImages">
<?php if ($cheminImage) :?>                
                <img src="<?php echo $cheminImage ?>">
<?php endif; ?>
                <h3><?php echo $titre ?></h3>
                <h3>idArticle = <?php echo $idArticle ?></h3>
                
                <p><?php echo $contenu ?></p>
            </section>
            
            <section class="images">
                
                <div class="ligne">
<?php
// ON CONNAIT $idPage POUR L'INGREDIENT
// ON VA CHERCHER DANS LA TABLE RecetteIngredient
// LES LIGNES QUI CORRESPONDENT A CETTE VALEUR $idPage 
// DANS LA COLONNE idIngredient

$codeSQL =
<<<CODESQL

SELECT * FROM article_image
INNER JOIN images
ON ArticleImage.idArticleImage = article.idArticle
WHERE idImage = $idArticle

CODESQL;

        $objetModel = new Model;
        $tabResultat = $objetModel->envoyerRequeteSQL($codeSQL, []);
        
        foreach($tabResultat as $tabLigne)
        {
            $tabLigne = array_map("htmlentities", $tabLigne);
            extract($tabLigne);
            // AVEC LA JOINTURE, JE RECUPERE $idArticle QUI CONTIENT LE NOM D'Immage
            echo
<<<CODEHTML
    <article >
        <h4 >$title </h4>
        <a href="$idArticle.html"><img src="$cheminImage"></a>
    </article>
CODEHTML;
        }
        
?>
                </div>
            </section>
