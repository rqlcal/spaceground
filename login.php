<!DOCTYPE html>
<html lang="en">

<head>
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
                    <span class="text-white">Log</span>
                    <span style="color: transparent; -webkit-text-stroke: 1px white;">In</span>
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

    <a class="button" href="index.php" style="height: 60px; width: 60px; position: absolute; z-index: 999; margin-left: 50px; margin-top: -20px; background-color: rgb(255, 255, 255, 0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: box-shadow 0.3s; box-shadow: 0 0 0 rgba(0, 0, 0, 0);">
    <i class="fas fa-arrow-left" style=" font-size: 36px; color: white;"></i>
    </a>

    <!-- Login and Registration Section -->
    <div style="position: relative;">
    <div style="width: 1000px; height: 500px; background-color: #011E31; margin-left: 275px; border-radius: 20px; z-index: -1000; position: absolute; top: 0; left: 0;"></div>
</div>
    <div><img src="img/correct.gif" alt="cargando" class="responsive-image" id="correct" style="position: relative;  width: 250px; height: 250px; margin-left: 850px; margin-top: 55px; display: none;"></div>
    <div><img src="img/loading.gif" alt="cargando" class="responsive-image" id="imgloading" style="position: relative;  width: 250px; height: 250px; margin-left: 850px; margin-top: 55px;"></div>
    <div id="loading">Loading...</div>    
    <div id="webcam-container" style="border-radius: 15px !important;">
        <canvas id="canvas" style="border-radius: 40px !important; border: none;"></canvas>
    </div>
    <div id="label-container" style="display: none;"></div>
    <button id="login-button" style="z-index: 150px;">Log In</button>

    <script>
        const modelURL = "/spaceapps/my_model/"; // Cambia esto con la URL de tu modelo
        let model, webcam, labelContainer, maxPredictions;
        let continuousCount = 0; // Contador para predicciones continuas
        const threshold = 0.95; // Umbral de confianza
        const timeRequired = 7000; // Tiempo requerido en milisegundos
        let predictionTimeout; // Variable para el tiempo de espera

        // Función para inicializar el modelo y la cámara
        async function init() {
            // Cargar el modelo y los metadatos
            const modelPath = modelURL + "model.json";
            const metadataPath = modelURL + "metadata.json";
            model = await tmImage.load(modelPath, metadataPath);
            maxPredictions = model.getTotalClasses();

            // Configuración de la cámara
            const flip = true; // si se debe invertir la cámara
            webcam = new tmImage.Webcam(640, 480, flip); // ancho, alto, invertir
            await webcam.setup(); // solicitar acceso a la cámara
            await webcam.play();
            window.requestAnimationFrame(loop);

            // Agregar elementos al DOM
            labelContainer = document.getElementById("label-container");
            for (let i = 0; i < maxPredictions; i++) { // y etiquetas de clase
                labelContainer.appendChild(document.createElement("div"));
            }

            // Iniciar el flujo del video en el canvas
            drawToCanvas();
        }

        // Función para dibujar el video en el canvas
        function drawToCanvas() {
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');

            context.drawImage(webcam.canvas, 0, 0, canvas.width, canvas.height);
            window.requestAnimationFrame(drawToCanvas);
        }

        // Bucle para realizar la predicción
        async function loop() {
            webcam.update(); // actualizar el marco de la cámara
            await predict();
            window.requestAnimationFrame(loop);
        }

        // Ejecutar la imagen de la cámara a través del modelo de imagen
        let predictionDetected = false; // Variable para saber si ya se detectó una predicción

        async function predict() {
            if (predictionDetected) return; // Si ya se detectó una predicción, no sigue prediciendo

            const prediction = await model.predict(webcam.canvas);
            let highestProbability = 0;
            let predictedClass = '';

            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction = prediction[i];
                labelContainer.childNodes[i].innerHTML = classPrediction.className + ": " + classPrediction.probability.toFixed(2);

                // Verifica la probabilidad más alta
                if (classPrediction.probability > highestProbability) {
                    highestProbability = classPrediction.probability;
                    predictedClass = classPrediction.className;
                }
            }

            // Si la clase predicha corresponde a la segunda clase, no hace nada y sigue prediciendo
            if (predictedClass === 'Nobody') {
                return; // Salta esta predicción y sigue prediciendo
            }

            // Si la probabilidad es mayor que el umbral y no es la segunda clase
            if (highestProbability > threshold) {
                continuousCount += 100; // Aumenta el contador en 100 ms
                if (continuousCount >= timeRequired) {
                    clearTimeout(predictionTimeout); // Limpiar el temporizador
                    displayWelcome(predictedClass);
                    predictionDetected = true; // Marca que ya se detectó una predicción
                }
            } else {
                continuousCount = 0; // Reinicia el contador si la predicción no es confiable
            }
        }

        const loginButton = document.getElementById("login-button");
        function displayWelcome(className) {
            document.getElementById("loading").innerHTML = `Welcome: ${className}`;
            //document.getElementById("correct").style.display = "block";
            document.getElementById("loading").style.fontSize = "36px"; // Aumenta el tamaño de la fuente
            document.getElementById("loading").style.marginLeft = "825px"; // Cambia "50px" al valor que desees
            document.getElementById("imgloading").style.display = "none";
            
            loginButton.style.display = "block"; // Muestra el botón

            loginButton.addEventListener("click", function() {
        // Redirige a games.php con el className como parámetro en la URL
        window.location.href = `games.php?user=${className}`;
    });
        }

        // Evento para redirigir a games.php al hacer clic en el botón "Log In"

        

        // Llama a la función init al cargar la página
        window.addEventListener('DOMContentLoaded', (event) => {
            init();
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image/dist/teachablemachine-image.min.js"></script>
<script>
    const modelURL = "/spaceapps/my_model/"; // Cambia esto con la URL de tu modelo
    let model, webcam, labelContainer, maxPredictions;
    let continuousCount = 0; // Contador para predicciones continuas
    const threshold = 0.95; // Umbral de confianza
    const timeRequired = 7000; // Tiempo requerido en milisegundos
    let predictionTimeout; // Variable para el tiempo de espera

    // Función para inicializar el modelo y la cámara
    async function init() {
        // Cargar el modelo y los metadatos
        const modelPath = modelURL + "model.json";
        const metadataPath = modelURL + "metadata.json";
        model = await tmImage.load(modelPath, metadataPath);
        maxPredictions = model.getTotalClasses();

        // Configuración de la cámara
        const flip = true; // si se debe invertir la cámara
        webcam = new tmImage.Webcam(640, 480, flip); // ancho, alto, invertir
        await webcam.setup(); // solicitar acceso a la cámara
        await webcam.play();
        window.requestAnimationFrame(loop);

        // Agregar elementos al DOM
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // y etiquetas de clase
            labelContainer.appendChild(document.createElement("div"));
        }

        // Iniciar el flujo del video en el canvas
        drawToCanvas();
    }

    // Función para dibujar el video en el canvas
    function drawToCanvas() {
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');

        context.drawImage(webcam.canvas, 0, 0, canvas.width, canvas.height);
        window.requestAnimationFrame(drawToCanvas);
    }

    // Bucle para realizar la predicción
    async function loop() {
        webcam.update(); // actualizar el marco de la cámara
        await predict();
        window.requestAnimationFrame(loop);
    }

    // Ejecutar la imagen de la cámara a través del modelo de imagen
    let predictionDetected = false; // Variable para saber si ya se detectó una predicción

    async function predict() {
        if (predictionDetected) return; // Si ya se detectó una predicción, no sigue prediciendo

        const prediction = await model.predict(webcam.canvas);
        let highestProbability = 0;
        let predictedClass = '';

        for (let i = 0; i < maxPredictions; i++) {
            const classPrediction = prediction[i];
            labelContainer.childNodes[i].innerHTML = classPrediction.className + ": " + classPrediction.probability.toFixed(2);

            // Verifica la probabilidad más alta
            if (classPrediction.probability > highestProbability) {
                highestProbability = classPrediction.probability;
                predictedClass = classPrediction.className;
            }
        }

        // Si la clase predicha corresponde a la clase 'Nobody', no hace nada y sigue prediciendo
        if (predictedClass === 'Nobody') {
            return; // Salta esta predicción y sigue prediciendo
        }

        // Si la probabilidad es mayor que el umbral y no es la clase 'Nobody'
        if (highestProbability > threshold) {
            continuousCount += 100; // Aumenta el contador en 100 ms
            if (continuousCount >= timeRequired) {
                clearTimeout(predictionTimeout); // Limpiar el temporizador
                displayWelcome(predictedClass); // Muestra el nombre detectado
                predictionDetected = true; // Marca que ya se detectó una predicción
            }
        } else {
            continuousCount = 0; // Reinicia el contador si la predicción no es confiable
        }
    }

    function displayWelcome(className) {
        document.getElementById("loading").innerHTML = `Bienvenido: ${className}`;
        document.getElementById("loading").style.fontSize = "36px"; // Aumenta el tamaño de la fuente
        document.getElementById("imgloading").style.display = "none";
        const loginButton = document.getElementById("login-button");
        loginButton.style.display = "block"; // Muestra el botón
    }

    // Evento para redirigir a games.php al hacer clic en el botón "Log In"
    document.getElementById("login-button").addEventListener("click", function() {
        window.location.href = "games.php"; // Redirige a games.php
    });

    // Llama a la función init al cargar la página
    window.addEventListener('DOMContentLoaded', (event) => {
        init();
    });
</script>

    <!-- End of Login and Registration Section -->
    

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