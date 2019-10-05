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
        <br>
        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="col-md-12">
                <div class="card" id="categorie">
                    <div class="card-header"><h3 class="h3-responsive">Episodi</h3></div>
                    <div class="card-body">
                        <p class="font-weight-bold red-text">DA FARE LA GESTIONE DEGLI EPISODI</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->

        <footer>
            <!--Copyright-->
            <div class="footer-copyright py-3">
                © 2019 Copyright:
                <a href="https://chiassotv.ch/" target="_blank"><?php echo APP_NAME ?></a>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->
    </div>
</main>

<script src="/application/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#categoriesTable").dataTable({
            responsive: true,
        })
    })
</script>