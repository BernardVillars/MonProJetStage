
   <div id="about">
    <div class="container">
        <div class="section-title text-center center">
            <h2>Bienvenue sur la page d'identification !</h2>
            <hr>
		</div>
        <div class="principal">
  <div class="v-panel-caption">
   <h6>Information</h6>
   </div>
    <div>
		<p class="aln2">L'application est indisponible pour cause de maintenance tous les jours de 22h45 à 06h.</p>
         
    </div>
    <div class="v-panel-caption2">
        <h6>Vous faîtes partie de l'université</h6>                 
         
    </div>
    <div>
     <p class="aln2">Veuillez vous connecter<a href="https://sniut.univ-perp.fr/test" class="bout"><img class="ico" src="images/icons/iconconnect.jpg"></span><span class="add">Connexion</span></a></p>
   </div>
    <div class="v-panel-caption2">
        <h6>Vous n'en faites pas partie et vous avez un compte </h6>                 
         
    </div>
     <div>
     <p class="aln2">Veuillez vous connecter<a href="authentification" class="bout"><img class="ico" src="images/icons/iconconnect.jpg"></span><span class="add">Connexion</span></a></p>
</div>
   <div class="v-panel-caption2">
     <h6>Vous n'en faites pas partie et vous n'avez pas encore de compte</h6>                 
         
    </div>
    <div>
    
		<p class="aln2">Vous pouvez créer un compte ci-dessous</p>
			<div>
				<form name="crea" action="" method="post">
					<span class="aln2">
						Utilisateur
					</span>
					
					<div>
						<input class="wrapinput" type="text" name="login" placeholder="Votre login">
						
					</div>
					<div>
						<input class="wrapinput" type="email" name="email" placeholder="Votre email">
						
					</div>
						
						<input class="wrapinput" type="password" name="pasword" placeholder="Votre mot de passe">
						
					
						<input class="wrapinput" type="password" name="pasword2" placeholder="Confirmez votre mot de passe">
						
					<div>
					 <input id="envoi" class="envoyer" type="submit" value="Envoyer" name="envoi" />
							
					</div>
				</form>	
			
           </div>
      </div>		
      
</div>
        </div>
        <script type="text/javascript">
		 var frmvalidator  = new Validator("crea");
		 frmvalidator.addValidation("login","req","Veuillez saisir un login svp !");
		 frmvalidator.addValidation("email","req","Veuillez saisir un email svp !");
		 frmvalidator.addValidation("pasword","req","Veuillez choisir un mot de passe svp !");
		 frmvalidator.addValidation("pasword2","req","Veuillez confirmer votre mot de passe svp !");
		</script>	
    </div>
    


