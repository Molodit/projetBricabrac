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
    $mot_cle = ucfirst(strtolower($mot_cle));

    if ($compteur < 12) {

$urlMotCle = $this->generateUrl("motCle", [ "mot_cle" => $mot_cle ]);

    echo
<<<CODEHTML
<a href="$urlMotCle">
    <div class="circles-container container">

                    <div class="circle-link circle$compteur" >
                    <div class="circle-content" >
        <article>
            <span>$mot_cle</span>
        </article>
        </div>
    </div>
</a>
    
CODEHTML;
    }
    
}

?>
</section>
<hr>
<section id="presentation">
    <h2>Les espaces éducatifs "école" Bricabracs</h2>
    <article>
        <p>C'est un collectif de 20 enfants, de 4 à 10 ans, 2 enseignants-éducateurs,
        une ouverture continue de 8h à 17h sans séparation des temps éducatifs dits scolaires et périscolaires.
        Des pédagogies actives pour placer l’enfant au cœur du projet (Freinet,
        Collot, Korczak, Montessori, pédagogie sociale, ...).</p>
        <p>Des principes de laïcité, d’entraide, de coopération, d’ouverture aux autres,
        dans une dynamique de solidarité. 
        Une hétérogénéité et une mixité du public, en termes d’âge, de culture,
        de capital social ou économique. 
        Un espace éducatif qui va au-delà du cadre habituel des écoles et des
        accueils de loisirs en s'ouvrant et en accueillant les personnes agissant à proximité de son milieu de vie.</p>
        <p>Ce site a plusieurs fonction :
            <ul>
                <li>Un outil au service des enfants, nourrissant l'esprit des minots dans un va et vient entre l'intérieur et l'extérieur de notre vie quotidienne.</li>
                <li>L'exposé d'un aperçu de la vie de La Tanière, notre milieu, que l'on donne à voir.</li>
                <li>Une communication vers un rhizome d'incertitude susceptible de créer d'autres lignes d'erre.</li>
            </ul>
        </p>
    </article>
</section>
<hr>
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
        <a href="$urlArticle">
            <article style="background-image:url('$chemin_image');
                background-repeat:no-repeat;
                background-position:center;
                background-size: cover;">
                    <div class="images">
                        <p>$titre</p>
                        <p>écrit par $membre</p>
                    </div>
            </article>
        </a>
CODEHTML;
    

    }

    else {
        echo
        <<<CODEHTML
        <a href="$urlArticle">
        <article style="background-image:url('$urlAccueil/assets/img/logo.png');
        background-repeat:no-repeat;
        background-position:center;
        background-size:cover;">
            <div class="images">
                <p>$titre</p>
                <p>écrit par $membre</p>
            </div>
        </article>
    </a>
CODEHTML;
    }
    
}
?>
</section>


