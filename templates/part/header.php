<?php

// JE RECUPERE LES URLS DES PAGES GRACE AU NOM DE LEUR ROUTE
$urlAccueil     = $this->generateUrl("accueil");
$urlArticle     = $this->generateUrl("article");
//$urlRubrique   = $this->generateUrl("rubrique", [ "rubrique" => $rub ]);
$urlContact     = $this->generateUrl("contact");
$urlInscription = $this->generateUrl("inscription");
$urlLogin       = $this->generateUrl("login");
$urlAdmin       = $this->generateUrl("admin");
$urlLogout      = $this->generateUrl("logout");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La tanière bricabracs</title>
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/animBalles.css"/>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="<?php echo $urlAccueil ?>">Rizhome</a></li>
          <li><a href="<?php //echo $urlRubrique ?>">CréaTexte</a></li>
          <li><a href="">Journal <em>La Tanière</em></a></li>        
        </ul>
      </nav>
       <h1>La tanière bricabracs <figure><img src="<?php echo $urlAccueil ?>assets/img/oiseau.gif" alt="oiseau anime"/></h1>
      <ul>
        <li><a href="<?php echo $urlInscription ?>">Inscription</a></li>
        <li><a href="<?php echo $urlLogin ?>">Login</a></li>
        <li><a href="<?php echo $urlAdmin ?>">Admin</a></li>
        <li><a href="<?php echo $urlLogout ?>">Logout</a></li>
      </ul>
      <form action="" method="POST" id="recherche">
          <input type="text" name="recherche" placeholder="Recherche"/>
          <button type="submit">Envoyer</button>
        </form>
    </header>
    <main>
