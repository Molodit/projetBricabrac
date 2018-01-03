

<section>
<h3>ARTICLE</h3>

<?php
// ALLER CHERCHER LA LISTE DES ARTICLES DANS LA CATEGORIE $cat

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
// $objetRepository = $this->getDoctrine()->getRepository("App\Entity\MonArticle");
$objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
// $objetArticle = $objetRepository->find($id);

// ON A UN TABLEAU D'OBJETS DE CLASSE Article
if ($objetArticle)
{
// METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
$idArticle       = $objetArticle->getIdArticle();
$titre           = $objetArticle->getTitre();
$motCle          = $objetArticle->getMotCle();
$rubrique        = $objetArticle->getRubrique();
$contenu         = $objetArticle->getContenu();
$cheminImage     = $objetArticle->getCheminImage();
$datePublication = $objetArticle->getDatePublication("d/m/Y H:i:s");


$htmlImage = "";
if ($cheminImage)
{
    $htmlImage = 
<<<CODEHTML

<img src="$urlAccueil/$cheminImage" title="$cheminImage">
CODEHTML;
}
$urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
$urlRubrique = $this->generateUrl("rubrique", [ "rub" => $rubrique ]);

echo
<<<CODEHTML

<article>
     <h4 title="$idArticle">$titre</h4>
    <div><a href="$urlRubrique">$rubrique</a></div>
    <p>$contenu</p>
    <div>$htmlImage</div>
    <div>$datePublication</div>
</article>

CODEHTML;

}
else {
// DESOLE IL N'Y A PAS D'ARTICLE ASSOCIE
echo "ERREUR: ARTICLE NON TROUVE ($idArticle)";
}

?>


</section>