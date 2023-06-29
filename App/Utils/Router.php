<?php

use Controllers\Page;
use Controllers\Team;
use Models\EventModel;
use Models\PageModel;
use Models\TeamModel;

/*
 * Le routeur réceptionne des variables $_POST, $_GET ou AJAX fetch.
 * Son rôle unique sera de router l'application vers les contrôleurs
 * qui  définissent la logique de l'application puis génèrent les affichages.
 */

// On démarre le moteur de sessions PHP pour gérer les variables de $_SESSION.
session_start();


// On crée une variable qui mixte $_POST et $_GET
$_GP = array_merge($_POST, $_GET);
// On détecte les entrées de $_GP pour router vers le contrôleur ad hoc.
if (count($_GP)) :
    if ($_SESSION['bigEvent']):
        header("Location: __DIR__ ./../../public/index.php");
        exit();
    else :
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
                case 'Team':
                $team = TeamModel::getTeam();
                $team = new TeamModel($team);
                $teamPage = new Page();
                echo $teamPage->display($team);
                break;
            case 'Event':
                $id = intval($_GP['i']);
                $eventContent = EventModel::getEvent($id);
                $eventContent = new EventModel($eventContent);
                $event = new Page();
                echo $event->display($eventContent);
                break;
            default:
                $pageContent = PageModel::getPageContent('Accueil');
                $pageContent = new PageModel($pageContent);
                $accueil = new Page();
                echo $accueil->display($pageContent);
                break;
        endswitch;

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
        if ($data->role){

            $filteredMembers = TeamModel::getTeam($data->role);
            echo json_encode($filteredMembers);
            exit();
        }
        
    endif;