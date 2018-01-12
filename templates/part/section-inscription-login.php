<section class="Login">
    <article class="articleLogin"> 
    <h2>Pour S'inscrire </h2>
    <hr>

    <p class="paraInscription">Pas encore inscrit ? Remplissez le formulaire ci-dessous.
        Vous pourrez ainsi commenter les articles. Bonne navigation !!</p>

            <form method="POST" class="formLogin">
                <input type="email" name="email" required placeholder="Votre email">
                <input type="text" name="membre" required placeholder="Votre identifiant">
                <input type="password" name="password" required placeholder="Votre mot de passe">
                <button type="submit"> Valider <i class="fas fa-check-circle"></i> </button>

                <input type="hidden" name="codebarre" value="inscription">
                <div class="response">
    <?php


    if ($objetRequest->get("codebarre", "") == "inscription")
    {
        $objetTraitementForm = new App\Controller\TraitementForm;
        $objetTraitementForm->traiterInscription($objetRequest, $objetConnection);
    }
    ?>
                </div>
            </form>  
    </article>

    <article class="articleLogin">
    <h2> Connectez-vous </h2>

    <hr>
    <p class="paraLogin"> Déjà inscrit ? Veuillez renseigner votre adresse email et votre mot de passe pour accéder à votre espace personnel.</p>

        <form  method="POST" class="formLogin">
            <input type="email" name="email" required placeholder="Votre adresse email">
            <input type="password" name="password" required placeholder="Votre mot de passe">
            <button type="submit"> Connexion <i class="fas fa-check-circle"></i> </button>
    
            <input type="hidden" name="codebarre" value="login">
            <div class="response">
    <?php
    // TRAITER LE FORMULAIRE
    // AVEC SYMFONY JE VAIS UTILISER UN OBJET DE LA CLASSE Request
    // FOURNI PAR SYMFONY QUAND JE RAJOUTE LE PARAMETRE DANS MA METHODE contact
    if ($objetRequest->get("codebarre", "") == "login")
    {
        $objetTraitementForm = new App\Controller\TraitementForm;
        $objetRespository = $this->getDoctrine()->getRepository(App\Entity\Membre::class);

        $objetTraitementForm->traiterLogin( $objetRequest, 
                                            $objetConnection, 
                                            $objetRespository, 
                                            $objetSession );
    }

    ?>
            </div>
        </form>
    </article>
</section>

