<?php

use Controllers\Page;
use Models\EventModel;
use Models\PageModel;

unset($_SESSION['events']);

$_SESSION['events'] = EventModel::getEvents();
$bigEvent = null;

foreach ($_SESSION['events'] as $event) :
    if ($event['pageName'] == 'BigEvent') {
        $bigEvent = $event['id'];
    }
endforeach;

if (1==2 && $bigEvent !== null) {
    $bigEventContent = new EventModel(EventModel::getEvent($bigEvent));

    $bigEvent = new Page();
    echo $bigEvent->display($bigEventContent);
}else{
    $accueilContent = new PageModel(PageModel::getPageContent('Accueil'));

    $accueil = new Page();
    echo $accueil->display($accueilContent);
}
// récupérer le contenu de la page dans la base de données
