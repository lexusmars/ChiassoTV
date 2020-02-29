<main class="d-none">

    <!-- Spacer -->
    <div class="title-spacer"></div>

    <div id="categories-container" class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive">Serie</h1>
                <hr>
            </div>
        </div>

        <?php if (count($banners) > 0): ?>
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
            <div id="banner-spacer" class="mb-5"></div>
            <br>
        <?php endif; ?>

        <!-- Categories container -->
        <div class="p-3 wow fadeIn">
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
</main>

<script src="/application/assets/js/addons/swiper.min.js"></script>
<script>
    $(document).ready(function () {
        // Init slider
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

        // Hide loader
        $('#loader').addClass("d-none");

        // Show page
        $('main').removeClass("d-none");
        $('header').removeClass("d-none");
        $('footer').removeClass("d-none");
    })
</script>