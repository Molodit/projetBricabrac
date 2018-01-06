<?php

// TRAITEMENT DU FORMULAIRE DELETE AVANT DE FAIRE LE READ
if ($objetRequest->get("codebarre", "") == "deleteMembre")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession);
    
}
?>

<section class="membre-list tab-content" id="membres">
    <h3>Liste des membres</h3>
    
        <table id="tableListeMembres" class="display" width="80%">
            <thead>
                <tr>
                    <!--Création de l'entête et pied du tableau avec les balises TH-->
                    <?php
                    
                    $tabMembreTH = ["N° membre", "Email", "Pseudo", "niveau", "date d'inscription", "Supprimer"];
                    
                    foreach ($tabMembreTH as $element) {
                        echo
                    <<<CODEHTML
                        <th>$element</th>
CODEHTML;
                }
                ?>
                    </tr>
                </thead>
                <tfoot>
                        <tr>
                    <?php
                    foreach ($tabMembreTH as $element) {
                        echo
                    <<<CODEHTML
                        <th>$element</th>
CODEHTML;
                }
                    ?>
                    </tr>
                    </tfoot>
                    
                <tbody>
        <?php

        // JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
        // $objetRepository = $this->getDoctrine()->getRepository("App\Entity\Membre");
        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\Membre::class);

        // PLUS PRATIQUE => findBy
        // http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
        // ATTENTION: ON UTILISE LE NOM DES PROPRIETES
        $tabResultat = $objetRepository->findBy([], [ "idMembre" => "DESC" ]);

        // ON A UN TABLEAU D'OBJETS DE CLASSE Membre
        foreach($tabResultat as $objetMembre)
        {
            // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Membre
            
            $idMembre         = $objetMembre->getIdMembre();
            $email            = $objetMembre->getEmail();
            $membre           = $objetMembre->getMembre();
            $niveau           = $objetMembre->getNiveau();
            $dateInscription  = $objetMembre->getDateInscription("d/m/Y H:i:s");

        
            echo
        <<<CODEHTML

            <tr>
                <td>$idMembre</td>
                <td>$email</td>
                <td>$membre</td>
                <td>$niveau</td>
                <td>$dateInscription</td>
                
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="codebarre" value="deleteMembre">
                        <input type="hidden" name="idDelete" value="$idMembre">
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
    </div>
</div>