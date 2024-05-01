<?php
if(isset($_POST['pokemon_url'])) {
    $pokemonUrl = $_POST['pokemon_url'];
    $pokemonData = json_decode(file_get_contents($pokemonUrl), true);
    
   
    $pokemonName = ucfirst($pokemonData['name']);

    $pokemonSpriteUrl = $pokemonData['sprites']['other']['showdown']['front_default'];

    // Altura del Pokemon
    $altura = $pokemonData['height'] / 10 .'cm';

    // Peso del Pokemon
    $peso = $pokemonData['weight'] / 10 . ' Kg';

    // Habilidades
    $abilities = [];
    foreach($pokemonData['abilities'] as $ability) {
        $abilities[] = ucfirst($ability['ability']['name']);
    }
    $abilitiesStr = implode(', ', $abilities);

    // Estadísticas
    $vida = null;
    $attack = null;
    $defense = null;
    $speed = null;
    foreach($pokemonData['stats'] as $stat) {
        switch($stat['stat']['name']) {
            case 'hp':
                $vida = $stat['base_stat'];
                break;
            case 'attack':
                $attack = $stat['base_stat'];
                break;
            case 'defense':
                $defense = $stat['base_stat'];
                break;
            case 'speed':
                $speed = $stat['base_stat'];
                break;
        }
    }
    
    if (!empty($pokemonSpriteUrl)) {
        
        echo json_encode(array(
            'attack' => $attack,
            'defense' => $defense,
            'speed' => $speed,
            'hp' => $vida,
            'name' => $pokemonName,
            'sprite' => $pokemonSpriteUrl,
            'height' => $altura,
            'weight' => $peso,
            'abilities' => $abilitiesStr
        ));
    } else {
       
        echo json_encode(array('error' => 'No se pudo encontrar la imagen del Pokémon.'));
    }
} else {
    
    echo json_encode(array('error' => 'URL del Pokémon no proporcionada.'));
}
?>
