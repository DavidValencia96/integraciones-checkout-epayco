<!DOCTYPE html>

<html lang="es" class="no-js">

<head>
    <meta charset="utf-8" />
    <title>Test ePayco JD</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="FlameOnePage freebie theme for web startups by FairTech SEO." name="description" />
    <meta content="FairTech" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet">
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="css/layout.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/logos/logo_epayco_200px.png" />
</head>


<body id="body" data-spy="scroll" data-target=".header">

    <header class="header navbar-fixed-top">
        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="menu-container js_nav-item">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon"></span>
                    </button>

                    <div class="logo">
                        <a class="logo-wrap" href="#body">
                            <img class="logo-img logo-img-main" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/logos/logo_epayco_200px.png" alt="Logo">
                            <img class="logo-img logo-img-active" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/logos/logo_epayco_200px.png" alt="Dark Logo">
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse nav-collapse">
                    <!-- MENU -->
                    <?php include_once 'pages/menu.php'; ?>
                    <!-- FIN MENU -->
                </div>
            </div>
        </nav>
    </header>


    <!--========== SLIDER PRINCIPAL ==========-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
        </div>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="img-responsive" src="img/1920x1080/01.jpg" alt="Slider Image">
                <div class="container">
                    <div class="carousel-centered">
                        <div class="margin-b-40">
                            <h1 class="carousel-title">Test ePayco botones</h1>
                        </div>
                        <a href="#botones" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Ir ahora</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="img/1920x1080/03.jpg" alt="Slider Image">
                <div class="container">
                    <div class="carousel-centered">
                        <div class="margin-b-40">
                            <h2 class="carousel-title">Documentación</h2>
                        </div>
                        <a href="#documentacion" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Ir ahora</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="img/1920x1080/02.jpg" alt="Slider Image">
                <div class="container">
                    <div class="carousel-centered">
                        <div class="margin-b-40">
                            <h2 class="carousel-title">Test ePayco sdk</h2>
                        </div>
                        <a href="#sdk" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Ir ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--========== SLIDER ==========-->


    <!-- BOTONES -->
    <?php include_once 'pages/botones.php'; ?>
    <!-- End BOTONES -->

    <!-- DOCUMENTACION -->
    <?php include_once 'pages/documentacion.php'; ?>
    <!-- end DOCUMENTACION -->


    <!-- SDK -->
    <?php include_once 'pages/sdk.php'; ?>
    <!-- End SDK-->
    <!--========== FOOTER ==========-->
    <?php include_once 'pages/footer.php'; ?>
    <!--========== FOOTER ==========-->

    <!--========== SCRIPT ==========-->
    <?php include_once 'pages/scripts.php'; ?>

</body>
<!-- END BODY -->

</html>