<?php

// JE RECUPERE LES URLS DES PAGES GRACE AU NOM DE LEUR ROUTE
$urlAccueil           = $this->generateUrl("accueil");
$urlAdminEnfant       = $this->generateUrl("admin-enfant");
$urlCreaTexte         = $this->generateUrl("rubrique", [ "rub" => "CreaTexte" ]);
$urlRhizome           = $this->generateUrl("rubrique", [ "rub" => "Rhizome"]);
$urlJournal           = $this->generateUrl("rubrique", [ "rub" => "Journal" ]);
$urlContact           = $this->generateUrl("contact");
$urlLogin             = $this->generateUrl("login");
$urlMentions          = $this->generateUrl("mentions");
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
   
    <div class="mobile-nav">
   
     <div class="menu-btn" id="menu-btn">
	<div></div>
	<span></span>
	<span></span>
	<span></span>
     </div>
      <div class="nav-collapse responsive-menu">
      <a class="logo" href="<?php echo $urlAccueil ?>" data-scroll><h1> La tanière bricabracs </h1></a>     
        <ul>
          <li class="menu-item active"><a href="<?php echo $urlAccueil ?>" data-scroll>  Accueil </a></li>
          <li class="menu-item"><a href="<?php echo $urlRhizome?>" data-scroll>  Rhizome </a></li>
          <li class="menu-item"><a href="<?php echo $urlCreaTexte ?>"data-scroll> CréaTexte </a></li>
          <li class="menu-item"><a href="<?php echo $urlJournal?>"data-scroll> Journal <em>La Tanière</em></a></li>
          <li class="menu-item"><a href="<?php echo $urlContact ?>"data-scroll>  Contact </a></li>
<?php

// ON VA GERER L'AFFICHAGE DE LA NAVIGATION CELON LE NIVEAU DE SESSION

    $verifNiveau = $objetSession->get("niveau");
    
    //Si le niveau est inférieur a 1, le visiteur aura accés a :
    if($verifNiveau < 1){
    
      echo 
<<<CODEHTML
<li class="menu-item"><a href=" $urlLogin" data-scroll> S'inscrire / Se Connecter </a></li> 
      
CODEHTML;
    }
         // si niveau 7 on affiche le lien suivant en plus:
        if($verifNiveau == 7)
        {
        
          echo
<<<CODEHTML
        <li class="menu-item"><a href="$urlAdminEnfant" data-scroll>Mon tableau de bord  <i class="fas fa-smile"></i> </a></li>                
CODEHTML;
        }
        //si c'est le niveau 9, on affichera :
        elseif($verifNiveau == 9)
        {
          echo
<<<CODEHTML
          <li class="menu-item"><a href="$urlAdmin" data-scroll>Admin</a></li>
CODEHTML;
        }
?>

<?php

// on affiche le logout dès qu'on a le niveau 1 et pour les niveaux supérieurs :
if($verifNiveau >= 1)
{
  echo
  <<<CODEHTML
  <li class="menu-item"><a href="$urlLogout" data-scroll>Se Déconnecter</a></li>                
CODEHTML;

}
?>
          </ul> 
</div>
</div>
    </header>
    <main>
