<?php

// FAIRE LE TRAITEMENT DU FORMULAIRE AVANT DE FAIRE LE READ
if ($objetRequest->get("codebarre", "") == "delete")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
}
?>

<section class="article-list">
    <h3>Liste des articles</h3>
        <table  id="dataTables" class="display" cellspacing="0" width="80%">
            <tbody>
            <thead>
            <tr>
                <th>N° Article</th>
                <th>N° Auteur</th>
                <th>Titre</th>
                <th>Rubrique</th>
                <th>Contenu</th>
                <th>Images</th>
                <th>Mots-clés</th>
                <th>Date de publication</th>
                <th>Date de modification</th>
            </tr>
        </thead>
<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$tabResultat = $objetRepository->findBy([], [ "datePublication" => "DESC" ]);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
foreach($tabResultat as $objetArticle)
{
    // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
    $idArticle        = $objetArticle->getIdArticle();
    $idMembre         = $objetArticle->getIdMembre();
    $titre            = $objetArticle->getTitre();
    $motCle           = $objetArticle->getMotCle();
    $rubrique         = $objetArticle->getRubrique();
    $contenu          = $objetArticle->getContenu();
    $cheminImage      = $objetArticle->getCheminImage();
    $datePublication  = $objetArticle->getDatePublication("d/m/Y H:i:s");
    $dateModification = $objetArticle->getDateModification("d/m/Y H:i:s");
    
    $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
    <<<CODEHTML

    <img src="$cheminImage" title="$cheminImage">
CODEHTML;
    }
    // Si l'article a été modifié
    $Modif = "";
    if ($dateModification)
    {
        $Modif = 
    <<<CODEHTML
    $dateModification
CODEHTML;
    }
    
    // $urlCategorie = "#";
    // if ($categorie)
    // {
    //     // POUR CONSTRUIRE UNE URL POUR UNE ROUTE DYNAMIQUE
    //     // IL FAUT FOURNIR LA VALEUR DU PARAMETRE DANS L'URL
    //     //      * @Route("categorie/{cat}", name="categorie")
    //     $urlCategorie = $this->generateUrl("categorie", [ "cat" => $categorie ]);
    // }
    
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    
    echo
<<<CODEHTML

    <tr>
        <td>$idArticle</td>
        <td>$idMembre</td>
        <td><a href="$urlArticle">$titre</a></td>
        <td>$rubrique</td>
        <td>$contenu</td>
        <td>$htmlImage</td>
        <td>$motCle</td>
        <td>$datePublication</td>
        <td>$Modif</td>
        
        <td>
            <!-- ETAPE 1: AFFICHER LE FORMULAIRE POUR UN UPDATE -->
            <form method="GET" action="">
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="$idArticle">
                <button type="submit">modifier</button>
            </form>
        </td>
        <td>
            <form method="POST" action="">
                <input type="hidden" name="codebarre" value="delete">
                <input type="hidden" name="idDelete" value="$idArticle">
                <button type="submit">supprimer</button>
            </form>
        </td>
    </tr>
    
CODEHTML;
    
}

?>
            </tbody>
        </table>


</section>