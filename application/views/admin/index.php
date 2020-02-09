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
                    <span>Dashboard</span>
                </h4>
            </div>
        </div>

        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="col-md-12">

                <div class="card" id="categorie">
                    <div class="card-header"><h3 class="h3-responsive">Statistiche banners</h3></div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 col-lg-4 text-center">
                                <h4 class="h1 font-weight-normal mb-3">
                                    <i class="fas fa-file-alt indigo-text"></i>
                                    <span class="d-inline-block count-up" data-from="0" data-to="<?php echo $tot_banners ?>" data-time="2000"><?php echo $tot_banners ?></span>
                                </h4>
                                <p class="font-weight-normal text-muted">Banner</p>
                            </div>

                            <div class="col-md-6 col-lg-4 text-center">
                                <h4 class="h1 font-weight-normal mb-3">
                                    <i class="fas fa-layer-group indigo-text"></i>
                                    <span class="d-inline-block count1" data-from="0" data-to="<?php echo $tot_clients ?>"
                                          data-time="2000"><?php echo $tot_clients ?></span>
                                </h4>
                                <p class="font-weight-normal text-muted">Clienti</p>
                            </div>

                            <div class="col-md-6 col-lg-4 text-center">
                                <h4 class="h1 font-weight-normal mb-3">
                                    <i class="fas fa-plus green-text"></i>
                                    <span class="d-inline-block count2" data-from="0" data-to="<?php echo $tot_earnings?>"
                                          data-time="2000"><?php echo $tot_earnings ?></span>  CHF
                                </h4>
                                <p class="font-weight-normal text-muted">Guadagno totale</p>
                            </div>
                        </div>
                    </div>
                </div>
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

<script>
    (function ($){
        $.fn.counter = function() {
            const $this = $(this),
                numberFrom = parseInt($this.attr('data-from')),
                numberTo = parseInt($this.attr('data-to')),
                delta = numberTo - numberFrom,
                deltaPositive = delta > 0 ? 1 : 0,
                time = parseInt($this.attr('data-time')),
                changeTime = 10;

            let currentNumber = numberFrom,
                value = delta*changeTime/time;
            var interval1;
            const changeNumber = () => {
                currentNumber += value;
                //checks if currentNumber reached numberTo
                (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
                this.text(parseInt(currentNumber));
                currentNumber == numberTo ? clearInterval(interval1) : currentNumber;
            }

            interval1 = setInterval(changeNumber,changeTime);
        }
    }(jQuery));

    $(document).ready(function(){

        $('.count-up').counter();
        $('.count1').counter();
        $('.count2').counter();

        new WOW().init();
    });
</script>