<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SpaceBuddy</title>
    <link rel="icon" href="img/logoX.png" type="image/x-icon">

    <script>
    function enviarCaracter(caracter) {
      // Crear una solicitud AJAX
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Obtener el ID del resultado para actualizar
          var resultadoId = obtenerResultadoId();
          if (resultadoId) {
            // Actualizar el contenido del bloque de texto con el resultado
            document.getElementById(resultadoId).innerHTML = this.responseText;
          }
        }
      };
      // Enviar el carácter al servidor ESP32
      xhttp.open("GET", "http://192.168.61.182/enviar?caracter=" + caracter, true);
      xhttp.send();
    }

    function obtenerResultadoId() {
      // Verificar qué popup está visible y devolver el ID correspondiente del elemento <p id="resultado">
      if (document.getElementById('MemoriaPopup').style.display === 'block') {
        return 'resultado1';
      } else if (document.getElementById('RespuestaPopup').style.display === 'block') {
        return 'resultado2';
      } else if (document.getElementById('LaberintoPopup').style.display === 'block') {
        return 'resultado5';
      }
      // Agrega más condiciones si tienes más juegos
      return null; // No se encontró un popup visible
    }
</script>

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
        .canvas {
            width: 400px;
            height: 450px;
            border: 2px solid rgba(255, 255, 255, 0.5); /* Borde transparente */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3); /* Fondo más transparente */
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center; /* Alineación centrada */
            margin-left: 130px;
            margin-top: 60px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #324866; /* Color de fondo */
            color: white;
            padding: 10px;
            width: 90%;
            margin: 5px 0;
            border: 1px solid white; /* Borde blanco de 1px */
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button img {
            width: 16px;
            height: 16px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #2f3c5a; /* Color más oscuro al pasar el mouse */
        }
        .square {
            width: 800px;
            height: 450px;
            border: 2px solid rgba(255, 255, 255, 0.5); /* Borde transparente */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3); /* Fondo más transparente */
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center; /* Alineación centrada */
            margin-left: 580px;
            margin-top: -450px;
        }
        .instructions {
            text-align: center; /* Centrar el texto */
            margin-bottom: 20px; /* Espacio debajo del párrafo */
        }
</style>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

<body>
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


    <!-- Navbar Start -->
    <a class="button" href="login.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 50px; margin-top: -20px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-arrow-left" style=" font-size: 36px; color: white;"></i>
    </a>

    <a class="button" href="progress.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 1410px; margin-top: -18px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-heart" style=" font-size: 36px; color: white;"></i>
    </a>

    <div class="container-fluid position-relative nav-bar p-0" >
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 50;">
        <!--<div style="width: 1000px; height: 500px; border-left: 2px solid white; border-right: 2px solid white; border-bottom: 2px solid white; background-color: transparent; position: absolute; margin-top: 60px; "></div>-->
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
                    <span class="text-white">Training</span>
                    <span style="color: transparent; -webkit-text-stroke: 1px white;">Box</span>
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

    <div class="canvas">
    <button class="button" onclick="updateInstruction(0)"><i class="fas fa-lightbulb" style="margin-right: 10px;"></i>Light Play</button>
    <button class="button" onclick="updateInstruction(1)"><i class="fas fa-volume-up" style="margin-right: 10px;"></i>Sound Play</button>
    <button class="button" onclick="updateInstruction(2)"><i class="fas fa-headphones-alt" style="margin-right: 10px;"></i>Light and Sound Play</button>
    <button class="button" onclick="updateInstruction(3)"><i class="fas fa-calculator" style="margin-right: 10px;"></i>Math Solving</button>
    <button class="button" onclick="updateInstruction(4)"><img src="img/icon1.png" alt="Icon 1">Quiz Mode</button>
    <button class="button" onclick="updateInstruction(5)"><i class="fas fa-users" style="margin-right: 10px;"></i>Family Mode</button>
    <a class="button" href="conecting.php">
    <i class="fas fa-gamepad" style="margin-right: 10px;"></i> Tic Tac Toe
    </a>

    </div>

    <div class="square"></div>
    <div class="instructions">
        <img src="img/icon1.png" alt="Instrucción" style="width: 65px; height: 65px; display: block; position: absolute; margin-top: -415px; margin-left: 950px;"> <!-- Ícono arriba -->
        <p id="instructionText" style="width: 700px; color: white; font-size: 24px; position: absolute; margin-top: -340px; margin-left: 625px;">Please, select your first challenge</p> <!-- Párrafo con id para cambios dinámicos -->
        <p id="resultado" name="resultado" style="font-size: 20px; margin-top: 15px;">...</p>
    </div>

    

<!-- Botón Dinámico -->
<button class="button" id="dynamicButton" style="width: 300px; position: absolute; margin-left: 850px; margin-top: -130px;" onclick="startGame()">LET'S BEGIN</button> <!-- Botón debajo -->

<script>
    // Array de instrucciones
    const instructions = [
        "Follow the instructions: Touch the light buttons as they light up. Each time, you will have less time to do so. Accumulate points and save them in the system.",
        "Follow the instructions: Touch the sound buttons as they activate. Each time, you will have less time to respond. Accumulate points and save them in the system as you demonstrate your quick reflexes. ",
        "Follow the instructions: Reproduce the sequence as it plays! Listen carefully and memorize the pattern of sounds and lights. Each time you complete the sequence correctly, it will become longer and more challenging. Show off your memory skills and see how far you can go!",
        "Follow the instructions: Solve mathematical equations and press the correct answer! Test your skills and sharpen your mind as you tackle a variety of math problems.",
        "Follow the instructions: Interact with your family through distance games, fostering connection and engagement despite the miles apart.",
        "Follow the instructions: Did you ever wonder what life is like for an astronaut in outer space? Join us and participate in a unique opportunity to ask questions and gain insights into their extraordinary experiences. Discover the challenges and wonders of living and working beyond our planet!",
        "Follow the instructions: Play Tic Tac Toe with an astronaut and challenge your habilities with this game! Take turns making your moves in this classic strategy game, and see who can line up three in a row first."
    ];

    const caracteres = [
        "a",
        "b",
        "c",
        "d",
        "e",
        "f",
        "g"
    ];

    // Variable para rastrear el índice actual
    let currentIndex = 0;

    // Función para actualizar las instrucciones y el índice
    function updateInstruction(index) {
        currentIndex = index; // Actualiza el índice actual

        // Cambiar el texto de la instrucción
        document.getElementById('instructionText').innerText = instructions[currentIndex];

        // Cambiar el texto del botón a un carácter diferente (opcional, puedes ajustarlo)
        document.getElementById('dynamicButton').innerText = `LET'S BEGIN`;
    }

    function startGame() {
        // Llamar a enviarCaracter con el carácter correspondiente
        const char = caracteres[currentIndex]; // Obtener el carácter según el índice actual
        enviarCaracter(char); // Llamar a la función con el carácter
        console.log(char);
    }
    </script>
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