<?php

$urlAdminEnfant  = $this->generateUrl("admin-enfant");
$urlLogout       = $this->generateUrl("logout");
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
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-enfant.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/animBalles.css"/>
</head>
<body>
    <header>

    <nav>
        <ul>
          <li><a href="<?php echo $urlAdminEnfant ?>">Admin-enfant</a></li>
          <!--<li><a href="<//?php echo $urlRhizome ?>">Rizhome</a></li>-->
          <!--<li><a href="<//?php //echo $urlCreaTexte ?>">CréaTexte</a></li>-->
        </ul>
    <h1>La tanière bricabracs <figure><img src="<?php echo $urlAdminEnfant ?>assets/img/oiseau.gif" alt="oiseau anime"/></h1>
    </header>
</body>
</html>
<main>