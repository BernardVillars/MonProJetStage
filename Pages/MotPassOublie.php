 <!doctype html>
<html>
<head>
<title>Envoi</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" type="text/css" href="Formulaires/MdpOubli/css/main.css">	
	<script src="Js/gen_validatorv4.js" type="text/javascript"></script>
</head>
<body>

	
  <?php	
	$root ="/accesGb/";
	require('sessstart.php');
	require('controllers.php');
	
if (isset($_SESSION['mpo'])){
	if($_SESSION['mpo']==1){
	echo '<script type="text/javascript"> alert("Nous vous avons envoyé un nouveau mot de passe !!");</script>';
		
	}
	
	if($_SESSION['mpo']==0){
	echo '<script type="text/javascript"> alert("Ces identifiants ne correspondent à aucun compte !\n\nVous pouvez en créer un sur la page précédente.")</script>';
		
	}
	unset($_SESSION['mpo']);
	}
	
	
$ct= new Controleur();	
   if(isset($_POST['envoye'])) {
	
	$posts=['email'=>$_POST['email'],'login'=>$_POST['login']];
	$ct->envoi_pwd($posts);
                  
   }
	
?>
 <div class="bg-contact3">
  <div class="container-contact3">
			<div class="wrap-contact3">
				<form name="mpo" class="contact3-form validate-form" action="#" method="post">
					<span class="wrap-input3 decal">
						Veuillez compléter ces champs svp !
					</span>
					<div class="wrap-input3 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input3" type="email" name="email" placeholder="Votre email">
						<span class="focus-input3"></span>
					</div>
					
					<div class="wrap-input3 validate-input" data-validate ="Name is required">
						<input class="input3" type="text" name="login" placeholder="Votre login">
						<span class="focus-input3"></span>
					</div>

					<div class="container-contact3-form-btn">
						 <input id="envoye" class="contact3-form-btn" type="submit" value="Envoyer" name="envoye"/> 
							
					</div>
				</form>
			</div>
			
   </div>
  </div>
 <script type="text/javascript">
 var frmvalidator  = new Validator("mpo");
 frmvalidator.addValidation("email","req","Veuillez saisir votre adresse mail svp !");
 frmvalidator.addValidation("login","req","Veuillez saisir votre login svp !");
 </script>	
	</body>
</html>