<?php

function escolhaPokemon($pokemon){
    $response = file_get_contents('https://pokeapi.co/api/v2/type/'.$pokemon);
    $response = json_decode($response); 
    return $response;
}

function escolhaTipo($temperatura){
    if($temperatura < 5){
        return 'ice';
    }

    if($temperatura >= 5 and $temperatura <= 10){
        return 'water';
    }

    if($temperatura >= 12 and $temperatura <= 15){
        return 'grass';
    } 
    
    if($temperatura > 15 and $temperatura <= 21){
        return 'ground';
    }

    if($temperatura > 22 and $temperatura <= 27){
        return 'bug';
    }

    if($temperatura >= 27 and $temperatura <= 33){
        return 'rock';
    }

    if($temperatura > 33){
        return 'fire';
    }

    if($temperatura == "rain"){
        return 'electric';
    }

}
?>