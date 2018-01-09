<?php

// TRAITEMENT DU FORMULAIRE DELETE AVANT DE FAIRE LE READ
if ($objetRequest->get("codebarre", "") == "deleteMembre")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession, 'membre', 'id_membre');
    
}
?>

<section class="admin membre tab-content" id="membres">
    <h4>Liste des membres</h4>
    
        <table id="tableListeMembres" class="display" width="100%">
            <thead>
                <tr>
                    <!--Création de l'entête et pied du tableau avec les balises TH-->
                    <?php
                    
                    $tabMembreTH = ["N°", "Email", "Pseudo", "Niveau", "Date d'inscription", "Supprimer"];
                    
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

        // PLUS PRATIQUE => findBy
        // http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
        // ATTENTION: ON UTILISE LE NOM DES PROPRIETES
        $tabResultat = $objetRepositoryMembre->findBy([], [ "idMembre" => "DESC" ]);

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
                        <button type="submit" onclick="return confirm('Êtes vous sûr(e) de vouloir supprimer cet élément ?');"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
CODEHTML;
            
        }

        ?>
                    </tbody>
                
                </table>


        </section>
    