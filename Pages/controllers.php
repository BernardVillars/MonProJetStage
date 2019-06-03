<?php
require('connexion.php');

class Controleur
{
	private $objetconnexion=null;
    private $root ="/accesGb/";
	public function __construct()
     {
      $this->objetconnexion = Connexion::getInstance();

     }

	public function load($posts)
	{
		$obc=$this->objetconnexion;

       if(!empty($posts['email'])&&!empty($posts['login'])&&!empty($posts['pasword'])&&!empty($posts['pasword2']))
		  {
		   	   $login=$posts['login'];
		       $email=$posts['email'];
			   $psw= $posts['pasword'];
			   $psw2= $posts['pasword2'];
			  // Commande pour hacher le mot de passe et le renvoyer dans la base de données.
				  $ach= hash("sha256",$psw);

			$resu=$obc->get_cnt_line_psw($login,$ach);
			$resu2=$obc->get_cnt_line_psw($email,$ach);
			  // Si l'utilisateur n'est pas déja enregistré.
			  if($resu==0 && $resu2==0)
			  {
				  // Si le mot de passe et sa confirmation sont identiques.
				  if($psw==$psw2)
				  {
						  $resultat=$obc->load_User($login,$email,$ach);
						  if($resultat)
							  {
								  echo'<script>Comptecree()</script>';
								  			                
							  }

							  else
							  {
								 echo'<script>ComptePascree()</script>';						  
								  
							  }

				  }
				  else{
					  echo '<script>ConfirmPass()</script>';

				  }
			  }
			  else{
				  echo '<script>IdentExist()</script>';
			  }

		 }
	}

   public function verif_ident($posts)
	{
		$obc=$this->objetconnexion;

		if(!empty($posts['login'])&&!empty($posts['pasword'])){

			$login=$posts['login'];
			$psw=$posts['pasword'];
			$ach= hash("sha256",$psw);

		//Verification existence du login et son mot de passe sur la base de données
		$resu=$obc->get_cnt_line_psw($login,$ach);

		//Si le mot de passe associer à son login existe
		if($resu>0){
			
			$idUser=$obc->get_id_user($login);
			$droit=$obc->get_droit_user($idUser);
			
			if($droit==1){
			$_SESSION['accepter']=true;
			//Rediriger versla page formPrincipal	
			header('Location:'.$this->root.'enregistrement');
			}
			else{
				$_SESSION['authentification']=1;
				header('Location:'.$this->root.'accueil');
			}
		
		}else{
			$_SESSION['authentif']=1;
		header('Location:'.$this->root.'authentification');
	
		}
	  }
	}

	public function envoi_pwd($posts)
	{
		$obc=$this->objetconnexion;
		if (!empty($posts['email'])&&!empty($posts['login'])) {
				$mail=$posts['email'];
			    $login = $posts['login'];

			$resu=$obc->get_cnt_line_mail($login,$mail);

			if($resu>0){

			$psw=uniqid('', false);

			//$url="http://localhost/accesGb/Pages/changerMotPasse.php";
			$url="http://192.168.110.111".$this->root."chmp";
				
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = 'Bonjour, voici votre nouveau mot de passe : '.$login.' Si vous souhaitez le changer, cliquez sur ce lien : '.$url;
			$message_html = '<html><head></head><body>Bonjour '.$login.', voici votre nouveau mot de passe : '.$psw.'<br/>Si vous souhaitez le changer, cliquez sur ce lien : <br/><br/>
			<a href="'.$url.'">'.$url.'</a></body></html>';
			
			//==========

			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========

			//=====Définition du sujet.
			$sujet = "Nouveau mot de passe";
			//=========

			//=====Création du header de l'e-mail.
			$header = "From: \"SiteGB\"<bdd@univ-perp.fr>".$passage_ligne;
			$header.= "Reply-to: \"\" <>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========

			//=====Envoi de l'e-mail.
			ini_set("SMTP", "smtp.univ-perp.fr");

			mail($mail,$sujet,$message,$header);

			$ach= hash("sha256",$psw);
			$resu2=$obc->update_psw($ach,$mail,$login);

			if($resu2){

				$_SESSION['mpo']=1;
				header('Location:'.$this->root.'mpo');			

			}

			}
			else{
		$_SESSION['mpo']=0;
		header('Location:'.$this->root.'mpo');
		}
	}
  }

public function changer_pwd($posts)
{
	$obc=$this->objetconnexion;

	$resu2;	if(!empty($posts['login'])&&!empty($posts['email'])&&!empty($posts['oldmdp'])&&!empty($posts['newmdp'])&&!empty($posts['confmdp'])){

			$login=$posts['login'];
			$email=$posts['email'];
			$oldmdp=$posts['oldmdp'];
			$ach= hash("sha256",$oldmdp);
			$newmdp=$posts['newmdp'];
			$confmdp=$posts['confmdp'];
         // Si le mot de passe et sa confirmation sont identiques.
		 if($newmdp==$confmdp)
			{
				//Verification existence du login et son mot de passe sur la base de données
				$resu=$obc->get_cnt_line_psw($login,$ach);
				//Si le mot de passe associer à son login existe
			if($resu>0){
   
				$ach= hash("sha256",$newmdp);
				$resu2=$obc->update_psw($ach,$email,$login);
				
				if($resu2>0){
					
					$_SESSION['changpass']=1;
					//Rediriger vers la même page 
			         header('Location:'.$this->root.'chmp');
					}
					else{
						
						$_SESSION['changpass']=2;
					//Rediriger vers la même page 
			         header('Location:'.$this->root.'chmp');
					}

			}
			else{
				$_SESSION['changpass']=0;
				//Rediriger vers la même page 
				 header('Location:'.$this->root.'chmp');

			}
		   }

		  else{
			$_SESSION['changpass']=3;
			//Rediriger vers la même page 
			   header('Location:'.$this->root.'chmp');		
		    }
     }
  }

function uploadPhoto(){
$img_nom="";
	if($this->transfert($img_nom)){

         $obc=$this->objetconnexion;
            
            $img_chemin="images/imgUpload/". $img_nom;

			$obc->enregistreCheminPhoto($img_chemin);
			$result=move_uploaded_file($_FILES['fich']['tmp_name'],$img_chemin);
            }
 
}

function formatDate($txt){
 $date = DateTime::createFromFormat('Y-m-d', $txt);
 return $date->format('d/m/Y');
					  }
 function transfert(&$img_nom)
 {
     //Je récupère les fichiers photos
     $ret=false;
     $img_type=$_FILES['fich']['type'];
     $img_nom= basename($_FILES['fich']['name']);
     $img_desc="essai de transfert de image :".$img_nom;
	 $taille_max=250000;
	 $img_taille=$_FILES['fich']['size'];
	 //On fait un tableau contenant les extensions autorisées.
	//Comme il s'agit de fichiers photos on ne prend que des extensions d'images.
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
	$extension = strrchr($_FILES['fich']['name'], '.');
	//Ensuite on teste
	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
	}
	 
	 if($img_taille>$taille_max) {
		 
            $erreur= "Le fichier est trop gros...";
       
	 }
	
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
     //On formate le nom du fichier ici...
     $img_nom = strtr($img_nom,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		
	//On remplace les lettres accentutées par les non accentuées dans $img_nom.
    //Et on récupère le résultat dans $img_nom
 
    //En dessous, il y a l'expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
    //dans $fichier par un tiret "-" et qui place le résultat dans $img_nom.
     $img_nom = preg_replace('/([^.a-z0-9]+)/i', '_', $img_nom);
     $img_blob= file_get_contents($_FILES['fich']['tmp_name']); 
     $ret=is_uploaded_file($_FILES['fich']['tmp_name']);

     if(!$ret)
     {
         echo "Problème de transfert";
         return false;
     }
     else
     {
         //Le fichier à bien été reçu
		  return true;
         
     }
	}
	 else
     {
		 echo '<script type="text/javascript"> alert("'.$erreur.'")</script>';
	return false;
     }
 }
}
?>
