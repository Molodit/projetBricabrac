<?php

//https://openclassrooms.com/forum/sujet/cacher-et-afficher-certains-elements-en-fonction-du-membr-14679
 
//Si le membre est connecté on affiche le menu-connection
if(isset($_SESSION['login'])){ 
?>
 
<div id="co">
<?php 

{echo htmlentities(trim($_SESSION['login']));}
?>

<a href="<?php echo $urlAdmin ?>"> Admin</a></div>

<?php 

//Si le membre n'est pas connecté on affiche le menu-deconnecter
if(empty($_SESSION['login'])) {

  // OU <?php if(!isset($_SESSION[User]){
//require 'notconnected.php';
//}else{
//require 'connected.php';}
?>



 
<div id="log"> <a href="<?php echo $urlAdmin ?>">S'inscrire / Se Connecter</a></div>
 