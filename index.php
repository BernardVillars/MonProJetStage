<?php

$root ="/accesGb/";

require('sections/head.php');


if(isset($_GET['page'])) {
    $page = $_GET['page'];		
	require('sections/nav.php');
	
	if($page=='presentation'){
	   require('Pages/sessstart.php');
       require('Pages/controllers.php');
       require('Pages/presentation.php');
		$ct= new Controleur();
				
if(isset($_POST['envoi'])) {

	  $regex = '/^[a-z]{1}[a-zà-ÿ0-9\-\_\.]*$/i';
	if(preg_match($regex, $_POST['login']))
	   {	
		
	$posts=['login'=>$_POST['login'],'email'=>$_POST['email'],'pasword'=>$_POST['pasword'],'pasword2'=>$_POST['pasword2']];
	$ct->load($posts);
	}
	
	else{
		 echo '<script type="text/javascript"> alert("Vous avez utilisé des caractères non valides pour votre login !")</script>';
	}
	                    
}
    }
if($page=='enregistrement'){
	$cookiename="ticket";
$ticket=session_id().microtime().rand(0,9999999999);
$ticket=hash('sha512',$ticket);
setcookie($cookiename,$ticket,time()+(60*20));
$_SESSION['ticket']=$ticket;

if(isset($_COOKIE['ticket'])==$_SESSION['ticket']){
    $ticket=session_id().microtime().rand(0,9999999999);
    $ticket=hash('sha512',$ticket);
    $_COOKIE['ticket']=$ticket;
    $_SESSION['ticket']=$ticket;
    }else{
    $_SESSION=array();
    session_destroy();
    header('location:accueil');
}
	require('Pages/controllers.php');
    require('Pages/formPrincipal.php');
	$res;
	$ct= new Controleur();
	 
	if(isset($_POST['enreg'])) {
		
		if(isset($_FILES['fich'])){
			
			$ct->uploadPhoto();
		}
	}
	
}

}else{

   require('sections/nav.php');
   require('Pages/accueil.php');
	
}


require('sections/footer.php');

?>
