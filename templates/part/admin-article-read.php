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
    
        <table id="tableListe" class="display" width="80%">
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
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tfoot>
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
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </tfoot>
        <tbody>
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
    
    // On ne prend que les 100 premiers caractères du texte de $contenu
    $contenu = mb_strimwidth($contenu, 0, 100, '...');
    // S'il y a une image
    
    $htmlImage = "";
    if ($cheminImage)
    {
        $objetExtension = new SplFileInfo($cheminImage);
        $extension = $objetExtension->getExtension();
        if ($extension == "pdf")
    {
        $htmlImage = 
        <<<CODEHTML
        <iframe src="$cheminImage"></iframe>
CODEHTML;
    }

    else {
        $htmlImage = 
        <<<CODEHTML
    
        <img src="$cheminImage" title="$cheminImage">
CODEHTML;
        }
    }

       
    // Si l'image est un pdf
   
    
    
    
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
        <td>$dateModification</td>
        
        <td>
            <form method="GET" action="">
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="$idArticle">
                <button type="submit"><i class="far fa-edit"></i></button>
            </form>
        </td>
        <td>
            <form method="POST" action="">
                <input type="hidden" name="codebarre" value="delete">
                <input type="hidden" name="idDelete" value="$idArticle">
                <button type="submit"><i class="far fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>
CODEHTML;
    
}

?>
            </tbody>
           
        </table>


</section>