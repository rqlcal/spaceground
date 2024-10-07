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
</head>

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
        #canvas {
            border: 1px solid black;
            position: absolute;
            width: 430px; /* Puedes ajustar el ancho */
            height: 380px; /* Puedes ajustar el alto */
            margin-top: 170px;
            margin-left: 170px;
        }
        #label-container {
            margin-top: 20px;
            font-size: 24px; /* Tamaño de la fuente para los mensajes */
            text-align: center; /* Centramos el texto */
        }
        #loading {
            font-size: 36px; /* Tamaño de la fuente del loading */
            margin-top: 100px; /* Espacio entre el loading y el botón */
            margin-left: 890px;
            position: absolute; /* Posicionamiento relativo */
            text-align: center; /* Centra el texto */
            top: 50%; /* Desplazamiento desde la parte superior */
            transform: translateY(-50%); /* Centra verticalmente el texto */
            color: #333; /* Color del texto */
            font-weight: bold; /* Negrita */
            color: white;
        }

        #login-button {
            display: none; /* Ocultamos el botón al inicio */
            margin-top: 350px;
            margin-left: 940px;
            font-size: 24px;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #2f44a5; /* Color de fondo azul */
            color: white; /* Color del texto blanco */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados (opcional) */
            transition: background-color 0.3s; /* Transición suave al pasar el ratón */
        }

        /* Cambia el color de fondo al pasar el ratón */
        #login-button:hover {
            background-color: darkblue; /* Un azul más oscuro al pasar el ratón */
        }

        #canvas {
            position: absolute; /* Cambia a 'relative' si necesitas una posición relativa al contenedor */
            top: 50px; /* Distancia desde la parte superior */
            left: 100px; /* Distancia desde la izquierda */
            border: 1px solid #ccc; /* Agrega un borde opcional */
        }
</style>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

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
    <a class="button" href="games.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 50px; margin-top: -20px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-arrow-left" style=" font-size: 36px; color: white;"></i>
    </a>

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
                    <span class="text-white">Leader</span>
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

    <!-- Code -->

    <?php
            // Conectar a la base de datos
            $servername = "localhost"; // Cambia esto según tu configuración
            $username = "root"; // Cambia esto según tu configuración
            $password = ""; // Cambia esto según tu configuración
            $dbname = "spaceapps"; // Cambia esto según tu configuración

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Obtener datos de la tabla scores
            $sql = "SELECT idScore, nameScore, countryScore, score FROM scores ORDER BY score DESC LIMIT 10";
            $result = $conn->query($sql);
            ?>

<div style="margin-top: 50px;"> <!-- Agregar un margen superior -->
    <table style="width: 50%; border-collapse: collapse; background-color: rgba(255, 255, 255, 0.35); border: none; border-radius: 10px; overflow: hidden; position: absolute; margin-top: -20px; margin-left: 390px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);"> <!-- Aumentar la transparencia y agregar sombra -->
        <thead>
            <tr>
                <th style="padding: 8px; color: white; text-align: center; font-weight: bold; background-color: rgba(0, 0, 0, 0.5);">Position</th>
                <th style="padding: 8px; color: white; font-weight: bold; background-color: rgba(0, 0, 0, 0.5);">Name</th>
                <th style="padding: 8px; color: white; font-weight: bold; background-color: rgba(0, 0, 0, 0.5);">Country</th>
                <th style="padding: 8px; color: white; font-weight: bold; background-color: rgba(0, 0, 0, 0.5);">Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Inicializar un contador para las posiciones
                $position = 1;

                // Salida de datos de cada fila
                while ($row = $result->fetch_assoc()) {
                    echo "<tr style='color: white;'>"; // Cambiar el color del texto a blanco para cada fila
                    
                    echo "<td style='padding: 8px; text-align: center;'>";
                    if ($position == 1) {
                        echo "<img src='img/first.png' style='width: 30px; height: 30px;' alt='First Place'>";
                    } elseif ($position == 2) {
                        echo "<img src='img/second.png' style='width: 25px; height: 30px;' alt='Second Place'>";
                    } elseif ($position == 3) {
                        echo "<img src='img/third.png' style='width: 30xp; height: 30px;' alt='Third Place'>";
                    } else {
                        echo $position; // Mostrar números a partir de la posición 4
                    }
                    echo "</td>";

                    // Mostrar el resto de los datos (nameScore, countryScore, score)
                    echo "<td style='padding: 8px;'>" . $row["nameScore"] . "</td>";
                    echo "<td style='padding: 8px;'>" . $row["countryScore"] . "</td>";
                    echo "<td style='padding: 8px;'>" . $row["score"] . "</td>";
                    echo "</tr>";
                    
                    // Incrementar la posición para el siguiente registro
                    $position++;
                }
            } else {
                echo "<tr style='color: white;'><td colspan='4' style='padding: 8px; text-align: center;'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>




            <?php
            // Cerrar la conexión
            $conn->close();
            ?>



    <!-- Code -->
    

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