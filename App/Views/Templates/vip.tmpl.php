<?php
foreach ($data->content as $content) :
    switch ($content->title) :
        case 'Vip':
            $contentVip = $content;
            break;
        case 'Vip+':
            $contentVipPlus = $content;
            break;
    endswitch;
endforeach;

foreach ($data->searchMediaByType('logo', true) as $media) :
    if ($media->name == 'Vip') {
        $mediaVip = $media;
    }
    if ($media->name == 'Vip+') {
        $mediaVipPlus = $media;
    }
endforeach;
?>
<main class="container-fluid text-center fs-4 ">

    <h1 class="m-5 p-5 ">DEVENIR VIP</h1>

    <div class="row justify-content-end m-5 p-5">
        <section class="col-lg-4 col-12">
            <h2 class="text-decoration-underline text-danger-emphasis"><?= $contentVip->title ?></h2>
            <p><?= $contentVip->description ?></p>
        </section>
        <div class="col-4 d-flex justify-content-center">
            <img class="m-4 d-none d-lg-flex border border-danger" src="./<?= $mediaVip->path ?>">
        </div>
    </div>

    <div class="row justify-content-start m-5 p-5">
        <div class="col-4 d-flex justify-content-center">
            <img class="m-4 d-none d-lg-flex border border-danger" src="./<?= $mediaVipPlus->path ?>">
        </div>
        <section class="col-lg-4 col-12">
            <h2 class="text-decoration-underline text-danger-emphasis"><?= $contentVipPlus->title ?></h2>
            <p><?= $contentVipPlus->description ?></p>
        </section>
    </div>
</main>

