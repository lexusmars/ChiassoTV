<!-- TODO: ADD LOADING SCREEN -->

<main class="d-none">
    <div id="titleSpacer" style="height: 10vh;"></div>
    <div id="categories-container" class="container-fluid">
        <div class="row">
            <?php if (count($episodes) > 0): ?>
                <div class="col-md-3">
                    <a href="/serie">
                        <button class="btn btn-red"><i class="fas fa-arrow-left"></i> Torna alla lista</button>
                    </a>
                </div>
            <?php endif; ?>
            <div class="col-md-12 mt-5 mb-3">
                <h1 class="text-center h1-responsive"><?php echo $category_name; ?></h1>
                <hr>
            </div>
            <?php if(count($episodes) > 0): ?>
                <div class="col-md-12 text-center">
                    <h4 class="h4-responsive grey-text">Gli episodi sono ordinati dal più recente al più vecchio.</h4>
                </div>
            <?php endif; ?>
        </div>

        <!-- Categories container -->
        <div id="episodes-container" class="p-5 wow fadeInLeft">
            <!-- Container -->
            <div class="row text-center">
                <?php if (count($episodes) > 0): ?>

                    <?php foreach ($episodes as $episode): ?>
                        <!-- Column -->
                        <div class="col-md-3 mb-4 d-flex ">
                            <!--Card-->
                            <div class="card w-100">
                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="<?php echo sprintf(YOUTUBE_THUMBNAIL_LINK_BASE, $episode->getLink()); ?>"
                                         class="card-img-top"
                                         alt="'<?php echo $episode->getTitle(); ?>' episoode image">
                                    <a href="/episodio/<?php echo $episode->getEpisodeIdentifierNumber();?>">
                                        <div class="mask flex-center rgba-black-strong">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="white-text">Caricato
                                                        il <?php echo $episode->getCreationDatetime(); ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <p class="white-text font-weight-bold">Guarda episodio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <h4 class="card-title"><?php echo $episode->getTitle(); ?></h4>

                                    <!--Text-->
                                    <p class="card-text">
                                        Descrizione. ( Da aggiungere o no??? )
                                    </p>
                                </div>
                            </div>
                            <!--/.Card-->
                        </div>
                        <!-- Column -->
                    <?php endforeach; ?>

                    <?php if (CategoriesModel::countCategories() > N_CATEGORIES_HOMEPAGE): ?>

                    <?php endif; ?>

                <?php else: ?>
                    <div class="col-md-12">
                        <h1><i class="fas fa-exclamation-triangle"></i> Oops! Questa serie non ha episodi.</h1>
                        <a href="/serie">
                            <button class="btn btn-red"><i class="fas fa-arrow-left"></i> Torna alla lista</button>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
            <!-- Container -->
        </div>
        <!-- Categories container -->
    </div>
</main>