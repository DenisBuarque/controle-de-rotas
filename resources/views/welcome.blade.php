<!doctype html>
    <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

        <script src="{{ asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    </head>
    <body data-spy="scroll" data-target="#main-navbar">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <div id="menubar" class="main-menu">	
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href=""><img src="{{ asset('assets/images/logo.png') }}" alt="" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="">Home<span class="sr-only">(current)</span></a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!--Home page style-->
        <header id="home" class="sections">
            <div class="container">

                <div class="row">
                    <div class="homepage-style">

                        <div class="top-arrow hidden-xs text-center"><img src="{{ asset('assets/images/top-arrow.png') }}" alt="" /></div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="unique-apps">
                                <h2>SYSTEM<br>CONTROL ROUTES </h2>
                                <p>
                                    O sistema de controle de rotas ajuda a você a organizar as rotas de serviços do seu negócio, cadastre seus 
                                    endereços destinos e nosso sistema cálcula o melhor trajeto entre varios destinos. 
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slider-area">

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="{{ asset('assets/images/slider-img-route.png') }}" alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('assets/images/slider-img-destiny.png') }}" alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('assets/images/slider-img-service.png') }}" alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('assets/images/slider-img-client.png') }}" alt="" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>	
                </div>

            </div>

        </header>

        <!-- Sections -->
        <section id="our-portfolio" class="sections">
            <div class="container">

                <div class="row">
                    <div class="heading">
                        <div class="title text-center arrow-right">
                            <h4 class="">CONHEÇA MAIS </h4>
                            <img class="hidden-xs" src="{{ asset('assets/images/right-arrow.png') }}" alt="" />

                        </div>
                    </div>

                    <!-- Example row of columns -->
                    <div class="portfolio-wrap">

                        <div class="portfolio">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="{{ asset('assets/images/monitor-route.png') }}" alt="" />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="portfolio-item">
                                    <h4>Controle de rotas</h4>
                                    <p>Tenha mais agilidade nas  suas entregas, adicione seus detinos e nosso sistema traça a melhor decisão a ser tomada no percurso de sua rota.</p>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="portfolio-item">
                                    <h4>DESTINOS</h4>
                                    <p>Gerencie os destinos traçados no mapa, saiba qual destino, quem é o responsável pela rota, tipo e valor de serviço e também informa se a rota foi finalizada.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img class="portfolio-img img-responsive" src="{{ asset('assets/images/monitor-destiny.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="portfolio">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img class="portfolio-img img-responsive" src="{{ asset('assets/images/monitor-client.png') }}" alt="" />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="portfolio-item">
                                    <h4>CONTAS DE CLINTES</h4>
                                    <p>Gerencie a conta de endereço de seus clientes, tenha uma agenda de endereço sempre a sua disposição.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /container -->       
        </section>

        <div class="scroll-top">
            <div class="scrollup">
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>

        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">

                <div class="row">
                    <div class="main-footer">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <h2>ENDEREÇOS</h2>
                                <ul>
                                    <li><a href="#">Endereço de localização da empresa</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <h2>SUPORTE</h2>
                                <ul>
                                    <li><a href="#">Fale consoco</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <h2>INFORMAÇÕES</h2>
                                <ul>
                                    <li><a href="#">Termor e condições</a></li>
                                    <li><a href="#">Politicas de acesso</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <h2>REDES SOCIAIS</h2>
                                <ul>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Instagran</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="socio-copyright">

                        <div class="social">
                            <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>

                        <p>Made with <i class="fa fa-heart"></i> by Bootstrap Themes 2016. All rights reserved.</p>
                    </div>

                </div>	
            </div>

        </footer>

        <script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>
