<?php

$urlAdminEnfant  = $this->generateUrl("admin-enfant");
$urlLogout       = $this->generateUrl("logout");
$urlAccueil           = $this->generateUrl("accueil");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La tanière briabracs</title>
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>/assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>/assets/css/style-enfant.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlAccueil ?>/assets/css/animBalles.css"/>
</head>
<body>
    <header>

    <nav>
        <ul>
            <li><a href="<?php echo $urlAdminEnfant ?>">Accueil</a></li>
            <li><a href="<?php echo $urlLogout ?>">Se Déconnecter </a></li>
        </ul>
    </nav>
    <h1>La tanière bricabracs <figure><img src="<?php echo $urlAccueil ?>/assets/img/oiseau.gif" alt="oiseau anime"/></h1>
    </header>
</body>
</html>
<main>