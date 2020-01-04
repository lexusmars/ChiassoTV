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
                    <span>Gestione banner</span>
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

                        <form class="form" method="post" action="/api/banner/add">
                            <!-- Category name -->
                            <div class="md-form">
                                <input type="text" id="tipoBanner" class="form-control" name="bannerType" required>
                                <label for="tipoBanner">Tipo di banner<span class="red-text">*</span></label>
                            </div>

                            <div class="md-form">
                                <label for="select-client">Cliente</label>
                                <select id="select-client" name="client">
                                    <?php foreach (ClientModel::getClients() as $client): ?>
                                        <option value="<?php echo $client->getId() ?>"><?php echo $client->getName() . " " . $client->getSurname(); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="small">Per creare un nuovo cliente puoi utilizzare <a href="/admin/client">questa pagina</a></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="date" id="dateStart" class="form-control" name="dateStart" required>
                                        <label for="dateStart">Data di inizio</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="date" id="dateEnd" class="form-control" name="dateEnd" required>
                                        <label for="dateEnd">Data di fine</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Image selector -->
                            <div class="md-form">
                                <?php if (count($banner_images) > 0): ?>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <h4 class="h4-responsive">Immagine banner</h4>
                                        <select id="bannerSelector" name="bannerImagePath"
                                                class="browser-default custom-select">
                                            <?php foreach ($banner_images as $imagePath): ?>
                                                <option value="<?php echo basename($imagePath) ?>"><?php echo basename($imagePath) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4  text-center">
                                        <!-- banner image showcase-->
                                        <img class="img-fluid img-thumbnail"  style="max-height: 30vh;" id="banner-thumbnail" src="" alt="Banner showcase image">
                                    </div>
                                </div>
                                <?php else: ?>
                                    <h6 class="text-center text-danger">Non ci sono immagini disponibili. Per creare dei
                                        banner devi prima aggiungere le immagini tramite <a
                                                href="#carica-immagine-banner" rel="noreferrer">questo</a> modulo</h6>
                                <?php endif; ?>
                            </div>

                            <!-- Add category button -->
                            <button class="btn btn-dark-green btn-block my-4" type="submit">Aggiungi categoria</button>
                            <br>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row wow fadeIn">
            <div class="col-md-12">
                <br>
                <div class="card" id="carica-immagine-banner">
                    <div class="card-header"><h3 class="h3-responsive">Carica immagine banner</h3></div>
                    <div class="card-body">
                        <!-- Upload image -->
                        <form class="form" method="post" action="/api/image/upload/banner"
                              enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="category_image_upload"
                                           id="categoryImageUploadInput"
                                           aria-describedby="categoryImageUploadInput" accept="image/*">
                                    <label class="custom-file-label" for="categoryImageUploadInput">Scegli immagine
                                        banner</label>
                                </div>
                            </div>
                            <!-- Add category button -->
                            <button class="btn btn-cyan btn-block my-4" type="submit">Carica immagine banner</button>
                            <br>
                        </form>
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

<!-- Modal manager -->
<script type="text/javascript" src="/application/assets/js/admin/categories/modalmanager.js"></script>

<!-- Smart select -->
<script type="text/javascript" src="/application/assets/js/addons/selectize.min.js"></script>

<!-- DataTables.js -->
<script src="/application/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        //update banner thumbnail after page load
        update_banner_thumbnail();

        $("#categoriesTable").dataTable({
            responsive: true,
        });

        $("#bannerSelector").on("change",function () {
            update_banner_thumbnail();
        });

        // Load smart select
        $('#select-client').selectize({
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            dropdownParent: 'body'
        });
    });

    function update_banner_thumbnail(){
        // Get image and generate link
        let selected_filename = $("#bannerSelector").children("option:selected").val();
        let link = "<?php echo BANNERS_IMG_LINK ?>" + selected_filename;

        // Setup link
        $("#banner-thumbnail").prop("src", link);
    }
</script>