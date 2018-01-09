<section class="bgimg-1" id="accueil-articles">

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $cat

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);


$tabResultat = $objetRepository->trouverArticleUserLimit($objetConnection);
$compteur = 0;
// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $tabLigne)
{
    $compteur++;
    extract($tabLigne);

    $htmlFile = "";
    if ($chemin_image)
    {
        $htmlFile = 
<<<CODEHTML

    <img class="balle" src="$chemin_image" alt="photo">

CODEHTML;
    }
    
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle     = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    if ($compteur < 4) {
    echo
<<<CODEHTML
<div class="circles-container container">

                  <div class="circle-link circle$compteur" >
                  <div class="circle-content" >
    <article style="background-image:url('$chemin_image');
    background-repeat:no-repeat;
    background-position:center;
    background-size: cover;">
       <a href="$urlArticle">$titre</a>
        <p>de $membre</p>
    </article>
    </div>
</div>
    
CODEHTML;
    }
    
}

$tabResultatMotCle = $objetRepository->trouverMotClePlus($objetConnection);
$compteurMotCle = 3;
// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultatMotCle as $tabLigneMotCle)
{
    $compteurMotCle++;
    extract($tabLigneMotCle);

    if ($compteurMotCle > 3 && $compteurMotCle < 12) {

$urlMotCle            = $this->generateUrl("motCle", [ "mot_cle" => $mot_cle ]);

    echo
<<<CODEHTML
<div class="circles-container container">

                  <div class="circle-link circle$compteurMotCle" >
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


