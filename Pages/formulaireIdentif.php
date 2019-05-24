<?php
require('sessstart.php');
require('controllers.php');
if (isset($_SESSION['authentification'])){
	if($_SESSION['authentification']==1){
	echo '<script type="text/javascript"> alert("Il n\' y a pas de compte créé avec ces identifiants !\n\nVous pouvez en créer un sur la page précédente.")</script>';
		unset($_SESSION['authentification']);
	}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formulaire d'accès</title>
<link href="Formulaires/Identification/styles.css" rel="stylesheet" type="text/css" media="screen" />
<script src="Js/gen_validatorv4.js" type="text/javascript"></script>
</head>


<script type="text/javascript"> 
	 function openInfo()
	 {
			window.open('mpo','nom_de_ma_popup','menubar=no, scrollbars=no, top=100, left=100, width=350, height=500');
	 }
	
	</script>
  <div class="container">
<article class="formulaire">
	<h1>Authentification</h1>
	<form name="identif" action="" value="" method="post">
		<fieldset>
			<label for="login">Login ou Mail :</label>
			<input type="text" id="login" name="login" placeholder="Saisissez votre login ou votre mail"/>

			<label for="pwd">Mot de passe :</label>
			<input type="password" id="pwd" name="pwd" placeholder="Saisissez votre mot de passe"/>
			
			<input type="submit" id="envoyer" name="envoyer" value="Envoyer" />

		</fieldset>
	</form>
	     <div class="contactbtn">
			<a href="" class="mpoub" onclick="openInfo()"><span class="add">Mot de passe oublié</span></a>
		 </div>
		 <div class="contactbtn">
			<a href="presentation" class="bout">Page précédente</a>
	</div>
		 <div class="contactbtn">
			<a href="aide" class="bout">Aides</a>
		 </div>
</article>
	</div>
	<script type="text/javascript">
		 var frmvalidator  = new Validator("identif");
		 frmvalidator.addValidation("login","req","Veuillez saisir un identifiant svp !");
		 frmvalidator.addValidation("pwd","req","Veuillez saisir un mot de passe svp !");
		</script>	
	<?php
	
  $ct= new Controleur();	
   if(isset($_POST['envoyer'])) {
	
	$posts=['login'=>$_POST['login'],'pasword'=>$_POST['pwd']];
	$ct->verif_ident($posts);
	   
	   
                  
   }

	?>

</html>
		
