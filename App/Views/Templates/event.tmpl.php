<?php
$mainLogo = $data->searchMediaByType('mainLogo')[0];
?>
<main class="container-fluid d-flex align-content-center">
    <div class="container d-flex flex-column ">
        <img class="m-auto p-auto align-self-center" src="./Imgs/gta_decors4.jpg">
    </div>
    <section class="container d-flex flex-column text-center fs-1">
    <h2 class="mb-5">COUNTDOWN:</h2>
    <p class="mb-auto" id="countDown"></p>
    <h1 class="my-auto"><?= $data->title ?></h1>
    <p class="my-auto"><?= $data->description ?>
    </p>
    </section>
</main>
<script>
    let countDownDate = new Date("<?= $data->end_date ?>").getTime();
</script>