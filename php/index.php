<?php 
    //paramètres de connexion en constantes
    //soit localhost, soit l'IP du serveur
    define("DBHOST", "localhost");
    //utilisateur de la base (différent de PHPmyAdmin)  
    define("DBUSER", "root");
    //mot de passe
    define("DBPASS", "");           
    //nom de la base de données
    define("DBNAME", "portfolio");
//on est dans le contrôleur frontal \o/
//ce fichier reçoit toutes les requêtes au site
spl_autoload_register();
include("Controller.php");
//on instancie notre contrôleur où sont toutes nos méthodes
//pour chaque page
//on inclue d'abord la définition de la classe

$controller = new Controller();

//si on n'a pas de paramètre dans l'URL... c'est l'accueil
if (empty($_GET['page'])){
    $controller->home();
}
//si on a le paramètre page qui vaut cgu... c'est la page cgu
elseif($_GET['page'] == 'CV'){
    $controller->PageCV();
}
elseif($_GET['page'] == 'Reco'){
    $controller->reco();
}
elseif($_GET['page'] == 'Contact'){
    $controller->contact();
}
//si on n'a pas trouvé la page, alors c'est une erreur 404 ! 
else {
    $controller->erreur404();
}