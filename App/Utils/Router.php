<?php
/*
 * Le routeur réceptionne des variables $_POST, $_GET ou AJAX fetch.
 * Son rôle unique sera de router l'application vers les contôleurs
 * qui  définissent la logique de l'application puis génèrerent les affichages.
 */

// On démarre le moteur de sessions PHP pour gérer les variables de $_SESSION.
use Controllers\Page;
use Models\EventModel;
use Models\PageModel;

session_start();

// On crée une variable qui mixte $_POST et $_GET
$_GP = array_merge($_POST, $_GET);
// On détecte les entrées get ou post pour router vers le contôleur ad hoc.
if (count($_GP)) :
    switch ($_GP['page']) :
        case 'Galerie':
            $pageContent = PageModel::getPageContent('Galerie');
            $pageContent = new PageModel($pageContent);
            $galerie = new Page();
            echo $galerie->display($pageContent);
            break;
        case 'Vip':
            $pageContent = PageModel::getPageContent('Vip');
            $pageContent = new PageModel($pageContent);
            $galerie = new Page();
            echo $galerie->display($pageContent);
            break;
        default:
            $pageContent = PageModel::getPageContent('Accueil');
            $pageContent = new PageModel($pageContent);
            $accueil = new Page();
            echo $accueil->display($pageContent);
            break;
        endswitch;
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