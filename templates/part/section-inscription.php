<section class="Login">
  <h3>INSCRIPTION</h3>
        <form method="POST" class="formLogin">
            <input type="email" name="email" required placeholder="Votre mail">
            <input type="text" name="membre" required placeholder="Votre identifiant">
            <input type="password" name="password" required placeholder="Votre mot de passe">
            <button type="submit"> S'Inscrire <i class="fas fa-check-circle"></i> </button>

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

</section>