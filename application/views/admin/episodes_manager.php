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

                        <form class="form" method="post" action="/api/episode/add">

                            <!-- Episode name -->
                            <div class="md-form">
                                <input type="text" id="nomeEpisodio" class="form-control" name="episodeName" required>
                                <label for="nomeEpisodio">Nome episodio<span class="red-text">*</span></label>
                            </div>

                            <!-- Episode desciption -->
                            <div class="md-form">
                                <textarea id="descrizioneEpisodio" name="episodeDescription"
                                          class="form-control md-textarea" length="1024" rows="3"></textarea>
                                <label for="descrizioneEpisodio">Descrizione episodio</label>
                            </div>

                            <!-- Episode link: https://www.youtube.com/embed/<id>-->
                            <label class="mb-0 ml-2" for="material-url">Link dell'episodio</label>
                            <div class="md-form input-group mt-0 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text md-addon" id="material-addon3">https://www.youtube.com/embed/</span>
                                </div>
                                <input type="text" class="form-control" id="material-url" aria-describedby="material-addon3">
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
                                <?php foreach ($episodes as $episode): ?>
                                    <tr id="episode-<?php echo $episode->getEpisodeNumber();?>-record">
                                        <td scope="row" id="episodeNumber"><?php echo $episode->getEpisodeNumber(); ?></td>
                                        <td id="episodeTitle"><?php echo $episode->getTitle(); ?></td>
                                        <td id="episodeDescription"><?php echo $episode->getDescription(); ?></td>
                                        <td id="episodeLink"><a href="https://www.youtube.com/watch?v=<?php echo $episode->getLink();?>">Apri video</a></td>
                                        <td id="episodeCreationDatetime"><?php echo $episode->getCreationDatetime(); ?></td>
                                        <td>
                                            <button class="btn btn-blue-grey edit-episode-button">
                                                Modifica
                                            </button>

                                            <button class="btn btn-danger delete-episode-button" data-toggle="modal"
                                                    data-target="#modalConfirmDelete"
                                                    episode-target="<?php echo $episode->getEpisodeNumber();?>">
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