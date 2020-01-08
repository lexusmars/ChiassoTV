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
                    <span>Gestione clienti</span>
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

                        <form class="form" method="post" action="/api/client/add">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Nome -->
                                    <div class="md-form">
                                        <input type="text" id="client-name" class="form-control" name="name" required>
                                        <label for="client-name">Nome</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Cognome -->
                                    <div class="md-form">
                                        <input type="text" id="client-surname" class="form-control" name="surname" required>
                                        <label for="client-surname">Cognome</label>
                                    </div>
                                </div>
                            </div>

                            <!-- E-mail -->
                            <div class="md-form">
                                <input type="email" id="client-email" class="form-control" name="email" required>
                                <label for="client-email">E-Mail</label>
                            </div>

                            <!-- Numero di telefono -->
                            <div class="md-form">
                                <input type="text" id="client-phone" class="form-control" name="phone" required>
                                <label for="client-phone">Numero di telefono</label>
                            </div>

                            <!-- Add category button -->
                            <button class="btn btn-dark-green btn-block my-4" type="submit">Aggiungi cliente</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="col-md-12">

                <div class="card" id="clienti">
                    <div class="card-header"><h3 class="h3-responsive">Clienti</h3></div>
                    <div class="card-body">
                        <?php if (count($clients) > 0): ?>
                            <table id="clientsTable" class="table-striped table-responsive" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cognome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Numero di telefono</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr id="clientData<?php echo $client->getId(); ?>">
                                        <td id="clientName"><?php echo $client->getName(); ?></td>
                                        <td id="clientSurname"><?php echo $client->getSurname(); ?></td>
                                        <td id="clientEmail"><?php echo $client->getEmail(); ?></td>
                                        <td id="clientPhone"><?php echo $client->getPhone(); ?></td>


                                        <td>
                                            <button class="btn btn-blue-grey edit-client-button"
                                                    client-target="<?php echo $client->getId(); ?>">
                                                Modifica
                                            </button>

                                            <button class="btn btn-danger delete-client-button" data-toggle="modal"
                                                    data-target="#modalConfirmDelete" client-target="<?php echo $client->getId(); ?>">
                                                Elimina
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h3 class="h3-responsive">Non ci sono clienti.</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="modalEliminaMessaggio"
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
                        <a href="emptylink.com" id="eliminaButton"  class="btn btn-outline-danger">Si</a>
                        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalConfirmDelete-->

        <!--Modal: editEpisode -->
        <div class="modal fade" id="modalEditClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">

            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifica episodio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="modalUpdateForm" class="form" method="post">
                            <!-- Client name -->
                            <div class="md-form">
                                <input type="text" id="clientNameModal" class="form-control" name="name" required>
                                <label for="clientNameModal">Nome</label>
                            </div>

                            <!-- Client surname -->
                            <div class="md-form">
                                <input type="text" id="clientSurnameModal" class="form-control" name="surname" required>
                                <label for="clientSurnameModal">Cognome</label>
                            </div>

                            <!-- Client Email -->
                            <div class="md-form">
                                <input type="email" id="clientEmailModal" class="form-control" name="email" required>
                                <label for="clientEmailModal">E-mail</label>
                            </div>

                            <!-- Client Email -->
                            <div class="md-form">
                                <input type="text" id="clientPhoneModal" class="form-control" name="phone" required>
                                <label for="clientPhoneModal">Telefono</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla</button>
                        <button id="submitSalvaModificheModal" type="button" class="btn btn-primary">Salva modifiche</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal: editEpisode -->



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
<script type="text/javascript" src="/application/assets/js/admin/client/modalmanager.js"></script>

<!-- Smart select -->
<script type="text/javascript" src="/application/assets/js/addons/selectize.min.js"></script>

<!-- DataTables.js -->
<script src="/application/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        //update banner thumbnail after page load
        update_banner_thumbnail();

        $("#clientsTable").dataTable({
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