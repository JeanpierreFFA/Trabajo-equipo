<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Favicon.png">
    <link rel="stylesheet" href="stylephp.css">
    <title>Pokedex</title>
</head>
<body>

    <center>

        <h1>Pokedex</h1>
        <h2>Pokemones</h2>
        <form action="#" class="search-form">
            <input type="text" placeholder="Buscar Pokémon">
            <button type="submit">Buscar</button>
        </form>
        <?php
        // URL de la pestaña
        $enlace = "https://matias.me/nsfw/?fbclid=IwAR2KKxcRz3P_QoH5nulZ_zbpOGIL3620iPYPiLm2ob0wrabDUGt47-h9_Wk";   

        echo "<form action='$enlace'>";
        echo "<button type='submit'>Pruebame</button>";
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