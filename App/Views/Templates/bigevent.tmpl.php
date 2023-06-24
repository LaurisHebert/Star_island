<?php
$mainLogo = $data->searchMediaByType('mainLogo')[0];
?>
<main class="container d-flex flex-column mb-3 text-center fs-1" style="height: 100vh">
        <h1 class="my-auto"><img src="<?= $data->searchMediaByType('mainLogo')[0]->path ?>" alt="<?= $data->searchMediaByType('mainLogo')[0]->name ?>"></h1>
        <p class="my-auto"><?= $data->description ?></p>
        <h2 class="mt-auto mb-5">COUNTDOWN :</h2>
        <p class="mb-auto" id="countDown"></p>
</main>
<script>
    let countDownDate = new Date("<?= $data->end_date ?>").getTime();
</script>