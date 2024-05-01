<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pokémon</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <center>
        <a href="https://fontmeme.com/es/fuente-pokemon/"><img src="https://fontmeme.com/permalink/240430/4c44d3cf5e5ee4b7b6f8b4aaf0a6c0ce.png" alt="fuente-pokemon" border="0"></a>
    </center>
    <center>
        <form id="pokemonForm" action="">
            <select id="pokemonSelect" name="pokemon">
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
                echo "<div class='pokemon-card'><img class='pokemon-img' data-url='{$pokemon['url']}' src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$pokemonId}.png' alt='{$pokemonName}'></div>";
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

    <script src="script.js"></script>
</body>
</html>
