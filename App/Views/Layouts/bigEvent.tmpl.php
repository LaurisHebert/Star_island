<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{pageDescription}">

    <link href="./Css/style_teaser.css" rel="stylesheet">
    <link href="./Css/bootstrap.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <script defer src="./Js/script_bigEvents.js"></script>

    <title>{pageTitle}</title>
</head>
<body>
<main class="container d-flex flex-column justify-content-around text-center fs-3">
    {pageContent}
</main>
<?php require_once(__DIR__ . '/../../Views/Partials/nav.tmpl.php'); ?>
</body>
</html>