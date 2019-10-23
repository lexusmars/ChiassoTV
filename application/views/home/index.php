<!-- TODO: ADD LOADING SCREEN -->

<main class="d-none">
    <!-- Chiasso News -->
    <div class="container-fluid p-0">
        <div id="chiassoNewsVideo" class="w-100 p-4" style="background-image: url('/application/assets/img/map/sottoceneri-map-black.jpg'); background-size: contain">

            <!-- Spacer -->
            <div class="title-spacer" style="height: 10vh;"></div>

            <h1 class="card-title h1-responsive pt-3 mb-5 font-bold text-center"><strong>
                    <span style="color: rgb(21,101,192)">Chiasso</span>
                    <span class="font-weight-bold" style="color: rgba(198,40,40, 0.8)">News</span>
                </strong></h1>
            <div class="row justify-content-center">
                <div class="embed-responsive embed-responsive-16by9 wow fadeInLeft" style="max-width: 50rem;">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $chiasso_news_episode->getLink();?>?&autoplay=1"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div id="categories-container" class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive">Serie</h1>
                <hr>
            </div>
        </div>

        <!-- Categories container -->
        <div class="p-3 wow fadeInLeft">
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
                                        <a href="/serie/episodi/<?php echo $category->getCategoryId();?>">
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

                        <?php if(CategoriesModel::countCategories() > N_CATEGORIES_HOMEPAGE): ?>
                            <div class="col-md-12">
                                <a href="/serie"><p class="btn btn-red">Visualizza tutte le serie</p></a>
                            </div>
                        <?php endif; ?>

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

    <div class="container-fluid wow slideInLeft" id="ultimi-caricamenti">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive">Ultime uscite</h1>
                <hr>
            </div>
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

<!-- Swiper.js lib -->
<script type="text/javascript" src="https://unpkg.com/swiper/js/swiper.min.js"></script>

<script>
    /*
    //initialize swiper when document ready
    var swiper = new Swiper ('.swiper-container', {
        init: false,
        loop: true,
        speed:800,
        slidesPerView: 2, // or 'auto'
        // spaceBetween: 10,
        centeredSlides : true,
        effect: 'coverflow', // 'cube', 'fade', 'coverflow',
        coverflowEffect: {
            rotate: 50, // Slide rotate in degrees
            stretch: 0, // Stretch space between slides (in px)
            depth: 100, // Depth offset in px (slides translate in Z axis)
            modifier: 1, // Effect multipler
            slideShadows : true, // Enables slides shadows
        },
        grabCursor: true,
        parallax: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1023: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        },
    })
     */
</script>