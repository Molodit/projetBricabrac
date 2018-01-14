<?php

// JE RECUPERE LES URLS DES PAGES GRACE AU NOM DE LEUR ROUTE
$urlAccueil           = $this->generateUrl("accueil");
$urlAdminEnfant       = $this->generateUrl("admin-enfant");
$urlCreaTexte         = $this->generateUrl("rubrique", [ "rub" => "CreaTexte" ]);
$urlRhizome           = $this->generateUrl("rubrique", [ "rub" => "Rhizome"]);
$urlJournal           = $this->generateUrl("rubrique", [ "rub" => "Journal" ]);
$urlContact           = $this->generateUrl("contact");
$urlLogin             = $this->generateUrl("login");
$urlAdmin             = $this->generateUrl("admin");
$urlLogout            = $this->generateUrl("logout");

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
    
    <!-- LIEN DES FICHIERS CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/rubrique.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/admin-formateur.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/style-enfant.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/style-formulaire.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/animBalles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>assets/css/template-article.css"/>
  </head>
  <body>   
     <header>
     <div class="container">
     <h1 class="logo"> La tanière bricabracs </h1>
      <nav  class="nav-collapse">             
        <ul>
          <li class="menu-item active"><a href="<?php echo $urlAccueil ?>">  Accueil </a></li>
          <li class="menu-item"><a href="<?php echo $urlRhizome?>">  Rhizome </a></li>
          <li class="menu-item"><a href="<?php echo $urlCreaTexte ?>"> CréaTexte </a></li>
          <li class="menu-item"><a href="<?php echo $urlJournal?>"> Journal <em>La Tanière</em></a></li>
          <li><a href="<?php echo $urlContact ?>">  Contact </a></li>
<?php

// ON VA GERER L'AFFICHAGE DE LA NAVIGATION CELON LE NIVEAU DE SESSION

    $verifNiveau = $objetSession->get("niveau");
    
    //Si le niveau est inférieur a 1, le visiteur aura accés a :
    if($verifNiveau < 1){
    
      echo 
<<<CODEHTML
<li><a href=" $urlLogin"> S'inscrire / Se Connecter </a></li> 
      
CODEHTML;
    }
         // si niveau 7 on affiche le lien suivant en plus:
        if($verifNiveau == 7)
        {
        
          echo
<<<CODEHTML
        <li><a href="$urlAdminEnfant" class="menuConnecter">Mon tableau de bord  <i class="fas fa-smile"></i> </a></li>                
CODEHTML;
        }
        //si c'est le niveau 9, on affichera :
        elseif($verifNiveau == 9)
        {
          echo
<<<CODEHTML
          <li><a href="$urlAdmin" class="menuConnecter">Admin</a></li>
CODEHTML;
        }
?>

<?php

// on affiche le logout dès qu'on a le niveau 1 et pour les niveaux supérieurs :
if($verifNiveau >= 1)
{
  echo
  <<<CODEHTML
  <li class="pure-menu-item" ><a href="$urlLogout">Se Déconnecter</a></li>                
CODEHTML;

}
?>
        </ul>     
       </nav>
       </div>
    </header>
    <div class="container container-bottom">
    <main>
