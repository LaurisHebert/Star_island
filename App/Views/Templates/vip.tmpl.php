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

    <h1 class="my-lg-5 py-lg-5 my-sm-3 py-sm-3">DEVENIR VIP</h1>

    <div class="row justify-content-end my-2 py-2">
        <section class="col-xxl-4 col-12">
            <h2 class="text-decoration-underline text-danger-emphasis"><?= $contentVip->title ?></h2>
            <p><?= $contentVip->description ?></p>
        </section>
        <div class="col-4 d-flex justify-content-center">
            <img class="m-4 d-none d-xxl-flex border border-danger" src="./<?= $mediaVip->path ?>">
        </div>
    </div>

    <div class="row justify-content-start my-2 py-2">
        <div class="col-4 d-flex justify-content-center">
            <img class="m-4 d-none d-xxl-flex border border-danger" src="./<?= $mediaVipPlus->path ?>">
        </div>
        <section class="col-xxl-4 col-12">
            <h2 class="text-decoration-underline text-danger-emphasis"><?= $contentVipPlus->title ?></h2>
            <p><?= $contentVipPlus->description ?></p>
        </section>
    </div>
</main>
