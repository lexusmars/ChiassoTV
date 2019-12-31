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
                    <span>Gestione banners</span>
                </h4>
            </div>

        </div>

        <!-- Heading -->
        <div class="row wow fadeIn">
            <div class="col-md-12">
                <br>
                <div class="card" id="aggiungi-categoria">
                    <div class="card-header"><h3 class="h3-responsive">Aggiungi banner</h3></div>
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

                        <form class="form" method="post" action="/api/category/add">

                            <!-- Category name -->
                            <div class="md-form">
                                <input type="text" id="nomeCategoria" class="form-control" name="categoryName" required>
                                <label for="nomeCategoria">Nome categoria<span class="red-text">*</span></label>
                            </div>

                            <!-- Category desciption -->
                            <div class="md-form">
                                <textarea id="descrizioneCategoria" name="categoryDescription"
                                          class="form-control md-textarea" length="1024" rows="3"></textarea>

                                <label for="descrizioneCategoria">Descrizione categoria</label>
                            </div>

                            <div class="md-form">
                                <h4 class="h4-responsive">Immagine di categoria</h4>
                                <select id="imageSelector" name="categoryImagePath" class="browser-default custom-select">
                                    <?php foreach(CategoriesModel::getCategoryImages() as $imagePath):?>
                                        <option value="<?php echo $imagePath?>"><?php echo basename($imagePath)?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Add category button -->
                            <button class="btn btn-success btn-block my-4" type="submit">Aggiungi categoria</button>
                            <br>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row wow fadeIn">
            <div class="col-md-12">
                <br>
                <div class="card" id="aggiungi-categoria">
                    <div class="card-header"><h3 class="h3-responsive">Carica immagine banner</h3></div>
                    <div class="card-body">
                        <!-- Upload image -->
                        <form class="form" method="post" action="/api/image/upload/banner" enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="category_image_upload" id="categoryImageUploadInput"
                                           aria-describedby="categoryImageUploadInput" accept="image/*">
                                    <label class="custom-file-label" for="categoryImageUploadInput">Scegli immagine</label>
                                </div>
                            </div>
                            <!-- Add category button -->
                            <button class="btn btn-cyan btn-block my-4" type="submit">Carica immagine</button>
                            <br>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <br>

        <!-- banner table -->
        <div class="row wow fadeIn">
            <div class="col-md-12">
                <p>yolo</p>
            </div>
        </div>

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

<!-- Modal manager -->
<script type="text/javascript" src="/application/assets/js/admin/categories/modalmanager.js"></script>

<!-- DataTables.js -->
<script src="/application/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#categoriesTable").dataTable({
            responsive: true,
        })
    })
</script>