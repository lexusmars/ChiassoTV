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
                                <?php if (count($subscription_types) > 0): ?>
                                    <h6 class="h6">Tipo di abbonamento<span
                                                class="text-danger font-weight-bold">*</span></h6>
                                    <select id="subscriptionType" class="browser-default custom-select" name="type">
                                        <?php foreach ($subscription_types as $type): ?>
                                            <option days="<?php echo $type->getDays(); ?>"
                                                    value="<?php echo $type->getName(); ?>"><?php echo $type->getName(); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <h6 class="text-center text-danger">Non ci sono abbonamenti disponibili, contatta un
                                        amministratore</h6>
                                <?php endif; ?>
                            </div>

                            <div class="md-form">
                                <h6 class="h6">Cliente<span class="text-danger font-weight-bold">*</span></h6>
                                <select id="select-client" name="client_id">
                                    <?php foreach (ClientModel::getClients() as $client): ?>
                                        <option value="<?php echo $client->getId() ?>"><?php echo $client->getName() . " " . $client->getSurname(); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="small">Per creare un nuovo cliente puoi utilizzare <a href="/admin/client">questa
                                        pagina</a></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="date" id="start_date" class="form-control" name="start_date"
                                               required>
                                        <label for="start_date">Data di inizio<span
                                                    class="text-danger font-weight-bold">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="date" id="end_date" class="form-control" name="end_date" required>
                                        <label for="end_date">Data di fine<span
                                                    class="text-danger font-weight-bold">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="md-form">
                                <input type="text" id="link" class="form-control" name="link">
                                <label for="link">Link sito web</label>
                            </div>

                            <!-- Image selector -->
                            <div class="md-form">
                                <?php if (count($banner_images) > 0): ?>
                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <h4 class="h4-responsive">Immagine banner<span
                                                        class="text-danger font-weight-bold">*</span></h4>
                                            <select id="bannerSelector" name="img_name"
                                                    class="browser-default custom-select">
                                                <?php foreach ($banner_images as $imagePath): ?>
                                                    <option value="<?php echo basename($imagePath) ?>"><?php echo basename($imagePath) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4  text-center">
                                            <!-- banner image showcase-->
                                            <img class="img-fluid img-thumbnail" style="max-height: 30vh;"
                                                 id="banner-thumbnail" src="" alt="Banner showcase image">
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <h6 class="text-center text-danger">Non ci sono immagini disponibili. Per creare dei
                                        banner devi prima aggiungere le immagini tramite <a
                                                href="#carica-immagine-banner" rel="noreferrer">questo</a> modulo</h6>
                                <?php endif; ?>
                            </div>

                            <!-- Add category button -->
                            <?php if ($isDataOk): ?>
                                <button class="btn btn-dark-green btn-block my-4" type="submit">Aggiungi bannner
                                </button>
                            <?php else: ?>
                                <h5 class="h5-responsive text-danger text-center">Non è possibile la creazione del
                                    banner finchè tutti gli errori non sono stati risolti.
                                    In caso di problemi contattare un'amministratore.</h5>
                            <?php endif; ?>
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
        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="col-md-12">

                <div class="card" id="categorie">
                    <div class="card-header"><h3 class="h3-responsive">Banners</h3></div>
                    <div class="card-body">
                        <?php if (count($banners) > 0): ?>
                            <table id="categoriesTable" class="table-striped table-responsive">
                                <thead class="text-center">
                                <tr>
                                    <th scope="col">Data inizio</th>
                                    <th scope="col">Data fine</th>
                                    <th scope="col">Tipo abbonamento</th>
                                    <th scope="col">Immagine banner</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                                </thead>
                                <tbody class="w-100">
                                <?php foreach ($banners as $banner): ?>
                                    <tr id="banner<?php echo $banner->getId(); ?>">
                                        <td id="start_date>"><?php echo $banner->getStartDate()->format("d/m/Y"); ?></td>
                                        <td id="end_date"><?php echo $banner->getEndDate()->format("d/m/Y"); ?></td>
                                        <td id="subscription_type"><?php echo $banner->getType(); ?></td>
                                        <td id="banner_img"><?php echo $banner->getImgName(); ?></td>
                                        <?php if ($banner->getLink() == ""): ?>
                                            <td id="link" class="text-danger font-weight-bold"> -</td>
                                        <?php else: ?>
                                            <td id="link"><a href="<?php echo $banner->getLink(); ?>" target="_blank">Apri</a>
                                            </td>
                                        <?php endif; ?>
                                        <td id="clientFullname"><?php echo ClientModel::getClient($banner->getClientId())->getFullName(); ?></td>
                                        <td>
                                            <button class="btn btn-blue-grey edit-category-button"
                                                    banner-target="<?php echo $banner->getId(); ?>">
                                                Modifica
                                            </button>

                                            <button class="btn btn-danger delete-category-button" data-toggle="modal"
                                                    data-target="#modalConfirmDelete"
                                                    banner-target="<?php echo $banner->getId(); ?>">
                                                Elimina
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h3 class="h3-responsive">Non ci sono banner.</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->

        <!-- Delete modal -->
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
             aria-labelledby="modalEliminaMessaggio"
             aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading" id="modalEliminaMessaggio">INSERT MESSAGE HERE</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <a href="emptylink.com" id="eliminaButton" class="btn btn-outline-danger">Si</a>
                        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Delete modal -->

        <!-- Edit modal -->
        <!--Modal: editEpisode -->
        <div class="modal fade" id="modalEditClient" tabindex="-1" role="dialog"
             aria-labelledby="editModalTitle"
             aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalTitle">Modifica banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="modalUpdateForm" class="form" method="post">
                                <input type="select" id="clientNameModal" class="form-control" name="name" required>
                                <label for="banner">Nome</label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla</button>
                        <button id="submitSalvaModificheModal" type="button" class="btn btn-primary">Salva modifiche
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal: editEpisode -->
        <!-- Edit modal -->
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

<!-- Modal manager -->
<script type="text/javascript" src="/application/assets/js/admin/banner/modalmanager.js"></script>

<!-- Smart select -->
<script type="text/javascript" src="/application/assets/js/addons/selectize.min.js"></script>

<!-- DataTables.js -->
<script src="/application/assets/js/addons/datatables.min.js"></script>

<!-- Moment.js -->
<script src="/application/assets/js/addons/moment.min.js"></script>

<!-- Form manager -->
<script type="text/javascript" src="/application/assets/js/admin/banner/formmanager.js"></script>

<script>
    $(document).ready(function () {
        //update banner thumbnail after page load
        update_banner_thumbnail();

        $("#categoriesTable").dataTable({responsive: true});

        $("#bannerSelector").on("change", function () {
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

        // Set default date (today)
        $("#start_date").val(moment().format("YYYY-MM-DD"));
    });

    function update_banner_thumbnail() {
        // Get image and generate link
        let selected_filename = $("#bannerSelector").children("option:selected").val();
        let link = "<?php echo BANNERS_IMG_LINK ?>" + selected_filename;

        // Setup link
        $("#banner-thumbnail").prop("src", link);
    }
</script>