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
            z-index: 3000;
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
        #tablero {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
        }
        .casilla {
            width: 100px;
            height: 100px;
            background-color: #fff;
            border: 2px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            cursor: pointer;
        }
        #mensaje {
            margin-top: 20px;
            font-size: 1.2em;
        }
        #contador {
            margin-top: 10px;
            font-size: 1.5em;
            color: red;
        }
        #voto {
            margin-top: 20px;
            display: none;
        }
        #jugarDeNuevo {
            margin-top: 20px;
            display: none;
        }
        #submitVote {
    background-color: #324866; /* Fondo del botón */
    color: white; /* Letras blancas */
    border: 2px solid white; /* Borde blanco */
    border-radius: 25px; /* Bordes redondeados */
    padding: 10px 20px; /* Espaciado interno para un tamaño adecuado */
    font-size: 16px; /* Tamaño de letra */
    cursor: pointer; /* Cursor de mano cuando se pasa sobre el botón */
    transition: background-color 0.3s ease; /* Efecto de transición para el fondo */
}

#submitVote:hover {
    background-color: #2a3b56; /* Color de fondo al pasar el cursor por encima */
}

#selectCasilla {
    background-color: #324866; /* Fondo */
    color: white; /* Letras blancas */
    border: 2px solid white; /* Borde blanco */
    border-radius: 25px; /* Bordes redondeados */
    padding: 10px 20px; /* Espaciado interno */
    font-size: 16px; /* Tamaño de letra */
    cursor: pointer; /* Cursor de mano */
    appearance: none; /* Elimina el estilo predeterminado del navegador */
    -webkit-appearance: none; /* Para navegadores WebKit */
    -moz-appearance: none; /* Para Firefox */
    transition: background-color 0.3s ease; /* Efecto de transición */
    width: 185px; /* Ajustar ancho al 100% para hacer el selector más visible */

}

#selectCasilla:hover {
    background-color: #2a3b56; /* Cambia el color de fondo al pasar el cursor por encima */
}

#selectCasilla option {
    background-color: white; /* Fondo de las opciones */
    color: black; /* Color de las letras de las opciones */
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
                    <span class="text-white">Conecting</span>
                    <span style="color: transparent; -webkit-text-stroke: 1px white;">the Dots</span>
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
    <div id="tablero" style="position: absolute; margin-left: 200px; margin-top: 50px;">
        <img src="img/tablero.png" alt="Descripción de la imagen" width="450" height="450" style="position: absolute; margin-left: -60px; margin-top: -27px;">
        <div class="casilla" style="position: absolute; margin-left: -50px; border: none; margin-top: -20px; background-color: transparent; width: 140px; height: 140pX;" data-index="0"></div>
        <div class="casilla" style="position: absolute; margin-left: 100px; border: none; margin-top: -20px; background-color: transparent; width: 140px; height: 140pX;" data-index="1"></div>
        <div class="casilla" style="position: absolute; margin-left: 250px; border: none; margin-top: -20px; background-color: transparent; width: 140px; height: 140pX;" data-index="2"></div>
        <div class="casilla" style="position: absolute; margin-left: -50px; border: none; margin-top: 130px; background-color: transparent; width: 140px; height: 140pX;" data-index="3"></div>
        <div class="casilla" style="position: absolute; margin-left: 100px; border: none; margin-top: 130px; background-color: transparent; width: 140px; height: 140pX;" data-index="4"></div>
        <div class="casilla" style="position: absolute; margin-left: 250px; border: none; margin-top: 130px; background-color: transparent; width: 140px; height: 140pX;" data-index="5"></div>
        <div class="casilla" style="position: absolute; margin-left: -50px; border: none; margin-top: 280px; background-color: transparent; width: 140px; height: 140pX;" data-index="6"></div>
        <div class="casilla" style="position: absolute; margin-left: 100px; border: none; margin-top: 280px; background-color: transparent; width: 140px; height: 140pX;" data-index="7"></div>
        <div class="casilla" style="position: absolute; margin-left: 250px; border: none; margin-top: 280px; background-color: transparent; width: 140px; height: 140pX;" data-index="8"></div>
    </div>
    <div id="mensaje" style="position: absolute; margin-left: 695px; margin-top: 50px; font-size: 40px; color: white;"></div>
    <div id="voto" style="position: absolute; margin-left: 685px; margin-top: 405px; color: white;">
        <p id='earthsmove' style="position: absolute; margin-left: 10px; margin-top: -300px; font-size: 40px; color: white;">It's the Earth's turn, choose your next move:</p>
        <select id="selectCasilla" style="position: relative; margin-left: 50px; margin-top: -500px ;">
            <option value="">Select your move:</option>
        </select>
        <button id="submitVote" style="margin-left: 25px; margin-top: -450px;" >Submit Vote</button>
    </div>
    <div id="contador" style="position: absolute; margin-left: 745px; margin-top:470px;"></div>
    <button id="jugarDeNuevo" style="display:none;">Play Again</button>

    <script>
        const casillas = document.querySelectorAll('.casilla');
        const mensaje = document.getElementById('mensaje');
        const voto = document.getElementById('voto');
        const contador = document.getElementById('contador');
        const jugarDeNuevo = document.getElementById('jugarDeNuevo');
        const selectCasilla = document.getElementById('selectCasilla');

        let turnoTierra = false;
        let tiempoRestante = 30; // 30 segundos para el turno de la Tierra
        let intervalo;

        // Función para que el astronauta juegue aleatoriamente
        function jugadaAstronauta() {
            const indexAleatorio = Math.floor(Math.random() * 9);
            if (casillas[indexAleatorio].textContent === '') {
                casillas[indexAleatorio].innerHTML = '<span style="font-size: 3em;">🚀</span>';
// Símbolo del astronauta
                if (!evaluarGanador()) {
                    //mensaje.textContent = "It's the Earth's move.";
                    turnoTierra = true;
                    actualizarOpciones(); // Actualiza las opciones disponibles
                    iniciarContador();
                    voto.style.display = 'block'; // Mostrar el botón de voto
                }
            } else {
                jugadaAstronauta(); // Reintentar si la casilla ya está ocupada
            }
        }

        // Función para iniciar el contador
        function iniciarContador() {
            tiempoRestante = 30; // Reiniciar el tiempo
            contador.textContent = `Remaining time: ${tiempoRestante} seconds`;
            intervalo = setInterval(() => {
                tiempoRestante--;
                contador.textContent = `Remaining time: ${tiempoRestante} seconds`;

                if (tiempoRestante <= 0) {
                    clearInterval(intervalo);
                    mensaje.textContent = 'Time is over, choose an action';
                    voto.style.display = 'none'; // Ocultar botón de voto
                    mostrarSeleccionAleatoria();
                }
            }, 1000);
        }

        // Función para actualizar las opciones del select (eliminar las casillas ocupadas)
        function actualizarOpciones() {
            selectCasilla.innerHTML = ''; // Limpiar las opciones anteriores
            let optionDefault = document.createElement('option');
            optionDefault.value = '';
            optionDefault.textContent = 'Select your move';
            selectCasilla.appendChild(optionDefault);

            // Añadir solo las casillas vacías
            casillas.forEach((casilla, index) => {
                if (casilla.textContent === '') {
                    let option = document.createElement('option');
                    option.value = index;
                    option.textContent = index + 1; // Mostrar número de casilla 1-9
                    selectCasilla.appendChild(option);
                }
            });
        }

        // Función para mostrar la opción seleccionada
        function mostrarSeleccionAleatoria() {
    const indexSeleccionado = selectCasilla.value; // Obtener el valor seleccionado
    if (indexSeleccionado !== '' && casillas[indexSeleccionado].textContent === '') {
        // Utilizar innerHTML para poder agregar estilo inline al icono de la Tierra
        casillas[indexSeleccionado].innerHTML = '<span style="font-size: 3em;">🌍</span>'; // Símbolo de la Tierra grande
        //mensaje.textContent = `The Earth has selected the box ${parseInt(indexSeleccionado) + 1}.`;
        mensaje.textContent = `The Astronaut has made his move`;
        
        if (!evaluarGanador()) {
            // Esperar un poco antes de la jugada del astronauta
            setTimeout(() => {
                jugadaAstronauta();
            }, 1000); // Espera un segundo antes de la siguiente jugada del astronauta
        }
    } else {
        mensaje.textContent = 'Please, select a valid box.';
    }
}


        // Función para evaluar quién ha ganado
        function evaluarGanador() {
            const combinacionesGanadoras = [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6]
            ];

            for (const combinacion of combinacionesGanadoras) {
                const [a, b, c] = combinacion;
                if (casillas[a].textContent === '🚀' && casillas[b].textContent === '🚀' && casillas[c].textContent === '🚀') {
                    mensaje.textContent = 'The Astronaut has won! 🎉';
                    terminarJuego();
                    return true; // Retorna true si ganó el astronauta
                }
                if (casillas[a].textContent === '🌍' && casillas[b].textContent === '🌍' && casillas[c].textContent === '🌍') {
                    mensaje.textContent = 'The Earth has won! 🌍🎉';
                    terminarJuego();
                    return true; // Retorna true si ganó la Tierra
                }
            }
            if ([...casillas].every(casilla => casilla.textContent !== '')) {
                mensaje.textContent = 'It is a tie! 🤝';
                terminarJuego();
            }
            return false; // Retorna false si no hay ganador
        }

        // Función para terminar el juego
        function terminarJuego() {
            clearInterval(intervalo);
            voto.style.display = 'none'; // Ocultar botón de voto
            jugarDeNuevo.style.display = 'block'; // Mostrar botón de jugar de nuevo
        }

        // Evento de clic en el botón de votar
        document.getElementById('submitVote').addEventListener('click', () => {
            clearInterval(intervalo);
            mensaje.textContent = "Waiting for the other player's move...";
            setTimeout(() => {
                mostrarSeleccionAleatoria();
                voto.style.display = 'none'; // Ocultar botón de voto
                selectCasilla.value = ''; // Reiniciar selección
            }, 30000); // Espera 30 segundos antes de mostrar la jugada de la Tierra
        });

        // Evento de clic en jugar de nuevo
        jugarDeNuevo.addEventListener('click', () => {
            casillas.forEach(casilla => {
                casilla.textContent = ''; // Limpiar el tablero
            });
            mensaje.textContent = '';
            jugarDeNuevo.style.display = 'none'; // Ocultar botón de jugar de nuevo
            turnoTierra = false;
            jugadaAstronauta(); // Reiniciar el juego
        });

        // Iniciar el juego
        jugadaAstronauta();
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