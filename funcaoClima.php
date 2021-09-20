<?php

require_once 'funcaoPokemon.php';

$resultCidade = $_POST['cidade'];

function climaAtual($cidade)
{
    $response = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $cidade . '&appid=42c590834b685f10c9e2cc05e23805e7&units=metric&lang=pt_br');
    $response = json_decode($response);
    return $response;
}

$clima = climaAtual($resultCidade);

$tipoPokemon = escolhaTipo($clima->main->temp);

$pokemon = escolhaPokemon($tipoPokemon);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Onde encontrar um Pokémon</title>
</head>
<body>

    <div class="tela-pokemon">
    <h1>Aqui está seu Pokémon!</h1>                
                <h4>Os Pokémons proximos a você são do tipo:</h4>
                <h2 class="p"><?= $pokemon->name?></h2>
        
                <h4>E um deles é:</h4>
                <h2 class="p"><?= $pokemon->pokemon[0]->pokemon->name;?></h2>

                <?php foreach ($imgPokemons->pokemon as $imgPokemon) {
                    if(strtolower($imgPokemon->name) == strtolower($pokemon->pokemon[0]->pokemon->name)){
                        $img = $imgPokemon->img;
                    ?> 
                <img src="<?=$img?>">
                    
                <?php } } ?>
         
                <h4>Hoje em <?=$resultCidade?> está:</h4>
                <h2 class="p"><?=$clima->main->temp?>°C</h2>
                <h2 class="p"><?=$clima->weather[0]->description?></h2>
    </div>
    <div class="what">
        <!-- <img src="img/what.png"> -->
    </div>
</body>
</html>