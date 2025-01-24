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
        <h1 class="display-3">Arrays & Vetores</h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">Index Array</h2>
        <?php
           $arrayA = array(1, 2, 3);
           echo "<pre>";
           var_dump($arrayA);
           echo "</pre>";

           $arrayB = [ 0, 1, 2, 3];
           echo "<pre>";
           var_dump($arrayB);
           echo "</pre>";

           $arrayIndex = [
            'AAA',
            'BBB',
            'CCC'
           ];

           echo "<pre>";
           var_dump($arrayIndex);
           echo "</pre>";

           // Adicionando valores ao final do array
           $arrayIndex[] = "DDD";
           $arrayIndex[] = "EEE";
           $arrayIndex[] = "FFF";

           echo "<pre>";
           var_dump($arrayIndex);
           echo "</pre>";


        ?>
    <h2 class="display-6">Arrau Associativo</h2>
        <?php
           $arrayAssoc = [
            "A1" => "AAA",
            "A2" => "BBB",
            "A3" => "CCC",
            "A4" => "DDD"
           ];
           echo "<pre>";
           var_dump($arrayAssoc);
           echo "</pre>";

           // Adicionando valores ao final do array
           $arrayAssoc["A5"] = "EEE";
           $arrayAssoc["A6"] = "GGG";
           echo "<pre>";
           var_dump($arrayAssoc);
           echo "</pre>";

        ?>
    <h2 class="display-6">Array Multidimensional</h2>
        <?php
           $arrMult01 = [
            [1,2],
            ["A","B"]
           ];

           echo "<pre>";
           var_dump($arrMult01);
           echo "</pre>";

           $brian = ["Brian", "Mic"];
           $angus = ["name" => "Angus", "instrument" => "Guitar"];

           $instruments = [
            $brian,
            $angus
           ];

           echo "<pre>";
           var_dump($instruments);
           echo "</pre>";

           $arrMult02 = [
            "brian" => $brian,
            "angus" => $angus
           ];

           echo "<pre>";
           var_dump($arrMult02);
           echo "</pre>";


        ?>
    <h2 class="display-6">Acessando dados do array</h2>
        <?php

        $arrayA = [1,2,3];
        echo  $arrayA[0] . "<br>";
        echo $arrayA["1"] . "<br>"; 

        $arrayB = [
            "nome" => "Rodrigo",
            "idade" => 25,
            "profissao" => "DEV"
        ];

        echo "Nome: {$arrayB["nome"]} idade: {$arrayB["idade"]}  profissão: {$arrayB["profissao"]}.<br>";
           
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>