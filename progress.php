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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
    body {
        margin: 0;
        height: 100vh;
        z-index: 2000;
        background-image: url('img/background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: space-between;
        width: 80%;
    }

    .chart-container {
        width: 30%; /* Ajusta el ancho según lo necesites */
        position: relative;
        margin: 20px;
        text-align: center;
    }

    .percentage {
        font-size: 24px;
        color: #62C3E7; /* Color visible */
    }

    .invisible-percentage {
        color: transparent; /* Color invisible */
        border: none; /* Sin bordes */
        visibility: hidden; /* Ocultar */
    }
</style>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block" style="background-color: #001b3f !important;">
        <div style="background-color: #001b3f; width: 100%; height: 90px; position: fixed; top: 0; left: 0; z-index: 10;"></div>
        <div style="background-color: #001b3f; width: 1100px !important; height: 90px; position: fixed; top: 40px; left: 219px; z-index: 10; border-radius: 45px 45px 45px 45px;"></div>

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
    <a class="button" href="login.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 50px; margin-top: -20px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-arrow-left" style=" font-size: 36px; color: white;"></i>
    </a>

    <a class="button" href="scores.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 1410px; margin-top: -18px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-trophy" style=" font-size: 36px; color: white;"></i>
    </a>

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
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
                            <span class="text-white">Progress</span>
                            <span style="color: transparent; -webkit-text-stroke: 1px white;">Board</span>
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

    <!-- Chart Section -->
    <div class="container">
        <div class="chart-container">
            <canvas id="chart1"></canvas>
            <div class="percentage" id="text1">60%</div>
            <span class="invisible-percentage">40%</span>
        </div>
        <div class="chart-container">
            <canvas id="chart2"></canvas>
            <div class="percentage" id="text2">70%</div>
            <span class="invisible-percentage">30%</span>
        </div>
        <div class="chart-container">
            <canvas id="chart3"></canvas>
            <div class="percentage" id="text3">85%</div>
            <span class="invisible-percentage">15%</span>
        </div>

        <div class="chart-container" style="color: white; font-weight: bold; font-size: 24px; position: absolute; margin">
            <p>Memory</p>
        </div>
        <div class="chart-container">
            <p>Reaction</p>
        </div>
        <div class="chart-container">
            <p>Memory</p>
        </div>
    </div>


    <!-- End of Chart Section -->

    <!-- Back to Top -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Chart.js Initialization -->
    <script>
        const data1 = {
            labels: ['A', 'B'],
            datasets: [{
                data: [60, 40], // Porcentajes
                backgroundColor: ['#62C3E7', '#0097A7'],
            }]
        };

        const config1 = {
            type: 'doughnut',
            data: data1,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false, // Sin título
                    }
                }
            }
        };

        const data2 = {
            labels: ['X', 'Y'],
            datasets: [{
                data: [70, 30], // Porcentajes
                backgroundColor: ['#62C3E7', '#0097A7'],
            }]
        };

        const config2 = {
            type: 'doughnut',
            data: data2,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false, // Sin título
                    }
                }
            }
        };

        const data3 = {
            labels: ['1', '2'],
            datasets: [{
                data: [50, 50], // Porcentajes
                backgroundColor: ['#62C3E7', '#0097A7'],
            }]
        };

        const config3 = {
            type: 'doughnut',
            data: data3,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false, // Sin título
                    }
                }
            }
        };

        const chart1 = new Chart(
            document.getElementById('chart1'),
            config1
        );

        const chart2 = new Chart(
            document.getElementById('chart2'),
            config2
        );

        const chart3 = new Chart(
            document.getElementById('chart3'),
            config3
        );
    </script>
</body>

</html>
