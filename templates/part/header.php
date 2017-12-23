<?php

// JE RECUPERE LES URLS DES PAGES GRACE AU NOM DE LEUR ROUTE
$urlAccueil     = $this->generateUrl("accueil");
//$urlActus       = $this->generateUrl("actus");
$urlContact     = $this->generateUrl("contact");
//$urlInscription = $this->generateUrl("inscription");
$urlLogin       = $this->generateUrl("login");
//$urlAdmin       = $this->generateUrl("admin");
//$urlLogout      = $this->generateUrl("logout");

?>
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
    
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/animBalles.css"/>
  </head>
  <body>
    <header>
      <h1>La tanière bricabracs <figure><img src="<?php echo $urlAccueil ?>assets/img/oiseau.gif" alt="oiseau anime"/></h1>
      <nav>
        <ul>
          <li><a href="<?php echo $urlAccueil ?>">Rizhome</a></li>
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
