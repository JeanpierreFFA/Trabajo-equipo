<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylephp.css">
    <title>Pokedex</title>
    <link rel="icon" href="favicon.webp" type="image/webp">
</head>
<body>

    <center>

        <h1>Pokedex</h1>
        <h2>Pokemones</h2>
        <form action="#" class="search-form">
            <input type="text" placeholder="Buscar Pokémon">
            <button type="submit">Buscar</button>


        <?php
        // URL de la pestaña
        $enlace = "https://matias.me/nsfw/?fbclid=IwAR2KKxcRz3P_QoH5nulZ_zbpOGIL3620iPYPiLm2ob0wrabDUGt47-h9_Wk";
        echo "<form action='$enlace' class='pruebame-form' target='_blank'>";
        echo "<button type='submit'>Pruebame</button>";
        echo "</form>";
        ?>    
        </form>
        
        
        
    <?php  
    // Bucle para imprimir solo las imágenes de los Pokémon
    for ($i = 1; $i <= 1025; $i++) {
        // Imprimir la tarjeta del Pokémon con un enlace que llama a la función mostrarInfoPokemon
        echo "
        <div class='card'>
            <a href='javascript:void(0);' onclick='mostrarInfoPokemon($i)'>
                <img class='img' src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$i}.png' alt='Pokémon {$i}'>
                <p>#{$i}</p> <!-- Agregar el número del Pokémon dentro de la tarjeta -->
            </a>
        </div>";
    } 
    ?>

<script>
    // Variable global para almacenar la ventana abierta
    var ventanaAbierta;

    // Función para mostrar la información del Pokémon en una nueva ventana
    function mostrarInfoPokemon(id) {
        // Si ya hay una ventana abierta, cerrarla antes de abrir una nueva
        if (ventanaAbierta && !ventanaAbierta.closed) {
            ventanaAbierta.close();
        }
        // Abrir una nueva ventana con la información del Pokémon
        ventanaAbierta = window.open('', '_blank');
        // Escribir el contenido de la nueva ventana
        ventanaAbierta.document.write(`
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Pokemon Info</title>
            </head>
            <body>
                <center>
                    <h1>Pokemon Info</h1>
                    <h2 id="pokemonName"></h2>
                    <img id="pokemonImage" class="img" src="" alt="Pokémon">
                    <button onclick="reproducirSonido(${id})">Reproducir Sonido</button>
                    <button onclick="cerrarVentana()">Cerrar</button>
                </center>

                <script>
                    // Función para reproducir el sonido del Pokémon
                    function reproducirSonido(id) {
                        var audio = new Audio();
                        audio.src = 'https://raw.githubusercontent.com/PokeAPI/cries/main/cries/pokemon/latest/' + id + '.ogg';
                        audio.play();
                    }

                    // Función para cerrar la ventana
                    function cerrarVentana() {
                        window.close();
                    }

                    // Función para obtener la información del Pokémon desde la PokeAPI
                    function obtenerInfoPokemon(id) {
                        fetch('https://pokeapi.co/api/v2/pokemon/' + id)
                            .then(response => response.json())
                            .then(data => {
                                var nombrePokemon = data.name;
                                var numeroPokemon = data.id;
                                // Escribir la información del Pokémon en la ventana
                                document.getElementById('pokemonName').innerText = '#' + numeroPokemon + ' ' + nombrePokemon.toUpperCase();
                                document.getElementById('pokemonImage').src = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/' + id + '.png';
                            })
                            .catch(error => console.error('Error al obtener datos del Pokémon:', error));
                    }

                    // Obtener el ID del Pokémon desde la URL
                    var url = window.location.href;
                    var id = url.substring(url.lastIndexOf('=') + 1);
                    // Llamar a la función para obtener la información del Pokémon
                    obtenerInfoPokemon(${id});
                <\/script>
            </body>
            <\/html>
        `);
        // Cierra la escritura del contenido de la ventana
        ventanaAbierta.document.close();
    }
</script>
   
    </center>

    
</body>
</html>

