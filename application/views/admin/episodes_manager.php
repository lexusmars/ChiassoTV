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
                    <span><a href="/admin/episodes">Gestione episodi</a></span>
                    <span>/</span>
                    <span><?php echo $category->getCategoryName();?></span>
                </h4>
            </div>

        </div>
        <!-- Heading -->

        <div class="row wow fadeIn">
            <div class="col-md-12">
                <br>
                <div class="card" id="add-episode">
                    <div class="card-header"><h3 class="h3-responsive">Aggiungi episodio</h3></div>
                    <div class="card-body">

                        <?php if (count($GLOBALS["NOTIFIER"]->getNotifications()) > 0): ?>
                            <!-- Write notifications -->
                            <br>
                            <?php foreach ($GLOBALS["NOTIFIER"]->getNotifications() as $notification): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $notification ?>
                                </div>
                            <?php endforeach; ?>

                            <?php $GLOBALS["NOTIFIER"]->clear(); ?>
                        <?php endif; ?>

                        <form class="form" method="post" action="/api/episode/add/<?php echo $category->getCategoryId(); ?>">

                            <!-- Episode name -->
                            <div class="md-form">
                                <input type="text" id="nomeEpisodio" class="form-control" name="title" required>
                                <label for="nomeEpisodio">Nome episodio<span class="red-text">*</span></label>
                            </div>

                            <!-- Episode desciption -->
                            <div class="md-form">
                                <textarea id="descrizioneEpisodio" name="description"
                                          class="form-control md-textarea" length="1024" rows="3"></textarea>
                                <label for="descrizioneEpisodio">Descrizione episodio</label>
                            </div>

                            <!-- Episode link: https://www.youtube.com/embed/<id>-->
                            <label class="mb-0 ml-2" for="material-url">Link dell'episodio</label>
                            <div class="md-form input-group mt-0 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon3">https://www.youtube.com/embed/</span>
                                </div>
                                <input type="text" class="form-control" name="link" id="material-url" aria-describedby="material-addon3">
                            </div>

                            <!-- Add category button -->
                            <button class="btn white-text success-color-dark btn-block my-4" type="submit">Aggiungi episodio</button>
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
                    <div class="card-header"><h3 class="h3-responsive">Episodi</h3></div>
                    <div class="card-body">
                        <?php if (count($episodes) > 0): ?>
                            <table id="episodesTable" category-target="<?php echo $category->getCategoryId(); ?>" class="table-striped table-responsive" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">Numero episodio</th>
                                    <th scope="col">Titolo</th>
                                    <th scope="col">Descrizione</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Creato il</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($episodes as $key=>$episode): ?>
                                    <tr id="episode-<?php echo $episode->getEpisodeIdentifierNumber();?>-record">

                                        <td scope="row" id="episodeNumber"><?php echo $key+1; ?></td>
                                        <td id="episodeTitle"><?php echo $episode->getTitle(); ?></td>
                                        <td id="episodeDescription"><?php echo $episode->getDescription(); ?></td>
                                        <td id="episodeLink" episode-identifier="<?php echo $episode->getLink();?>"><a href="https://www.youtube.com/watch?v=<?php echo $episode->getLink();?>">Apri video</a></td>
                                        <td id="episodeCreationDatetime"><?php echo $episode->getCreationDatetime(); ?></td>
                                        <td>
                                            <button class="btn btn-blue-grey edit-episode-button"
                                                    episode-target="<?php echo $episode->getEpisodeIdentifierNumber();?>">
                                                Modifica
                                            </button>

                                            <button class="btn btn-danger delete-episode-button"
                                                    episode-target="<?php echo $episode->getEpisodeIdentifierNumber();?>">
                                                Elimina
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h3 class="h3-responsive">Non ci sono episodi all'interno di questa categoria.</h3>
                        <?php endif; ?>
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
                    <a href="emptylink.com" id="eliminaButton" btn btn-outline-danger">Si</a>
                    <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->

    <!--Modal: editEpisode -->
    <div class="modal fade" id="editEpisodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <!-- Category name -->
                        <div class="md-form">
                            <input type="text" id="episodeNameModal" class="form-control" name="title" required>
                            <label for="episodeNameModal">Nome episodio<span class="red-text">*</span></label>
                        </div>

                        <!-- Category desciption -->
                        <div class="md-form">
                            <textarea id="episodeDescriptionModal" name="description"
                                      class="form-control md-textarea" length="1024" rows="3"></textarea>
                            <!--
                            <input type="text" id="descrizioneCategoriaModal" name="categoryDescription" class="form-control">
                            -->
                            <label for="episodeDescriptionModal">Descrizione episodio</label>
                        </div>

                        <label class="mb-0 ml-2" for="material-url">Link dell'episodio</label>
                        <div class="md-form input-group mt-0 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon" id="material-addon3">https://www.youtube.com/embed/</span>
                            </div>
                            <input type="text" class="form-control" name="link" id="episodeLinkModal" aria-describedby="material-addon3">
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


</main>
<script src="/application/assets/js/admin/episode_manager/modalmanager.js"></script>
<script src="/application/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#episodesTable").dataTable({
            responsive: true,
        })
    })
</script>