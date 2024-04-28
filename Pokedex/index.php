<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicializar la variable para el código de Pokémon
        $pokemonCode = '';

        // Verificar si se proporcionó un nombre de Pokémon
        if (!empty($_POST['pokemonName'])) {
            $pokemonName = $_POST['pokemonName'];
            $pokemonData = @file_get_contents("https://pokeapi.co/api/v2/pokemon/{$pokemonName}");
            $pokemonData = json_decode($pokemonData, true);

            // Verificar si se encontraron datos del Pokémon
            if ($pokemonData !== false && isset($pokemonData['id'])) {
                $pokemonCode = $pokemonData['id']; // Obtener el código del Pokémon
            }
        }

        // Verificar si se proporcionó un código de Pokémon directamente solo si no se proporcionó un nombre de Pokémon válido
        if (empty($pokemonCode) && !empty($_POST['pokemonCode'])) {
            $pokemonCode = $_POST['pokemonCode'];
        }

        // Redirigir a index2.php con el código del Pokémon como parámetro
        if (!empty($pokemonCode)) {
            header("Location: index2.php?indice=$pokemonCode");
            exit(); // Asegura que el script se detenga después de la redirección
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylephp.css">
    <title>Pokedex</title>
</head>
<body>
    <center>
        <h1>Pokedex</h1>
        <h2>Pokemones</h2>
        <form action="#" class="search-form" method="post">
            <label for="pokemonName">Nombre:</label>
            <input type="text" placeholder="Buscar Pokémon" name="pokemonName" id="pokemonName" value="<?php if(isset($_POST['pokemonName'])) echo htmlspecialchars($_POST['pokemonName']); ?>">
            <label for="pokemonCode">o Codigo:</label>
            <select name="pokemonCode" id="pokemonCode">
                            <option value="">Seleccionar</option>
                            <?php
                                for($i = 1; $i < 1000; $i++){
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Buscar">
          
        </form>
                                
<?php  
    for($i = 1; $i <= 1025; $i++) {
        echo "
            <div class='card'>
            <a href='index2.php?indice=$i'>
                    <img class='img' src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$i}.png' alt='pokemon'>
                </a>
            </div>";
    }    
?>
    </center>
</body>
</html>