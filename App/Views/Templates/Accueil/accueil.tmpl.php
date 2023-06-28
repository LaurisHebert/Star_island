<?php
$comments = [
    [
        'profilPicture'=>"Imgs/Perso1.jpg",
        'stars'=> "2",
        'comment'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque",
        'date'=>"01/01/2022"
    ],
    [
        'profilPicture'=>"Imgs/Perso1.jpg",
        'stars'=> "2",
        'comment'=>"Lorem2 ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque",
        'date'=>"02/01/2022"
    ],
    [
        'profilPicture'=>"Imgs/Perso1.jpg",
        'stars'=> "2",
        'comment'=>"Lorem3 ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque",
        'date'=>"03/01/2022"
    ],
    [
        'profilPicture'=>"Imgs/Perso1.jpg",
        'stars'=> "2",
        'comment'=>"Lorem4 ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque",
        'date'=>"04/01/2022"
    ],
    [
        'profilPicture'=>"Imgs/Perso1.jpg",
        'stars'=> "2",
        'comment'=>"Lorem5 ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque",
        'date'=>"05/01/2022"
    ]
];
?>
<main class="container container-lg" >
    <!-- Carousel -->
    <section id="carouselGlobal" class="carousel slide text-center">
        <h1> <?= $data->content['Star_Island']->title ?> </h1>
        <!-- Boutons sous le carousel -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselGlobal" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselGlobal" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselGlobal" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner d-flex align-items-center">
            <!-- première page du carousel -->
            <div class="carousel-item active">
                <h2>First slide label</h2>
                <p> <?= $data->content['Star_Island']->description ?> </p>
            </div>

            <!-- deuxième page du premier carousel -->
            <div id="commentSpace" class="carousel-item">
                <!-- deuxième Carousel -->
                <div class="gallery">
                    <div id="slider" class="slider">
                    </div>
                    <div class="arrows">
                        <div class="left">
                            <button class="carousel-control-prev" type="button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                        </div>
                        <div class="right">
                            <button class="carousel-control-next" type="button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- troisième page du premier carousel -->
            <div class="carousel-item">
                <section class="commentTopServeur">
                    <img class="" src="./Imgs/discord.png">
                </section>
            </div>
        </div>
    </section>
    <!--Espace commentaire-->
    <div>
        <div class="d-flex flex-column-reverse overflow-scroll" style="max-height: 75vh" >
            <?php
            $position = false;
            foreach ($comments as $comment) :
                $position = !$position;
                if ($position) {
                    $direction = 'start';
                }
                else {
                    $direction = 'end';
                }
                ?>
                <div class="comment align-self-<?= $direction ?> card mb-3 rounded-<?= $direction ?>-5 rounded-top-5 btn btn-outline-secondary" style="max-width: 45%">
                    <div class="row g-0 <?php if (!$position) { echo "flex-row-reverse";} ?>">
                        <div class="col-4 align-self-center d-flex" style='max-width:90px; max-height:90px' >
                            <img id="profilPicture" src="./<?= $comment['profilPicture']?>" class="img-thumbnail align-self-center rounded-circle" alt="Image profile">
                        </div>
                        <div class="col-8">
                            <div class="card-body" style="max-width: 540px;">
                                <p id="stars">étoiles IMG</p>
                                <p id="comment" class="card-text text-truncate">
                                    <?= $comment['comment'] ?>
                                </p>
                                <p id="date" class="card-text"><small class="text-body-secondary"><?= $comment['date'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card text-center bg-light bg-opacity-10">
            <div class="card-body">
                <label for="commentSpace">Votre avis nous intéresse</label>
                <textarea class="my-3 form-control" placeholder="Laissez un commentaire..." id="commentSpace" style="height: 100px"></textarea>
                <button type="submit"> Publier</button>
            </div>
        </div>
    </div>

</main>