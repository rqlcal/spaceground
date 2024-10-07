<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SpaceBuddy</title>
    <link rel="icon" href="img/logoX.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            margin: 0; /* Eliminar margen predeterminado */
            height: 100vh; /* Altura del viewport */
            z-index: 2000;
            background-image: url('img/background.jpg'); /* URL del GIF */
            background-size: cover; /* Asegura que el fondo cubra toda la pantalla */
            background-repeat: no-repeat; /* Evita que el fondo se repita */
            background-position: center; /* Centra el fondo */
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    
    <div class="container-fluid bg-primary py-3 d-none d-md-block" style="background-color: #001b3f !important;">
        
    <div style="background-color: #001b3f; width: 100%; height: 90px; position: fixed; top: 0; left: 0; z-index: 10;"></div>
    <div style="background-color: #001b3f; width: 1100px !important; height: 90px; position: fixed; top: 40px; left: 210px; z-index: 10; border-radius: 45px 45px 45px 45px;"></div>

        <div class="container display: none;">
            <div class="row" style="display: none;">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0" style="z-index: 1001;">
                    <div class="d-inline-flex align-items-center" style="z-index: 1001;">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0" >
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 50;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.2); border: 1px solid white; box-shadow: none;">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-primary">
                    <span class="text-secondary">Zero-G</span>
                    <span style="color: #2f44a5 !important;">Zone</span>
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="z-index: 1001;">
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.html" class="nav-item nav-link" style="color: #62C3E7; transition: color 0.3s;" 
                    onmouseover="this.style.color='#62C3E7';" 
                    onmouseout="this.style.color='';" 
                    onclick="this.style.color='#62C3E7';"></a>
                    <a href="about.html" class="nav-item nav-link" style="color: #62C3E7; transition: color 0.3s;" 
                    onmouseover="this.style.color='#62C3E7';" 
                    onmouseout="this.style.color='';" 
                    onclick="this.style.color='#62C3E7';"></a>
                </div>
                <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-primary">
                    <span class="text-white">Space</span>
                    <span style="color: transparent; -webkit-text-stroke: 1px white;">Ground</span>
                    </h1>
                </a>
                <div class="navbar-nav mr-auto py-0">
                    <a href="service.html" class="nav-item nav-link" style="color: #62C3E7; transition: color 0.3s;" 
                    onmouseover="this.style.color='#62C3E7';" 
                    onmouseout="this.style.color='';" 
                    onclick="this.style.color='#62C3E7';"></a>
                </div>
            </div>
        </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; margin-top: -250px;">
                            <h4 class="text-white text-uppercase mb-md-3">Train your mind and Body</h4>
                            <h1 class="display-3 text-white mb-md-4">Test all the levels</h1>
                            <a href="login.php" class="btn btn-primary py-md-3 px-md-5 mt-2" style="background-color: #2f44a5 !important; border-color: #2f44a5 !important;">Get Started!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; margin-top: -200px;">
                            <h4 class="text-white text-uppercase mb-md-3">Compete with people from all over the Universe</h4>
                            <h1 class="display-3 text-white mb-md-4">Get on the Leaderboard</h1>
                            <a href="login.php" class="btn btn-primary py-md-3 px-md-5 mt-2" style="background-color: #2f44a5 !important; border-color: #2f44a5 !important;">Get Started!</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px; margin-top: -350px;">
                    <span class="carousel-control-prev-icon mb-n1"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px; margin-top: -350px;">
                    <span class="carousel-control-next-icon mb-n1"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="section-title position-relative text-center mb-5">Zero-G Zone</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 py-5">
                    <h4 class="font-weight-bold mb-3">About the System</h4>
                    <h5 class="text-muted mb-3">Imagine floating weightlessly, your body in constant motion, while your mind races to solve challenges.</h5>
                    <p>A cutting-edge gaming system designed for zero-gravity environments, combining physical activity with mental challenges. Players engage in interactive games that stimulate both body and mind, enhancing cognitive skills while promoting full-body movement in a weightless setting. The system uses advanced motion sensors to track physical performance, encouraging players to stay active, improve coordination, and solve puzzles, all while floating freely in space. It's an immersive experience that merges fitness and entertainment, making exercise fun and mentally stimulating.</p>
                    <a href="" class="btn btn-secondary mt-2">Learn More</a>
                </div>
                <div class="col-lg-4" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-5">
                    <h4 class="font-weight-bold mb-3">Our Features</h4>
                    <p>Our system combines full-body movement in zero gravity with brain-boosting challenges.</p>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Cognitive Games</h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Physical Training</h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Mental Agility</h5>
                    <a href="" class="btn btn-secondary mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Video Modal Start -->
 
    <!-- Video Modal End -->


    <!-- Services Start -->

    <!-- Services End -->


    <!-- Portfolio Start -->
=
    <!-- Portfolio End -->


    <!-- Products Start -->

    <!-- Products End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5">Our Team</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel team-carousel">
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="img/team-1.jpg" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Raquel Andrea Calderon Gallardo</h3>
                                <h6 class="text-uppercase text-muted mb-4">Developer</h6>
                                
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="img/team-2.jpg" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Marco Fabian Borda Wiegert</h3>
                                <h6 class="text-uppercase text-muted mb-4">Developer</h6>
                            
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="img/team-3.jpg" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Brian Arauco Paniagua</h3>
                                <h6 class="text-uppercase text-muted mb-4">Developer</h6>
                                
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="img/team-4.jpg" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">David Fabian Tavera Gutierrez</h3>
                                <h6 class="text-uppercase text-muted mb-4">Developer</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->

    <!-- Testimonial End -->


    <!-- Footer Start -->
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>