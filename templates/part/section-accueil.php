<section class="bgimg-1" id="accueil-balles">

<?php
// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

$tabResultatMotCle = $objetRepository->trouverMotClePlus($objetConnection);
$compteur = 0;
// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultatMotCle as $tabLigneMotCle)
{
    $compteur++;
    extract($tabLigneMotCle);

    if ($compteur < 12) {

$urlMotCle = $this->generateUrl("motCle", [ "mot_cle" => $mot_cle ]);

    echo
<<<CODEHTML
<div class="circles-container container">

                  <div class="circle-link circle$compteur" >
                  <div class="circle-content" >
    <article>
        <a href="$urlMotCle">$mot_cle</a>
    </article>
    </div>
</div>
    
CODEHTML;
    }
    
}

?>
</section>

<section id="accueil-articles">
    <h2>Les derniers articles</h2>
<?php

$tabResultat = $objetRepository->trouverArticleUserLimit($objetConnection);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $tabLigne)
{
    extract($tabLigne);
     // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle     = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    $objetExtension = new SplFileInfo($chemin_image);
    $extension = $objetExtension->getExtension();
    if ($chemin_image && $extension != "pdf")
    {
       echo
        <<<CODEHTML
            <article style="background-image:url('$chemin_image');
                background-repeat:no-repeat;
                background-position:center;
                background-size: cover;">
                    <div class="images">
                        <a href="$urlArticle">$titre</a>
                        <p>écrit par $membre</p>
                    </div>
            </article>
CODEHTML;
    

    }

    else {
        echo
        <<<CODEHTML
        <article>
            <div>
                <a href="$urlArticle">$titre</a>
                <p>écrit par $membre</p>
            </div>
        </article>
CODEHTML;
    }
    
}
?>
</section>


