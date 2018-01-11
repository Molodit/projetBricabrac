<h3> Commentaires</h3>
<section class="read">

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Comments
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);

$tabResultat = $objetRepository->findBy([], [ "datePublication" => "DESC" ]);


foreach($tabResultat as $objetComment)
{

    $idComment       = $objetComment->getIdComment();
    $idMembre         = $objetComment->getIdMembre();
    $contenu            = $objetComment->getContenu();

// PLUS PRATIQUE => findBy
// http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
// ATTENTION: ON UTILISE LE NOM DES PROPRIETES
$urlArticle = $this->generateUrl("article",["id_article" => "$idArticle"]);

?>
</section>