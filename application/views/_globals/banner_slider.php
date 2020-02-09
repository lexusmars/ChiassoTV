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
<?php endif; ?>
