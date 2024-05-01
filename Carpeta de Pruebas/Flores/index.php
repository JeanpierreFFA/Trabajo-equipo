<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Pokedex</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" type="image/png" href="logo.png">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <audio id="bgMusic" autoplay>
    <source src="musica/notube.mobi - Pokémon Sword & Shield - Marnie Battle Music [TMG Remix].mp3" type="audio/mp3">
    Tu navegador no soporta el elemento de audio.
    </audio>

    <center>
        <a href="https://fontmeme.com/es/fuente-pokemon/"><img src="https://fontmeme.com/permalink/240430/4c44d3cf5e5ee4b7b6f8b4aaf0a6c0ce.png" alt="fuente-pokemon" border="0"></a>
    </center>
    <center>
        <form id="pokemonForm" action="">
            <select id="pokemonSelect" name="pokemon"><br>
                <?php 
                    $url = 'https://pokeapi.co/api/v2/pokemon/?limit=1036';
                    $data = json_decode(file_get_contents($url), true);
                    echo '<option value=" "> </option>';
                    foreach ($data['results'] as $pokemon) {
                        echo '<option value="'.$pokemon['url'].'">'.ucfirst($pokemon['name']).'</option>';
                    }
                ?>
            </select>
            <input type="submit" name="" id="" value="Buscar">
        </form>        
    </center>

    <h2>Pokemones:</h2><br>
    
    <center>
        <?php 
            $url = 'https://pokeapi.co/api/v2/pokemon/?limit=1036';
            $data = json_decode(file_get_contents($url), true);
            foreach ($data['results'] as $pokemon) {
                $pokemonName = $pokemon['name'];
                $pokemonId = getIdFromUrl($pokemon['url']);
                echo "<div class='pokemon-card'><img class='pokemon-img' data-url='{$pokemon['url']}' src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$pokemonId}.png' alt='{$pokemonName}'><br>{$pokemonName}</div>";
            }

            function getIdFromUrl($url) {
                $parts = explode('/', $url);
                return $parts[count($parts) - 2];
            }
        ?>
    </center>

    
    <div id="pokemonModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="pokemonInfo"></div>
        </div>
    </div>

    <script>
        // Array de URLs de las músicas
        var musicas = [
            "musica/notube.mobi - Pokémon Sword & Shield - Marnie Battle Music [TMG Remix].mp3",
            "musica/notube.mobi - Battle! Gym Leader - Remix Cover (Pokémon Sword and Shield).mp3",
            "musica/Crystal _ Red Battle Theme Remix.mp3"
            // Añade más URLs de música aquí
        ];
        
        var currentTrack = 0;
        var audio = document.getElementById("bgMusic");

        // Función para reproducir la siguiente pista de audio
        function playNextTrack() {
            currentTrack = (currentTrack + 1) % musicas.length;
            audio.src = musicas[currentTrack];
            audio.play();
        }

        // Evento para detectar el final de la pista y reproducir la siguiente
        audio.addEventListener("ended", playNextTrack);
    </script>

    <script src="script.js"></script>
</body>

</html>
