<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La tanière bricabracs</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/style-enfant.css"/>
  </head>
  <body>
    <header>
          <h1>La tanière bricabracs <figure><img src="img/oiseau.gif" alt="oiseau anime"/></h1>
      <nav>
        <ul>
          <li><a href="">Rizhome</a></li>
          <li><a href="">CréaTexte</a></li>
          <li><a href="">Journal <em>La Tanière</em></a></li>
          
         
        </ul>
      </nav>
      <form action="" method="POST" id="recherche">
          <input type="text" name="recherche" placeholder="Recherche"/>
          <button type="submit">Envoyer</button>
        </form>
    </header>
    <main>


<!--
<?php

//$verifMembre = $objetSession->get("membre");

?>

<section>

    <h3>BIENVENUE <?php// echo $verifMembre ?></h3>


<section>
    <h3>Ecrire un nouvel article</h3>
    NE PAS OUBLIER: POUR UPLOADER UN FICHIER -->
    <!-- method="POST" enctype="multipart/form-data" -->

    <div id="gif">
        <figure><img src="img/classe.gif" alt="enfant-sur-une-chaise"></figure>
        <p> N'oublie pas de publié ton article </p>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="titre">
        <input type="text" name="mot_cle" required placeholder="mot-clé">
        <select name="rubrique" required>
          <option value="">-- Choisissez une rubrique --</option>
          <option value="Rhizome">Rhizome</option>
          <option value="CréaTexte">Créatexte</option>
          <option value="Journal">Journal La Tanière</option>
     </select>
        <textarea id="editor1" type="text" name="contenu" required placeholder="contenu" rows="60"></textarea>
        <input type="file" name="cheminImage" placeholder="insérer une image">
        <button type="submit">Publier l'article</button>
        <input type="hidden" name="codebarre" value="article">
        <div class="response">

<!--
<?php
// TRAITER LE FORMULAIRE
//if ($objetRequest->get("codebarre", "") == "article")
{
   //  $objetFormArticle = new App\Controller\FormArticle;
    
    //$objetFormArticle->creer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
    // https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database
    // $objetEntityManager = $this->getDoctrine()->getManager();
    // $objetFormArticle->creerPersistence($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession);
}
?>
        </div>
    </form>
    
     https://sdk.ckeditor.com/samples/autogrow.html# -->
	<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'editor1', {
			extraPlugins: 'autogrow',
			autoGrow_minHeight: 200,
			autoGrow_maxHeight: 600,
			autoGrow_bottomSpace: 50,
			removePlugins: 'resize'
		} );
    </script>
    
</section>


        </main>
        <footer>
            <nav id="menufooter">
                <ul>
                  <li><a href=""> <i class="fas fa-home"></i>  Rhizome </a></li>
                  <li><a href=""> <i class="fas fa-book"></i>  CréaTexte</a></li>
                  <li><a href=""> <i class="far fa-edit"></i> Journal <em>La Tanière </em></a></li>
                </ul>
              </nav>
               <div class="contact">
                   <p> Nous contacter : lesbricabracs@bricabracs.org / 68 chemin de Baumillon 13015 Marseille</p>
               </div>

    </footer>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>