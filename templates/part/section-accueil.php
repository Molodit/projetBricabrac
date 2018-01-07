<section class="bgimg-1" id="accueil-articles">

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $cat

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository     = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
//$tabResultat = $objetRepository->findBy([], [ "datePublication" => "DESC" ]);

$tabResultat = $objetRepository->trouverArticleUserLimit($objetConnection);
$compteur = 0;
// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $tabLigne)
{
    $compteur++;
    extract($tabLigne);
    $contenu = mb_strimwidth($contenu, 0, 10, '...');

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
    <article style="background-image:url('$chemin_image');background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity:0.9;">
        <h3><a href="$urlArticle">$titre</a></h3>
        <span>par $membre</span>
        <p>$contenu</p>
       
        <span>$date_publication</span>
    </article>
    </div>
</div>
    
CODEHTML;
    }
    
}

?>


            
        
       
        
            
                  
 
                  <!--<div class="circle-link circle2 col-sm-3">
                  <div class="circle-content">
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>
    
  
                  <div class="circle-link circle3 col-sm-2">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
         <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>-->
 
                   <div class="circle-link circle4 col-sm-4">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
          <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>
 
                  <div class="circle-link circle5 col-sm-3">
                  <div class="circle-content" >
           <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
          <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>

                  
                  <div class="circle-link circle6 col-sm-3">
                  <div class="circle-content" >
           <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
          <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>

                  <div class="circle-link circle7 col-sm-3">
                  <div class="circle-content">
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
          <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>

                  <div class="circle-link circle8 col-sm-3">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
         <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>

                  <div class="circle-link circle9 col-sm-5">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
         <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>

                  <div class="circle-link circle10 col-sm-5">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
          <h3></h3>
          <img src="#" alt="photo article 1"/>
         <p></p>
        </article>
        </div>
            </a>
                  </div>
                  </div>
                  
                  <div class="circle-link circle11 col-sm-5">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div>
        <article>
         
          <img src="assets/img/siteon0-38e4a.jpg" alt="logo"/>
         
        </article>
        </div>
            </a>
                  </div>
                  </div>

    </div>


</section>
        
  
<form action="" method="POST" id="recherche">
    <input type="text" name="recherche" placeholder="Recherche"/>
    <button type="submit">Envoyer</button>
</form>
  

<!-- <div class="bgimg-2">

</div> -->



