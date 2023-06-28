<?php

use Controllers\Page;
use Models\EventModel;
use Models\PageModel;

unset($_SESSION['events']);

$_SESSION['events'] = EventModel::getEvents();
$bigEvent = null;

foreach ( $_SESSION['events'] as $event) :
    if ($event['meta_title'] == 'BigEvent' && 1==2) {
        $bigEvent = $event['id'];
    }
endforeach;
if (isset($bigEvent) && !empty($bigEvent)){

}
if ($bigEvent !== null) {
    $bigEventContent = new EventModel(EventModel::getEvent($bigEvent));
    $_SESSION['bigEvent'] = $bigEventContent->end_date;

    $bigEvent = new Page();
    echo $bigEvent->display($bigEventContent);
}else{
    $accueilContent = new PageModel(PageModel::getPageContent('Accueil'));

    $accueil = new Page();
    echo $accueil->display($accueilContent);
}
// récupérer le contenu de la page dans la base de données
