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
                        <button type="submit" value="Buscar">Buscar

            <!-- <button type="submit">Buscar</button> -->
        </form>
        
        <?php
        // URL de la pestaña
        $enlace = "https://matias.me/nsfw/?fbclid=IwAR2KKxcRz3P_QoH5nulZ_zbpOGIL3620iPYPiLm2ob0wrabDUGt47-h9_Wk";   

        echo "<form action='$enlace'>";
        echo "<button type='submit'>sd</button>";
        echo "</form>";
        ?>

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