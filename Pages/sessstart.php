<?php
//session_start();
if(! empty($_POST)) {
    $_SESSION['sauvegarde'] = $_POST ;
    $_SESSION['sauvefile'] = $_FILES;
    $fichierActuel = $_SERVER['PHP_SELF'];
	
    if(!empty($_SERVER['QUERY_STRING'])) {
		//if($_SERVER['QUERY_STRING']=="page=".$page){
			$fichierActuel = $root.$page;
		//}
    }
   
    header('Location: ' . $fichierActuel);	
    exit;
}

if(isset($_SESSION['sauvegarde'])) {
    $_POST = $_SESSION['sauvegarde'];
    $_FILES = $_SESSION['sauvefile'];
    unset($_SESSION['sauvegarde']);
	unset($_SESSION['sauvefile']);
}
?> 