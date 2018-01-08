

<section class="connecter">
  <h3> Connectez-vous </h3>
    <form action="" method="POST" id="form">
          <input type="email" name="email" required placeholder="Votre identifiant">
          <input type="password" name="password" required placeholder="Votre mot de passe">
          <button type="submit"> Se connecter <i class="fas fa-check-circle"></i> </button>
  
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

  </section>

</section>
  
