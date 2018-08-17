<div class="illustEnfantRead">
	<section class="enfantRead">
		<h2>Les brouillons en attente de publication :</h2>

			<div>
<?php
	
// JE VAIS RECUPERER LE REPOSITORY POUR L'ENTITE Article
			$objetRepository = 			$this->getDoctrine()->getManager()->getRepository(App\Entity\MonArticle::class);
			$objetRepositoryImages     = $this->getDoctrine()->getRepository(App\Entity\Images::class);

			$tabResultat = $objetRepository->trouverBrouillon($objetConnection);

			foreach($tabResultat as $tabLigne)
			{

				extract($tabLigne);
				// CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
			$urlArticle     = $this->generateUrl("article", [ "id_article" => $id_article ]);
			$objetExtension = new SplFileInfo($chemin_image);
			$extension = $objetExtension->getExtension();
			
			// date au format jour / mois /année
			$date = date("d/m/Y",strtotime($date_modification));
			if ($chemin_image && $extension != "pdf")
			{
				echo
				<<<CODEHTML
				<a href="$urlArticle">
					<article style="background-image:url('$chemin_image');
						background-repeat:no-repeat;
						background-position:center;
						background-size: cover;" class="articleEnfant">
							
						<p class="images">$titre
						</p>
						<p class="date">écrit le $date</p>
								
							
		   
	   
CODEHTML;
   

			}

			else {
				echo
				<<<CODEHTML
				<a href="$urlArticle">
				<article style="background-image:url('{$urlAccueil}assets/img/logo.jpg');
				background-repeat:no-repeat;
				background-size:cover;
				border:1px solid #ddd" class="articleEnfant">
				<p class="images">
						$titre 
						</p>
						<p class="date">écrit le $date_publication</p>
					
				
   
CODEHTML;
   } 

				echo
				<<<CODEHTML
					
						<form method="POST" action="#section-update-enfant">
							<input type="hidden" name="afficher" value="updateEnfant">
							<input type="hidden" name="idUpdate" value="$id_article">
							<button class="updateEnfant" type="submit">Modifier le brouillon</button>
						</form>
				</article>
			</a>
CODEHTML;
	
}
?>
		</div>
	</section>
</div>