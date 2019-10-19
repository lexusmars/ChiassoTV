<main>

    <!-- Chiasso News -->
    <div class="container-fluid p-0">
        <div id="chiassoNewsVideo" class="w-100 p-4" style="background-image: url('/application/assets/img/map/map_chiasso.png'); background-size: contain">
            <h1 class="card-title h1-responsive pt-3 mb-5 font-bold text-center"><strong>Chiasso News</strong></h1>
            <div class="row justify-content-center">
                <div class="embed-responsive embed-responsive-16by9" style="max-width: 50rem;">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/phoY2ovC7Ks?autoplay=1"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow slideInLeft">
        <!-- Card group -->
        <div class="card-group">

            <!-- Card -->
            <div class="card mb-4">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title">Card title</h4>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary btn-md">Read more</button>

                </div>
                <!-- Card content -->

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/48.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">Card title</h4>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary btn-md">Read more</button>

                </div>
                <!-- Card content -->

            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/77.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title">Card title</h4>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary btn-md">Read more</button>

                </div>
                <!-- Card content -->

            </div>
            <!-- Card -->

        </div>
        <!-- Card group -->
    </div>

    <div class="container-fluid wow slideInLeft">
        <div class="row black white-text">
            <h3 class="h3-responsive">Ultime uscite</h3>
        </div>
        <!-- Slider main container -->
        <div class="swiper-container" style="margin-bottom: 10vh;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach (EpisodeModel::getNewestVideos(N_NEWEST_VIDEOS_HOMEPAGE) as $episode): ?>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-header"><h3 class="h3-responsive"><?php echo $episode->getTitle(); ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="view overlay zoom">
                                    <div class="text-center">
                                        <img class="img-fluid w-50"
                                             src="https://img.youtube.com/vi/<?php echo $episode->getLink(); ?>/mqdefault.jpg"/>

                                        <div class="mask flex-center waves-effect waves-light">
                                            <p class="white-text">Zoom effect</p>
                                        </div>
                                    </div>
                                </div>

                                <?php if (!empty($episode->getDescription())): ?>
                                    <br>
                                    <h4 class="h5-responsive">Descrizione</h4>
                                    <hr>
                                    <p><?php echo $episode->getDescription(); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Slides -->
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</main>

<script src="/application/assets/js/addons/jarallax.min.js"></script>
<script>
    $('.jarallax').jarallax({
        speed: 0.2
    });
</script>
