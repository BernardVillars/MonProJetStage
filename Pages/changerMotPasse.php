<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formulaire d'accès</title>
<link href="../Formulaires/Identification/styles.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../Js/gen_validatorv4.js" type="text/javascript"></script>
</head>

<body>
 <?php	
	$root ="/accesGb/";
	require('sessstart.php');
	require('controllers.php');
	
$ct= new Controleur();	
   if(isset($_POST['envoy'])) {
	
	$posts=['login'=>$_POST['login'],'email'=>$_POST['email'],'oldmdp'=>$_POST['oldmdp'],'newmdp'=>$_POST['newmdp'],'confmdp'=>$_POST['confmdp']];
	$ct->changer_pwd($posts);
                  
   }
	
?>
  <div class="container">
<article class="formulaire">
	<h1>Changement de mot de passe</h1>
	<form name="chgmp" action="#" method="post">
		<fieldset>
		
			<label for="login">Login :</label>
			<input type="text" id="login" name="login" placeholder="Saisissez votre login" />

			<label for="email">Mail :</label>
			<input type="email" id="email" name="email" placeholder="Saisissez votre adresse mail" />
			
			<label for="oldmdp">Mot de passe :</label>
			<input type="password" id="oldmdp" name="oldmdp" placeholder="Saisissez votre mot de passe" />

			<label for="newmdp">Nouveau :</label>
			<input type="password" id="newmdp" name="newmdp" placeholder="Saisissez votre nouveau mot de passe" />
			
			<label for="confmdp">Confirmation :</label>
			<input type="password" id="confmdp" name="confmdp" placeholder="Confirmez le nouveau mot de passe" />
			
			<input type="submit" id="envoy" name="envoy" value="Envoyer"/>

		</fieldset>
     
	</form>
</article>
	</div>
	<script type="text/javascript">
 var frmvalidator  = new Validator("chgmp");
 frmvalidator.addValidation("login","req","Veuillez saisir votre login svp !");
 frmvalidator.addValidation("email","req","Veuillez saisir votre adresse mail svp !");
 frmvalidator.addValidation("oldmdp","req","Veuillez saisir votre mot de passe svp!");
 frmvalidator.addValidation("newmdp","req","Veuillez saisir votre nouveau mot de passe svp !");
 frmvalidator.addValidation("confmdp","req","Veuillez confirmer votre nouveau mot de passe svp !");
 </script>	
</body>
</html>