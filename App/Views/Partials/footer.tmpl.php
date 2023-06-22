<?php
$logoPath = [];
foreach ($data->searchMediaByType('logo') as $logo) :

    switch ($logo->name) :
        case 'PEGI18':
            $logoPath['PEGI18'] = $logo->path;
            break;
        case 'contact':
            $logoPath['contact'] = $logo->path;
            break;
    endswitch;
endforeach;
?>

<footer class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= $logoPath['contact'] ?>" alt="contact-icon" width="30" height="24">
                Contact
            </a>
            <a class="navbar-brand" href="#">
                <img src="./<?= $logoPath['PEGI18']?>" alt="PEGI18" width="24" height="30">
            </a>
        </div>
</footer>

