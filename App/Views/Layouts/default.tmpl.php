<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Popper JS -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap CSS/JS -->
    <link href="./Css/bootstrap.min.css" rel="stylesheet">
    <script src="./Js/bootstrap.min.js" defer></script>

    <!-- Custom CSS/JS -->
    <link href="./Css/style.css" rel="stylesheet">
    <script src="./Js/script.js" defer></script>

    <!-- Changement du titre modifié par le contrôleur -->
    <title>{pageTitle}</title>

    <!-- Changement de la description modifié par le contrôleur -->
    <meta name="description" content="{pageDescription}">
</head>
    <!-- laisser le choix pour le darkmode -->
    <body data-bs-theme=dark class="fs-3">
        <?php require_once(__DIR__ . '/../../Views/Partials/header.tmpl.php'); ?>
            {pageContent}
        <?php require_once(__DIR__ . '/../../Views/Partials/footer.tmpl.php'); ?>
    </body>
</html>