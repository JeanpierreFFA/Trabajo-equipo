<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php   
            $indice = $_GET['indice'];

            $pokemonData = @file_get_contents("https://pokeapi.co/api/v2/pokemon/{$indice}");
            $pokemonData = json_decode($pokemonData, true);

            //Imagne   
            //echo "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/showdown/{$indice}.gif' alt='gif'>";
            
            $pokemonName = $pokemonData['name'];
            //Nombre del Pokemon
            //echo "<h2> $pokemonName</h2>";
            
            //echo "<h3>Altura del Pokemon:</h3>";       
            $altura=$pokemonData['height'];
            //Altura del Pokemon
            //echo $altura/10 . ' m';
            //echo "<h3>Peso del Pokemon:</h3>";  
            $peso=$pokemonData['weight'];
            //Peso
            //echo $peso/10 . ' Kg';
            //echo "<h3>Habilidades:</h3>";  
            
            $habilities=$pokemonData['abilities'];
            foreach($habilities as $habi){
                //Abilida
                //echo "<p>{$habi['ability']['name']}</p>";
            }

            //echo "<h3>Categoria :</h3>";
            $pokemonData2 = @file_get_contents("https://pokeapi.co/api/v2/pokemon-species/{$indice}");
            $pokemonData2= json_decode($pokemonData2, true);
            $genus_es = null;
            foreach ($pokemonData2['genera'] as $genus) {
                if ($genus['language']['name'] === 'es') {
                    $genus_es = $genus['genus'];
                    break;
                }
            }
            //Catego
            //echo "<p> $genus_es</p>";

            $types = $pokemonData['types'];
            //echo "<h3>Tipo(s) del Pokémon:</h3>";
            foreach ($types as $type) {
                //Type
                "<p>{$type['type']['name']}</p>";}
            
    ?>
<center>
<table border="1px">
    <tr>
        <th colspan="2"><?php echo "<h2> $pokemonName</h2>"; ?></th>
    </tr>
    <tr>
        <td><?php echo "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/showdown/{$indice}.gif' alt='gif'>"; ?></td>
        <td>
            <table>
                <tr>
                    <td>Altura:</td>
                    <td><?php echo $altura / 10 . ' m'; ?></td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td><?php echo $peso / 10 . ' Kg'; ?></td>
                </tr>
                <tr>
                    <td>Habilidades:</td>
                    <td><?php echo "<p>{$habi['ability']['name']}</p>"; ?></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td><?php echo "<p> $genus_es</p>"; ?></td>
                </tr>
                <tr>
                <td>Tipo:</td>
                <td>
                    <?php
                    foreach ($types as $type) {
                        echo "<p>{$type['type']['name']}</p>";
                    }
                    ?>
                </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</center>

</body>
</html> 