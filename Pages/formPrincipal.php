<div id="about">
    <div class="container">
        <div class="section-title text-center center">
            <h2>Bienvenue sur le formulaire d'enregistrement !</h2>
            <hr>
		</div>
        <div class="principal">
  <div class="container">
<article class="formulaire">
	<h4>Enregistrement de vos données</h4><br>
	<form name="enregistre" enctype="multipart/form-data" action="" method="post">
		<fieldset>
		
			<label for="foret" class="lblformprincipal">Foret :</label>
			<input type="text" id="foret" name="foret" class="inpformprincipal" placeholder="Saisissez votre " /><br>

			<label for="ruisseau" class="lblformprincipal">Ruisseau :</label>
			<input type="text" id="ruisseau" name="ruisseau" class="inpformprincipal" placeholder="Saisissez votre " /><br>	

			<label for="new" class="lblformprincipal">Nouveau :</label>
			<input type="text" id="new" name="newm" class="inpformprincipal" placeholder="Saisissez votre" /><br>
			
			<label for="conf" class="lblformprincipal">Confirmation :</label>
			<input type="text" id="conf" name="conf" class="inpformprincipal" placeholder="Confirmez le " /><br>
			
			<label class="lblformprincipal">Photos :</label>
				
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
			<input type="file" name="fich" class="inpformprincipalph" size=50/><br>
					
			<input type="submit" id="enreg" class="bout2" name="enreg" value="Envoyer"/>
			
			

		</fieldset>
     
	</form>
</article>
	</div>
</div>
       <div class="optionnel">
      
   </div>
        </div>
        <!--<script type="text/javascript">
		 var frmvalidator  = new Validator("crea");
		 frmvalidator.addValidation("login","req","Veuillez saisir un login svp !");
		 frmvalidator.addValidation("email","req","Veuillez saisir un email svp !");
		 frmvalidator.addValidation("pasword","req","Veuillez choisir un mot de passe svp !");
		 frmvalidator.addValidation("pasword2","req","Veuillez confirmer votre mot de passe svp !");
		</script>	-->
    </div>