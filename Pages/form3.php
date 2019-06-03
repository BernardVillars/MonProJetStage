<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrat.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <div class="container">
<article class="formulaire">
	<h4>Enregistrement du formulaire 3</h4><br>
	<form name="enregistre" enctype="multipart/form-data" action="enregistrement" method="post">
		<fieldset>
		
			<label for="foret" class="lblformprincipal">Foret3 :</label>
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