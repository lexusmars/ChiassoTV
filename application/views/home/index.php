<main class="d-none">
    <!-- Chiasso News -->
    <div class="container-fluid p-0">
        <div id="chiassoNewsVideo" class="w-100 p-4"
             style="background-image: url('/application/assets/img/map/sottoceneri-map-black.jpg'); background-size: contain">

            <!-- Spacer -->
            <div class="title-spacer" style="height: 10vh;"></div>

            <h1 class="card-title h1-responsive pt-3 mb-5 font-bold text-center text-white"><strong>
                    <!--
                    <span style="color: rgb(21,101,192)">Chiasso</span>
                    <span class="font-weight-bold" style="color: rgba(198,40,40, 0.8)">News</span>
                    -->
                    Chiasso TV
                </strong>
            </h1>
            <div class="row justify-content-center">
                <?php if(isset($chiasso_news_episode)): ?>
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 50rem;">
                        <iframe class="embed-responsive-item"
                                title="<?php echo $chiasso_news_episode->getTitle(); ?>"
                                aria-hidden="true"
                                src="https://www.youtube.com/embed/<?php echo $chiasso_news_episode->getLink(); ?>?&autoplay=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php else: ?>
                    <div class="col-md-12 text-center text-white">
                        <h1 class="h1-responsive"><i class="fas fa-exclamation-triangle"></i> Al momento non c'è nessun episodio di Chiasso News da visualizzare.</h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (count($banners) > 0): ?>
        <!-- Sponsor -->
        <div class="container-fluid mb-3 mt-5 overflow-hidden">
            <div class="swiper-banner-container">
                <div class="swiper-wrapper image-slider-wrapper">
                    <?php foreach($banners as $banner): ?>
                        <div class="swiper-slide image-slide">
                            <!--Zoom effect-->
                            <div class="view overlay">
                                <?php if(strlen($banner->getLink()) > 0): ?>
                                    <a href="<?php echo $banner->getLink();?>" target="_blank">
                                        <img class="banner w-100" src="<?php echo BANNERS_IMG_LINK . $banner->getImgName()?>"
                                             class="img-fluid"
                                             alt="Sponsor banner">
                                    </a>
                                <?php else: ?>
                                    <img class="banner w-100" src="<?php echo BANNERS_IMG_LINK . $banner->getImgName()?>"
                                         class="img-fluid"
                                         alt="Sponsor banner">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Add Arrows -->
                <div class="swiper-banner-button-next text-danger font-weight-bold"></div>
                <div class="swiper-banner-button-before text-danger font-weight-bold"></div>
            </div>
        </div>
        <!-- Sponsor -->
    <?php endif; ?>

    <div id="categories-container" class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive">Serie</h1>
                <hr>
            </div>
        </div>

        <!-- Categories container -->
        <div class="p-3">
            <!-- Container -->
            <div class="row text-center">

                <?php if (count($categories) > 0): ?>

                    <?php foreach ($categories as $category): ?>
                        <!-- Column -->
                        <div class="col-md-3 mb-4 d-flex align-items-stretch">
                            <!--Card-->
                            <div class="card">
                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="<?php echo CATEGORIES_IMG_LINK . $category->getCategoryImagePath(); ?>"
                                         class="card-img-top"
                                         alt="'<?php echo $category->getCategoryName(); ?>' category image">
                                    <a href="/serie/episodi/<?php echo $category->getCategoryId(); ?>">
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
                                        <?php if (empty($category->getCategoryDescription())): ?>
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

                    <?php if (CategoriesModel::countCategories() > N_CATEGORIES_HOMEPAGE): ?>
                        <div class="col-md-12">
                            <a href="/serie"><p class="btn btn-red">Visualizza tutte le serie</p></a>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="col-md-12">
                        <h1><i class="fas fa-exclamation-triangle"></i> Oops! Non ci sono serie per il momento. Riprova
                            più tardi</h1>
                    </div>
                <?php endif; ?>


            </div>
            <!-- Container -->
        </div>
        <!-- Categories container -->
    </div>

    <!-- Partner -->
    <div id="partner-container" class="container-fluid purple-background" style="background-color: #5252d4;">
        <div class="row p-5 mask d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <h1 class="h1-responsive text-white">Official partner of <a href="https://momohill.com/" target="_blank" rel="noreferrer">Momohill Film Fair Switzerland</a></h1>
            </div>
            <div class="col-md-4">
                <img src="/application/assets/img/partners/momohill.jpg" class="img-fluid" alt="Momohill Film Fair Switzerland logo">
            </div>
        </div>
    </div>

    <?php if(count($newest_episodes) > 0): ?>
    <div class="container-fluid wow fadeIn" id="ultimi-caricamenti">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center h1-responsive">Ultime uscite</h1>
                <hr>
            </div>
            <div class="col-md-12 mb-3">
                <h3 class="text-center grey-text h3-responsive">Scorri i video utilizzando le freccette rosse</h3>
            </div>
        </div>
    </div>
    <!-- Partner -->

    <!-- Swiper -->
    <div class="container-fluid">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($newest_episodes as $episode): ?>
                    <div class="swiper-slide">
                        <!--Zoom effect-->
                        <div class="view overlay">
                            <img src="https://img.youtube.com/vi/<?php echo $episode->getLink();?>/mqdefault.jpg"
                                 class="img-fluid h-100 w-100"
                                 alt="'<?php echo $episode->getTitle(); ?>' video thumbnail">

                            <div class="mask flex-center waves-effect waves-light rgba-black-strong">
                                <a href="/episodio/player/<?php echo $episode->getEpisodeIdentifierNumber();?>">
                                    <div class="row p-5 text-left">
                                        <div class="col-md-12">
                                            <h1 class="h1-responsive font-weight-bold white-text">
                                                <?php echo $episode->getCategory()->getCategoryName(); ?>
                                            </h1>
                                        </div>
                                        <div class="col-md-12">
                                            <h3 class="h3-responsive white-text"><?php echo $episode->getTitle(); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Arrows -->
            <div class="swiper-button-next text-danger font-weight-bold"></div>
            <div class="swiper-button-prev text-danger font-weight-bold"></div>
        </div>
    </div>
    <?php endif; ?>
</main>

<script src="/application/assets/js/addons/swiper.min.js"></script>
<script>
    $(document).ready(function () {
        let swiper = new Swiper('.swiper-container', {
            init: true,
            effect: 'coverflow',
            coverflowEffect: {
                slideShadows: false,
            },
            centeredSlides: true,
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            observer: true,
            observeParents: true
        });
        swiper.init();

        let swiper_banner = new Swiper('.swiper-banner-container', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 40,
            loop: true,
            speed: 1000,
            automaticResize: true,
            autoplay: {
                delay: <?php echo BANNER_SWIPER_DELAY; ?>,
                disableOnInteraction: false,
                waitForTransition: true,
            },
            observer: true,
            observeParents: true
        });
        swiper_banner.init();
    });
</script>