
<section class="read">
<h2 class="readh2">Commentaires</h2>

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Comments
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);


$tabResultat = $objetRepository->findBy(["idArticle" => $idArticle], [ "datePublication" => "DESC" ]);


foreach($tabResultat as $objetComment)
{

    $idComment       = $objetComment->getIdComment();
    $idMembre        = $objetComment->getIdMembre();
    $contenu         = $objetComment->getContenu();
    $objetMembre = $objetRepositoryMembre->find($idMembre);
    $pseudo = "";
    if ($objetMembre)
    {
        $pseudo = $objetMembre->getMembre();
    }

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$urlArticle = $this->generateUrl("article",["id_article" => "$idArticle"]);

    echo
    <<<CODEHTML
<article>
    <h3>$pseudo</h3>
    <hr>
    <p>$contenu</p>
</article>

CODEHTML;

}

?>

</section>