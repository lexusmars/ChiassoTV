<!-- TODO: ADD LOADING SCREEN -->

<main>

    <!-- Chiasso News -->
    <div class="container-fluid p-0">
        <div id="chiassoNewsVideo" class="w-100 p-4" style="background-image: url('/application/assets/img/map/map_chiasso.png'); background-size: contain">
            <h1 class="card-title h1-responsive pt-3 mb-5 font-bold text-center"><strong>Chiasso News</strong></h1>
            <div class="row justify-content-center">
                <div class="embed-responsive embed-responsive-16by9 wow fadeInLeft" style="max-width: 50rem;">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/phoY2ovC7Ks?autoplay=1"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive">Serie</h1>
                <hr>
            </div>
        </div>

        <!-- Categories container -->
        <div id="categories-container" class="p-5 wow fadeInLeft">
            <!-- Container -->
            <div class="row text-center">

                <?php if(count($categories) > 0): ?>

                        <?php foreach($categories as $category): ?>
                        <!-- Column -->
                            <div class="col-md-3 mb-4 d-flex align-items-stretch">
                                <!--Card-->
                                <div class="card">
                                    <!--Card image-->
                                    <div class="view overlay zoom">
                                        <img src="<?php echo CATEGORIES_IMG_LINK . $category->getCategoryImagePath(); ?>" class="card-img-top"
                                             alt="'<?php echo $category->getCategoryName(); ?>' category image">
                                        <a href="/serie/<?php echo $category->getCategoryId();?>">
                                            <div class="mask flex-center rgba-black-strong">
                                                <p class="white-text">Visualizza gli episodi</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><?php echo $category->getCategoryName(); ?></h4>
                                        <!--Text-->
                                        <p class="card-text">
                                            <?php if(empty($category->getCategoryDescription())): ?>
                                                <?php echo "Nessuna descrizione disponibile."; ?>
                                            <?php else: ?>
                                                <?php echo $category->getCategoryDescription(); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>
                            <!-- Column -->
                        <?php endforeach; ?>

                <?php else: ?>
                    <div class="col-md-12">
                        <h1><i class="fas fa-exclamation-triangle"></i> Oops! Non ci sono serie per il momento. Riprova più tardi</h1>
                    </div>
                <?php endif; ?>


            </div>
            <!-- Container -->
        </div>
        <!-- Categories container -->
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
