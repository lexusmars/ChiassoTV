<!DOCTYPE html>
<html>

<head>
    <?php ViewLoader::load("templates/analytics"); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link href="/application/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/application/assets/css/mdb.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Personal style file -->
    <link href="/application/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <br>

        <!-- Default form login -->
        <form class="text-center border border-light p-5" action="<?php echo Application::buildUrl("admin/auth"); ?>" method="post">

            <h4 class="h1-responsive mb-4 font-weight-bold">Accesso</h4>
            <p>Per accedere a questa pagina necessiti dei permessi di amministratore</p>

            <?php if(count($GLOBALS["NOTIFIER"]->getNotifications())): ?>
                <!-- Write notifications -->
                <br>
                <?php foreach ($GLOBALS["NOTIFIER"]->getNotifications() as $notification): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $notification ?>
                    </div>
                <?php endforeach; ?>

                <?php $GLOBALS["NOTIFIER"]->clear(); ?>
            <?php endif; ?>

            <!-- Username -->
            <input type="text" id="defaultLoginFormEmail" name="username" class="form-control mb-4" placeholder="Username">

            <!-- Password -->
            <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password">

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Forgot password -->
                    <a href="">Recupera password</a>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit">Accedi</button>

        </form>
        <!-- Default form login -->
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="/application/assets/js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/application/assets/js/bootstrap.min.js"></script>

    <!-- Tooltips -->
    <script type="text/javascript" src="/application/assets/js/popper.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="/application/assets/js/mdb.min.js"></script>

</body>
</html>