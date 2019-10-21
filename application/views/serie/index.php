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

<script>
    $(document).ready(function () {
        // Hide loader
        $('#loader').addClass("d-none");

        // Show page
        $('main').removeClass("d-none");
        $('header').removeClass("d-none");
        $('footer').removeClass("d-none");

    })
</script>