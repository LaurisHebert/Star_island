<div id="carouselIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <h2>First slide label</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque ducimus
                ea magni nam nisi omnis soluta! Amet doloremque itaque, labore officia pariatur quae quo sunt!</p>
        </div>
        <!--ITEM 2-->
        <div id="commentSpace" class="carousel-item">

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
        <!--FIN ITEM 2-->
        <!--Troisieme item Carousel-->
        <div class="carousel-item">
            <section class="commentTopServeur">
                <img class="" src="./Imgs/discord.png">
            </section>
        </div>
    </div>
    <!--FIN troisieme item Carousel-->
</div>
<!--Espace commentaire du bas-->

<div class=" container containerComments">

    <div class="card text-center avisBottom">
        <div class="card-body">
            <h5 class="card-title">Votre avis nous intéresse</h5>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <button> Publier</button>
        </div>
    </div>
</div>











$stocke = "
SELECT * FROM event e
INNER JOIN event_content 		AS ec 		ON ec.event_id = e.id
INNER JOIN content 				AS c 		ON c.id = ec.content_id
INNER JOIN event_media			AS em		ON em.event_id = e.id
INNER JOIN media				AS m		ON m.id = em.media_id
INNER JOIN media_media_type		AS mmt		ON mmt.media_id = m.id
INNER JOIN media_type			AS mt 		ON mt.id = mmt.media_type_id

WHERE start_date < NOW() AND end_date > NOW() AND importance = 'BIG' ORDER BY e.start_date DESC
";
