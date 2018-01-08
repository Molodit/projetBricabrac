<?php
    $db = new PDO('mysql:host=localhost;dbname=bricabracs_rhiz;charset=utf8','root' , '',[
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION, // AFFICHE UNE ALERT EN CAS D'ERREUR
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //MODE DEXPLOITATION
        ]);
        
$action = "list";

// SI IL Y A UNE ACTION PRECISEE DANS LE GET, ON L'APPLIQUE
if(isset($_GET['action'])) $action = $_GET['action'];

//EGUILLAGE : SI L'ACTION EST LIST ON L'EXECUTE SINON ON POST
if($action == 'list') getMessages();
else postMessage();

function getMessages()
{
    global $db;
    
    $resultat = $db->query('SELECT * FROM comments ORDER BY contenu DESC LIMIT 10');
    
    $messages = $resultat->fetchAll();
    
    echo json_encode($messages);
    
}

function postMessage()
{
    
    //var_dump($_POST);
    
    global $db;
    
    $idComment = htmlentities($_POST['id_comment']);
    $idMembre = htmlentities($_POST['id_membre']);
    $titre = htmlentities($_POST['titre']);
    $contenu = htmlentities($_POST['contenu']);
    $datePublication = htmlentities($_POST['date_publication']);
    
    $requete = $db->prepare('INSERT INTO comments SET idComment = :id_comment , idMembre = :id_membre,idArticle = :id_article, titre = :titre , contentu = :contentu , date_publication = NOW()');
   
   $requete->execute([
       ":id_comment" => $idComment,
       ":id_membre"  => $idMembre,
       ":titre"      => $Titre,
       ":contentu"   => $contentu
       ]);
  
};


?>  
    