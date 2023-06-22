<?php
foreach ($data->getMedia()['All'] as $mediaKey => $mediaValue) {
    if ($mediaValue->getTitle() === 'mainLogo') :
        $mainLogo = $mediaValue->getPath();
    endif;
}
?>
<main class="container d-flex flex-column justify-content-around text-center fs-3">
    <h1>
        <img src="<?= $mainLogo ?>" alt="">
    </h1>
    <p><?= $data->getDescription(); ?></p>
    <p id="countDown"></p>
</main>