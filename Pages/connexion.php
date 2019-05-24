<?php

class Connexion
{
 private static $instance = null;
  private $conn;
  private $host = '';
  private $user = '';
  private $pass = '';
  private $name = '';
	
	private function __construct()
  {
	  $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new Connexion();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->conn;
  }
	
  public function load_User($login,$email,$ach)
	{ 
		  $bdd=$this->conn;
		  $idstatut=2;
		
		try
		{
			 $cmd=$bdd->prepare("INSERT INTO User(Login,Email,Password,IdStatut) VALUES (:log, :em, :pw, :idstat)");
								  $cmd->bindParam(':log', $login);
								  $cmd->bindParam(':em', $email);
								  $cmd->bindParam(':pw', $ach);
								  $cmd->bindParam(':idstat',$idstatut);
								  $resultat=$cmd->execute();
								  $cmd->closeCursor();
				 return $resultat;
		 }
	  catch (PDOException $e) 
		{
		 // génération du message d'erreur
		 $message = sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage());

		 echo $message;
		}					  
		
	}
	
	public function update_psw($ach,$email,$login)
	{
		$bdd=$this->conn;
		
		try
		{
			$cmd=$bdd->prepare("UPDATE User SET Password=:pw WHERE Login=:log AND Email=:eml");
								  $cmd->bindParam(':pw', $ach);
								  $cmd->bindParam(':log', $login);
								  $cmd->bindParam(':eml', $email);
								  $resultat=$cmd->execute();
								  $cmd->closeCursor();
				 return $resultat;
		 }
	  catch (PDOException $e) 
		{
		 // génération du message d'erreur
		 $message = sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage());

		 echo $message;
		}					  
	}
	
	public function get_cnt_line_mail($login,$mail)
	{
		$bdd=$this->conn;
		try
		{
				
			$cmd=$bdd->prepare("SELECT COUNT(*) from User WHERE Login =:log and Email =:eml");
			$cmd->bindParam(':log', $login);
			$cmd->bindParam(':eml', $mail);	
			$cmd->execute();
			$resultat=$cmd->fetchColumn();
			$cmd->closeCursor();
								
			return $resultat;
		}
		catch (PDOException $e) 
			{
			 // génération du message d'erreur
			 $message = sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage());

			 echo $message;
			}
		
	}
	
	public function get_cnt_line_psw($login,$psw)
	{
		$bdd=$this->conn;
		try
		{

            if(stristr($login, '@') == FALSE){
				
			$cmd=$bdd->prepare("SELECT COUNT(*) from User WHERE Login =:log and Password =:psw");
			$cmd->bindParam(':log', $login);
			$cmd->bindParam(':psw', $psw);
			$cmd->execute();
			$resultat=$cmd->fetchColumn();
			$cmd->closeCursor();
			
			}
			
			else{
				
			$cmd=$bdd->prepare("SELECT COUNT(*) from User WHERE Email =:eml and Password =:psw");
			$cmd->bindParam(':eml', $login);
			$cmd->bindParam(':psw', $psw);
			$cmd->execute();
			$resultat=$cmd->fetchColumn();
			$cmd->closeCursor();
								
			}
			
			return $resultat;
		}
		catch (PDOException $e) 
			{
			 // génération du message d'erreur
			 $message = sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage());

			 echo $message;
			}
	}
	
   public function close_database_connection(&$link)
	{
		$link = null;
	}	
	public function get_login($psw)
	{
		$bdd=$this->conn;
		$bdd=$this->conn;
		$cmd=$bdd->prepare("select Login from User where Password=:psw");
		$cmd->bindParam(':psw', $psw);
		$cmd->execute();
		$resultat=$cmd->execute();
		$cmd->closeCursor();
		
	return $resultat;
	}
	
	public function enregistreCheminPhoto($img_chemin){
		$bdd=$this->conn;
		 $requete1='INSERT INTO Photo (Nom)
            VALUES("'. $img_chemin.'")';
                   $bdd->exec($requete1);
                   
	}

}
	
?>
