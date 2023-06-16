<?php

use Controllers\Page;
use Models\EventModel;
use Models\PageModel;
use Utils\Database\PdoDb;

$sqlLogo = "
SELECT * FROM `media` m 
INNER JOIN media_media_type mmt on mmt.media_id = m.id
INNER JOIN media_type mt on mt.id = mmt.media_type_id
WHERE m.name = 'mainlogo' AND mt.title = 'logo'
";
$starIslandLogo = PdoDb::getInstance()->select($sqlLogo, "fetch");

unset($_SESSION['bigEvent']);

$bigEvent = EventModel::getEvents('BIG');

if (!empty($bigEvent) && $bigEvent[0]["start_date"] < date("Y-m-d H:i:s") && $bigEvent[0]["end_date"] > date("Y-m-d H:i:s")):

    $_SESSION['bigEvent'] = new EventModel($bigEvent[0]);

endif;


if (!empty($_SESSION['bigEvent'])):
    $pageEvent = new Page();
    echo $pageEvent->display($_SESSION['bigEvent']);
else:
// récupérer le contenu de la page dans la base de données

    $pageContent = PageModel::getPageContent('Accueil');
    $pageContent = new PageModel($pageContent);

// afficher le contenu dans la page Page
    $accueil = new Page();
    echo $accueil->display($pageContent);
endif;
