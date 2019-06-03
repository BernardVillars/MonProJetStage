<?php

	require('sections/head.php');
	$root ="/accesGb/";

	session_start();
	$cookiename="ticket";
	$ticket=session_id().microtime().rand(0,9999999999);
	$ticket=hash('sha512',$ticket);
	setcookie($cookiename,$ticket,time()+(60*40));
	$_SESSION['ticket']=$ticket;
	

	if (isset($_SESSION['authentification'])){
			
	if($_SESSION['authentification']==1){
	echo '<script>NonDroit()</script>';		
	}
			
	unset($_SESSION['authentification']);
	}

	if(isset($_GET['page'])) {
		$page = $_GET['page'];	
		if(isset($_COOKIE['ticket'])==$_SESSION['ticket']){
				$ticket=session_id().microtime().rand(0,9999999999);
				$ticket=hash('sha512',$ticket);
				$_COOKIE['ticket']=$ticket;
				$_SESSION['ticket']=$ticket;
			}
			else{

				$_SESSION=array();
				session_destroy();
				header('location:accueil');
			}
		if(isset($_GET['valeur'])) {
		$valeur = $_GET['valeur'];
		}
		require('sections/nav.php');
		
		if($page=='presentation') {	
	
			
		    require('Pages/presentation.php');
			$ct= new Controleur();

			if(isset($_POST['envoi'])) {
				  require('Pages/sessstart.php');			
		          require('Pages/controllers.php');
				  $regex = '/^[a-z]{1}[a-zà-ÿ0-9\-\_\.]*$/i';
				  if(preg_match($regex, $_POST['login'])) {	

				$posts=['login'=>$_POST['login'],'email'=>$_POST['email'],'pasword'=>$_POST['pasword'],'pasword2'=>$_POST['pasword2']];
				$ct->load($posts);
				}

				else{
					 echo '<script>CaractereNonValide()</script>';
				}

			}
			else{
			require('CAS/CAS.php');
			phpCAS::client(CAS_VERSION_2_0,'cas.univ-perp.fr',443,'/cas',true);
			phpCAS::setNoCasServerValidation();
			phpCAS::setFixedServiceURL('https://sniut.univ-perp.fr/scodoc/');
			//phpCAS::setFixedServiceURL('www/CAS/CAS.php');
			phpCAS::forceAuthentication();

			$nip = phpCAS::getUser();
			//$nip = substr($nip,1);
			//var_dump($nip);
			// Login information of a scodoc user that can access notes
			//$sco_user = '';
			//$sco_pw = '';
				
			//$sco_url = 'https://scodoc.iut.univ-perp.fr/ScoDoc/';
			  $sco_url = 'http://192.168.110.111'.$this->root.'presentation';

			$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; fr; rv:1.8.1) Gecko/20061010 Firefox/2.0';
			}

		}
		
		
	if($page=='enregistrement'){
		require('Pages/formPrincipal.php');	
       
		/*if((! isset($_SESSION['accepter'])) || ($_SESSION['accepter'] !== true)){
		
		header('location:accueil');
		}
			
		require('Pages/controllers.php');
		require('Pages/formPrincipal.php');
		
		$ct= new Controleur();

		if(isset($_POST['enreg'])) {

			if(isset($_FILES['fich'])){

				$ct->uploadPhoto();
			}	
			
			require('Pages/sessstart.php');	
			
			
		
		}	
*/
	//}
		

	}
		
	}
	else{

	   require('sections/nav.php');
	   require('Pages/accueil.php');

	}
	require('sections/footer.php');

?>
