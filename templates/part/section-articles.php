<section class="balles">
        <h3>DERNIERS ARTICLES</h3>
        <table>
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
    $idArticle       = $objetArticle->getIdArticle();
    $idMembre        = $objetArticle->getIdMembre();
    $titre           = $objetArticle->getTitre();
    $rubrique        = $objetArticle->getRubrique();
    $motCle          = $objetArticle->getMotCle();
    $contenu         = $objetArticle->getContenu();
    $cheminImage     = $objetArticle->getCheminImage();
    $datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");
    
    
     $htmlImage = "";
    if ($cheminImage)
    {
        $htmlImage = 
<<<CODEHTML

    <img src="$cheminImage" title="$cheminImage">

CODEHTML;
    }
    
    // POUR CONSTRUIRE UNE URL POUR UNE ROUTE DYNAMIQUE
    // IL FAUT FOURNIR LA VALEUR DU PARAMETRE DANS L'URL
    //      * @Route("categorie/{cat}", name="categorie")
    $urlRubrique = $this->generateUrl("rubrique", [ "rubrique" => $rubrique ]);
    $urlMotCle = $this->generateUrl("mot_cle", [ "mot_cle" => $motCle ]);
    // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
    $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
    

    echo
<<<CODEHTML

    <tr>
        <td>$idArticle</td>
        <td>$idMembre</td>
        <td><a href="$urlArticle">$titre</a></td>
        <td><a href="$urlRubrique">$rubrique</a></td>
        <td><a href="$urlMotCle">$motCle</a></td>
        <td>$contenu</td>
        <td>$htmlImage</td>
        <td>$datePublication</td>
        <td>
            <form method="GET" action="">
                <input type="hidden" name="afficher" value="update">
                <input type="hidden" name="idUpdate" value="$idArticle">
                <button type="submit">update</button>
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