<header class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <nav id="navBar" class="overflow-y-visible container-fluid ">
        <a id="test2" class="navbar-brand" href="/projets/Star_island/public/">
            <img id="test" src="./<?= $data->searchMediaByType('mainLogo')['0']->path ?>" class=" d-inline-block align-text-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/projets/Star_island/public/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=Galerie">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=Vip">Devenir VIP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projets/Star_island/public/?page=Team">L'équipe</a>
                </li>

            </ul>
            <ul class="navbar-nav d-table-row">
                <li class="nav-item">
                    <a class="nav-link" href="/projets/Star_island/public/">Tutoriel</a>
                </li>
                <?php if (!empty($_SESSION['events'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Events
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($_SESSION['events'] as $event) : ?>
                                <li><a class="dropdown-item" href="/projets/Star_island/public/?page=event&<?= $event['id'] ?>"><?= $event['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
