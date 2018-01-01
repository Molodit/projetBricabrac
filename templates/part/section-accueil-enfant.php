
 <h2>BIENVENUE <?php echo $verifPseudo ?></h2>

<section class="bgimg-1" id="articles">

   
<div class="circles-container no-padding container">

                  <div class="circle-link circle1">
                  <div class="circle-content" >
            <a href="#" target="_blank">
        <div class="article">
        <article>
          

          <img src="$htmlImage" alt="photo"/>
         
        </article>
        </div>
            </a>
                  </div>
                  </div>
 
                  <div class="circle-link circle2 col-sm-3">
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
                  </div>
 
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
        
  
 
  

<div class="bgimg-2">

<section>
    <h3>Ecrire un nouvel article</h3>
    <!-- NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
    <!-- method="POST" enctype="multipart/form-data" -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="titre">
        <input type="text" name="mot_cle" required placeholder="mot-clé">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CréaTexte">Créatexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="30"></textarea>
        <input type="file" name="cheminImage" placeholder="insérer une image">
        <button type="submit">Publier l'article</button>
        <input type="hidden" name="codebarre" value="article">
        <div class="response">
<?php
// TRAITER LE FORMULAIRE
if ($objetRequest->get("codebarre", "") == "article")
{
     $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->creer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
    // https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database
    // $objetEntityManager = $this->getDoctrine()->getManager();
    // $objetFormArticle->creerPersistence($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
?>
        </div>
    </form>
    
    
</section>

