<?php


/*
 * Le routeur réceptionne des variables $_POST, $_GET ou AJAX fetch.
 * Son rôle unique sera de router l'application vers les contôleurs
 * qui  définissent la logique de l'application puis génèrerent les affichages.
 */

// On démarre le moteur de sessions PHP pour gérer les variables de $_SESSION.
use Controllers\Page;
use Models\PageModel;

session_start();

// On crée une variable qui mixte $_POST et $_GET
$_GP = array_merge($_POST, $_GET);
// On détecte les entrées get ou post pour router vers le contôleur ad hoc.
if (count($_GP)) :
    if (!empty($_SESSION['bigEvent']) && $_SESSION['bigEvent']->start_date < date("Y-m-d H:i:s") && $_SESSION['bigEvent']->end_date > date("Y-m-d H:i:s") && 1==2) :
        $eventContent = $_SESSION["bigEvent"];
        $pageEvent = new Page();
        echo $pageEvent->display($eventContent);
    else:
// récupérer le contenu de la page dans la base de données
        $pageContent = new PageModel();
        $data = $pageContent->getPageContent('Accueil');

// afficher le contenu dans la page Page
        $accueil = new Page();
        echo $accueil->display($data);
    endif;
endif;

/*
 * Gestion des appels avec AJAX fetch.
 */

// On récupère le flux JSON posté.
$json = file_get_contents('php://input');
// On convertit le flux JSON en tableau d'objets.
$data = json_decode($json);
// On route vers le controller "Annonces" et la méthode d'affichage d'une annonce "annonceDisplay".
if (!empty($data)) :

endif;