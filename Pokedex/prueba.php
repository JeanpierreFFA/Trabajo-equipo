<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylephp.css">
    <title>Pokedex</title>
    <style>
        /* Estilo para la ventana emergente */
        .modal {
            display: none; /* Por defecto, la ventana emergente no se muestra */
            position: fixed; /* Permanece en su posición incluso si se desplaza la página */
            z-index: 1; /* Ubica la ventana emergente encima de todo */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Habilita el desplazamiento si la ventana emergente es más grande que la pantalla */
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro semi-transparente */
        }

        /* Contenedor del contenido de la ventana emergente */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Centra la ventana emergente verticalmente */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Establece el ancho del contenido */
            border-radius: 10px; /* Agrega bordes redondeados */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Agrega sombra */
            font-family: Arial, sans-serif; /* Define la fuente del texto */
        }

        /* Estilo para el botón de cierre */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <center>

        <h1>Pokedex</h1>
        <form id="searchForm" class="search-form">
            <input type="text" name="search_query" placeholder="Buscar Pokémon">
            <button type="submit">Buscar</button>
        </form>
        <h2>Pokemones</h2>
    <?php for ($i = 1; $i <= 1000; $i++) {
         echo "
         <div class='card'>
         <a href='http://localhost/Pokedex/pokemones.php'>
         <img class='img' src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$i}.png' alt='pokemon'>
         </a>
         </div>";
    } ?>

    <!-- Ventana emergente -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Aquí se mostrarían los resultados de la búsqueda -->
            <span class="close">&times;</span>
            <p>Resultados de la búsqueda:</p>
            <div id="searchResults"></div>
        </div>
    </div>

    </center>

    <script>
        // Cuando se carga la página, asigna la función a ejecutar cuando se envía el formulario
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            // Detiene el envío del formulario
            event.preventDefault();
            // Muestra la ventana emergente
            document.getElementById("myModal").style.display = "block";
            // Aquí podrías enviar la consulta de búsqueda al servidor usando AJAX y mostrar los resultados en la ventana emergente
            // Por simplicidad, solo muestra un mensaje de prueba
            document.getElementById("searchResults").innerHTML = "Aquí irían los resultados de la búsqueda...";
        });

        // Asigna la función para cerrar la ventana emergente cuando se hace clic en el botón de cierre
        document.getElementsByClassName("close")[0].addEventListener("click", function() {
            document.getElementById("myModal").style.display = "none";
        });
    </script>

</body>
</html>
