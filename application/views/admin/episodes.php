<!--Main layout-->
<main class="pt-5">
    <div id="container" class="container mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    <span class="blue-text font-weight-bold">Admin Panel</span>
                    <span>/</span>
                    <span>Gestione episodi</span>
                </h4>
            </div>
        </div>
        <!-- Heading -->
        <br>
        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="col-md-12">
                <div class="card" id="categorie">
                    <div class="card-header"><h3 class="h3-responsive">Categorie</h3></div>

                    <div class="card-body">
                        <div class="card-group scrollbar scrollbar-primary">
                            <?php if(count($categories) > 0): ?>
                                <?php foreach ($categories as $category): ?>
                                    <?php if ($index % EPISODES_MANAGER_CATEGORIES_PER_ROW == 0) : ?>
                                        </div>
                                        <div class="card-group scrollbar scrollbar-primary">
                                    <?php endif; ?>

                                    <!-- Card -->
                                    <div class="card" style="max-width: 20rem; max-height: 30rem; margin-right: 2rem;">

                                        <!-- Card image -->
                                        <div class="view overlay">
                                            <img class="card-img-top img-fluid"
                                                 src="<?php echo CATEGORIES_IMG_LINK . $category->getCategoryImagePath(); ?>">
                                            <a href="#!">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>

                                        <!-- Card content -->
                                        <div class="card-body d-flex flex-column">
                                            <!-- Title -->
                                            <h4 class="card-title"><?php echo $category->getCategoryName(); ?></h4>
                                            <!-- Text -->
                                            <p class="card-text"><?php echo $category->getCategoryDescription(); ?></p>
                                            <!-- Button -->
                                            <a href="/admin/episodes/<?php echo $category->getCategoryId(); ?>"
                                               class="btn btn-primary mt-auto">Modifica episodi</a>
                                        </div>
                                    </div>

                                    <?php $index++; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <h3 class="h3-responsive">Non ci sono categorie disponibili.
                                    Per utilizzare questa funzione devi prima aggiungerne tramite <a href="/admin/categories">questa pagina</a>.</h3>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->

        <footer>
            <!--Copyright-->
            <div class="footer-copyright py-3">
                © 2019 Copyright:
                <a href="https://chiassotv.ch/" rel="noreferrer" target="_blank"><?php echo APP_NAME ?></a>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->
    </div>
</main>