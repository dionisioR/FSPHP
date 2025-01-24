<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RD3W - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style></style>
</head>

<body>
    <header class="text-center p-5">
        <h1 class="display-3">Array</h1>
    </header>

    <main class="container">
        <h2 class="display-6">[ ] - Manipulação</h2>
        <?php
        $index = [
            "Pink Floyd",
            "Nirvana",
            "Queen",
            "AC/DC",
        ];

        $assoc = [
            "band_1" => "Pink Floyd",
            "band_2" => "Nirvana",
            "band_3" => "Queen",
            "band_4" => "AC/DC",
        ];

        echo '<pre>';
        var_dump($index);
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';


        ?>
        <br><br>
        <h2 class="display-6">array_unshift - Adiciona elementos no ínicio do array</h2>
        <?php


        // Adiciona elementos no início do array
        array_unshift($index, "teste1");
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';


        array_unshift($index, "teste_a", "teste_b", "teste_c");
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        // Adiciona elementos no inicio do array associativo
        $assoc = ["band_5" => "Pear Jam", "band_6" => ">>> :) <<<"] + $assoc;
        echo '<pre>';
        var_dump($assoc);
        echo '</pre>';
        ?>
        <br><br>
        <h2 class="display-6">array_push - Adiciona elementos no final do array</h2>
        <?php
        array_push($index, "fim_01");
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        array_push($index, "fim_02", "fim_03", "fim_04");
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        // Adiciona elementos no final do array associativo
        $assoc = $assoc + ["band_7" => "The Beatles", "band_8" => "Led Zeppelin"];
        echo '<pre>';
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';
        ?>
        <br><br>
        <h2 class="display-6">array_shift - Remove o primeiro elemento do array</h2>
        <?php
        array_shift($index);
        array_shift($index);
        array_shift($index);
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        array_shift($assoc);
        array_shift($assoc);
        echo '<pre>';
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';
        ?>
        <br><br>
        <h2 class="display-6">array_pop - Remove o último valor do array</h2>
        <?php
        array_pop($index);
        array_pop($index);
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        array_pop($assoc);
        array_pop($assoc);
        echo '<pre>';
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">array_filter - Elimina arrays vazios</h2>
        <?php
        $index = ["", "AAA", "BBB", "", "CCC", "DDD", ""];
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        $index = array_filter($index);
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';


        $assoc = ["band_1" => "", "band_2" => "AAA", "band_3" => "BBB", "", "band_4" => "CCC", "band_5" => "DDD", ""];
        echo "<pre>";
        var_dump($assoc);
        echo "</pre>";
        echo '<br>---------------------<br>';

        $assoc = array_filter($assoc);
        echo "<pre>";
        var_dump($assoc);
        echo "</pre>";
        echo '<br>---------------------<br>';


        ?>
        <br><br>
        <h2 class="display-6">array_reverse - Inverte a ordem do array</h2>
        <?php
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        $index = array_reverse($index);
        echo "<pre>";
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        echo "<pre>";
        var_dump($assoc);
        echo "</pre>";
        echo '<br>---------------------<br>';

        $assoc = array_reverse($assoc);
        echo "<pre>";
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">asort - Ordenar pelo valor e mantendo seus índices</h2>
        <p>Modifica o array original</p>
        <?php

        $index = [
            "Pink Floyd",
            "Nirvana",
            "Queen",
            "AC/DC",
        ];

        $assoc = [
            "band_1" => "Pink Floyd",
            "band_2" => "Nirvana",
            "band_3" => "Queen",
            "band_4" => "AC/DC",
        ];
        
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        asort($index);
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        echo "<pre>";
        var_dump($assoc);
        echo "</pre>";
        echo '<br>---------------------<br>';
        
        asort($assoc);
        echo "<pre>";
        var_dump($assoc);
        echo '</pre>';
        echo '<br>---------------------<br>';


        ?>
        <br><br>
        <h2 class="display-6">ksort - Ordena pelo índice</h2>
        <p>Modifica o array original</p>
        <?php
            echo '<pre>';
            var_dump($index);
            echo '</pre>';
            echo '<br>---------------------<br>';
            
            ksort($index);
            echo '<pre>';
            var_dump($index);
            echo '</pre>';
            echo '<br>---------------------<br>';
        ?>
        <br><br>
        <h2 class="display-6">krsort - Ordena pelo indice em ordem decrescente</h2>
        <p>Modifica o array original</p>
        <?php
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';
        
        krsort($index);
        echo '<pre>';
        var_dump($index);
        echo '</pre>';
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">sort - Ordena pelo valor e re-indexa os índice</h2>
        <p>Modifica o array original</p>
        <?php
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        sort($index);
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">rsort - Ordena o array em ordem decrescente e re-indexa os índices</h2>
        <?php
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';
        
        rsort($index);
        echo "<pre>";
        var_dump($index);
        echo "</pre>";
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">array_keys - Cria um novo array só com as chaves de um array associativo</h2>
        <?php
            $chaves = array_keys($assoc);
            echo '<pre>';
            var_dump($chaves);
            echo '</pre>';
            echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">array_values - Cria um novo array só com os valores de um array associativo</h2>
        <?php
        $valores = array_values($assoc);
        echo '<pre>';
        var_dump($valores);
        echo '</pre>';
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        <h2 class="display-6">in_array - Verifica se existe algum valor no array</h2>
        <?php
            echo '<pre>';
            var_dump($assoc);
            echo '</pre>';
            echo '<br>---------------------<br>';

            // in_array('Valor_procurado', array)
            echo in_array("Nirvana", $assoc)? "Nirvana encontrado" : "Valor não encontrado";
            echo "<br>";
            echo in_array("ABCD", $assoc)? "ABCD encontrado" : "Valor não encontrado";
            echo "<br>";

        ?>
        <br><br>
        <h2 class="display-6">implode - Converte um array em uma string com um separador</h2>
        <?php
            echo '<pre>';
            var_dump($assoc);
            echo '</pre>';
            echo '<br>---------------------<br>';

            $string = implode(" - ", $assoc);
            echo $string;
            echo '<br>---------------------<br>';
            $string = implode(", ", $assoc);
            echo $string;
            echo '<br>---------------------<br>';
            $string = implode(" >>>  &#128512; <<< ", $assoc);
            echo $string;
            echo '<br>---------------------<br>';
        ?>
        <br><br>
        <h2 class="display-6">explode - transforma uma string em um array</h2>
        <?php
        $str = "Um exemplo de string para ser convertida em um array.";
        echo $str . '<br>';
        $arr = explode(" ", $str);
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        echo '<br>---------------------<br>';

        ?>
        <br><br>
        
    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>