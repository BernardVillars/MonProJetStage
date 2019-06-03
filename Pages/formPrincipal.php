
<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrat.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">-->
<div id="about">
    <div class="container">
        <div class="section-title text-center center">
            <h2>Bienvenue sur la page d'enregistrement des données!</h2>
            <hr>
		</div>
           <div class="col-xs-4">
            <div class="principal2">
               <div>
                  </ul>
                    <li><a class="page-scroll" href="enregistrement/f1">Formulaire 1</a></li>
                    <li><a class="page-scroll" href="enregistrement/f2">Formulaire 2</a></li>
                    <li><a class="page-scroll" href="enregistrement/f3">Formulaire 3</a></li>
                    <li><a class="page-scroll" href="enregistrement/f4">Formulaire 4</a></li>
	           </div>
            </div>
             </div>
            <?php

if(isset($_GET['valeur'])) {
		$valeur = $_GET['valeur'];
		
	
	if(isset($_SESSION['compteur'])&&($_SESSION['compteur']==1)){
		$valeur = $_GET['valeur'];
		
		if(stristr($valeur, '/') == TRUE){
		$sub = substr($valeur, -2);    // retourne "f(1)"
		$valeur=$sub;				
		header('Location:'.$root.'enregistrement/'.$valeur);	
		}
		
		else{
		$_SESSION['compteur']=1;	
		switch ($valeur){
		case 'f1':require('form1.php');break;		
		case 'f2':require('form2.php');break;
		case 'f3':require('form3.php');break;
		case 'f4':require('form4.php');break;
		  }
		
		}
	
	}
	
	else{
		$_SESSION['compteur']=1;	
		switch ($valeur){
		case 'f1':require('form1.php');break;		
		case 'f2':require('form2.php');break;
		case 'f3':require('form3.php');break;
		case 'f4':require('form4.php');break;
	          }
		
	  }
}

		
?>
               <div class="optionnel">
      <!--<script type="text/javascript">
		 var frmvalidator  = new Validator("crea");
		 frmvalidator.addValidation("login","req","Veuillez saisir un login svp !");
		 frmvalidator.addValidation("email","req","Veuillez saisir un email svp !");
		 frmvalidator.addValidation("pasword","req","Veuillez choisir un mot de passe svp !");
		 frmvalidator.addValidation("pasword2","req","Veuillez confirmer votre mot de passe svp !");
		</script>	-->
  <!-- </div>-->
	</div>
                
	</div>
</div>

    