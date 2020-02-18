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
                    <span>Gestione display</span>
                </h4>
            </div>

        </div>

        <!-- Heading -->
        <div class="row wow fadeIn mb-5">
            <div class="col-md-12">
                <br>
                <div class="card" id="aggiungi-categoria">
                    <div class="card-header"><h3 class="h3-responsive">Aggiungi cliente</h3></div>
                    <div class="card-body">

                        <?php if (count($GLOBALS["NOTIFIER"]->getNotifications())): ?>
                            <!-- Write notifications -->
                            <br>
                            <?php foreach ($GLOBALS["NOTIFIER"]->getNotifications() as $notification): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $notification ?>
                                </div>
                            <?php endforeach; ?>

                            <?php $GLOBALS["NOTIFIER"]->clear(); ?>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Immagine</th>
                                    <th scope="col">Nome categoria</th>
                                    <th scope="col">Abilitato</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $category): ?>
                                    <tr>
                                        <td><img src="<?php echo CATEGORIES_IMG_LINK . $category->getCategoryImagePath()?>" class="img-fluid" style="max-width: 200px" alt="Smiley face"></td>
                                        <td class="align-middle h4-responsive"><?php echo $category->getCategoryName(); ?></td>
                                        <td class="align-middle h3-responsive">
                                            <div class="form-check">
                                                <input type="checkbox" value="true"
                                                       class="form-check-input toggle-category"
                                                       category-target="<?php echo $category->getCategoryId();?>"
                                                    <?php echo $category->isShownOnDisplay() ? "checked" : "" ?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

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

<!-- Notify.js -->
<script src="/application/assets/js/addons/notify.min.js"></script>

<!-- Dynamic toggle manager -->
<script src="/application/assets/js/admin/display/togglemanager.js"></script>