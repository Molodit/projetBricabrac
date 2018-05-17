<?php
$objetRepository = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);


$tabResultat = $objetRepository->findBy(["idArticle" => $idArticle], [ "datePublication" => "DESC" ]);

// $nbComment = count($tabResultat);

// if ($nbComment > 0):
?>

    <section class="read">
        <h2 class="readh2">Commentaires</h2>

        <?php

// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Comments



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
</div>
