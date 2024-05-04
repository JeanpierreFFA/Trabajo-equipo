$(document).ready(function() {

    function buscarPokemon(pokemonUrl) {
       
        $.ajax({
            url: 'get.php',
            type: 'POST',
            data: { pokemon_url: pokemonUrl },
            dataType: 'json',
            success: function(data) {
               
                $('#pokemonInfo').html('<h2>' + data.name + '</h2>' + '<img src="' + data.sprite + '" alt="' + data.name + '">' + '<p>Altura: ' + data.height + '</p>' +'<p>Peso: ' + data.weight + '</p>'  + '<p>Ataque: ' + data.attack + '</p>' + '<p>Defensa: ' + data.defense + '</p>' + '<p>Velocidad: ' + data.speed + '</p>' + '<p>Vida (HP): ' + data.hp + '</p>' + '<p>Habilidades: ' + data.abilities + '</p>');
                $('#pokemonModal').show();
            },
            error: function() {
                alert('Seleccione un Pokemon para empezar');
            }
        });
    }
    $(document).on('click', '.pokemon-img', function() {
        var pokemonUrl = $(this).data('url'); 
        buscarPokemon(pokemonUrl); 
    });

    
    $('#pokemonForm').submit(function(event) {
        event.preventDefault();
        var pokemonUrl = $('#pokemonSelect').val();
        buscarPokemon(pokemonUrl); 
    });

    
    $('#pokemonSelect').keypress(function(event) {
        
        if (event.which === 13) {
            event.preventDefault(); 
            var pokemonUrl = $('#pokemonSelect').val(); 
            buscarPokemon(pokemonUrl); 
        }
    });

    
    $('.close').click(function() {
        $('#pokemonModal').hide();
    });

    
    $(window).click(function(event) {
        if (event.target == $('#pokemonModal')[0]) {
            $('#pokemonModal').hide();
        }
    });
});
