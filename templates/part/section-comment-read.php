
<section class="read">
<h3 class="readh2">Commentaires</h3>

<?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Comments
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);

$tabResultat = $objetRepository->trouverCommentUser ($objetConnection);


foreach($tabResultat as $tabLigne)
{

    $tabLigne = array_map("htmlentities", $tabLigne);
    extract($tabLigne);


echo
<<<CODEHTML
    <article>
        <h4>$membre</h4>
        <p>$contenu</p>
        <hr>
    <article>
    

CODEHTML;

}

?>
</section>