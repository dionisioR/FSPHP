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
        <h1 class="display-3">Variáveis e tipos de dados</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Variáveis</h2>
        <?php
        $userFirstName = "Rodrigo";
        $userLastName = "Dionisio";
        $userIdade = 33;
        echo "Nome completo: {$userFirstName} {$userFirstName} - idade: {$userIdade}.<br/>";
        $userAge = $userIdade;
        echo "Nome completo: {$userFirstName} {$userFirstName} - idade: {$userAge}. <br/>";

        //--------------------------
        $company = "RD3W";
        $$company = "Canal do youtube";
        echo $company . " - " . $RD3W  . "<br/>";

        //-------------------------------
        // REFERENCIANDO UMA VARIÁVEL
        $calcA = 10;
        $calcB = 15;
        echo $calcA . " - " .  $calcB . "<br/>";

        // referenciando a variável
        $calcB = &$calcA;
        echo $calcA . " - " .  $calcB . "<br/>";
        $calcB += 5;
        echo $calcA . " - " .  $calcB . "<br/>";

        ?>
        <hr>
        <h2 class="display-6">Booleano</h2>
        <?php
        $true = true;
        $false = false;
        echo "$true - $false <br/>";

        // São considerados falsos
        $a = 0;
        $b = 0.0;
        $c = '';
        $d = "";
        $e = [];
        $f = null;

        echo "<pre>";
        var_dump($a,  $b, $c, $d, $e, $f);
        echo "</pre>";
        if ($a ||  $b || $c || $d || $e || $f) {
            echo "Todas as variáveis são falsas";
        } else {
            echo "Alguma das variáveis é verdadeira";
        }
        ?>
        <hr>
        <h2 class="display-6">Callback</h2>
        <?php
        $code = "<article><h1>Um exemplo de código HTML! </h1></article>";
        // Vai retirar todas as tags
        $codeClear = call_user_func("strip_tags", $code);
       
        echo $code . '<br>';
        echo $codeClear . '<br>';

        //--------------------------------
        // função anônima
        $codeMore = function(){
            return  'Essa é uma função anônima';
        };

        echo $codeMore();
        ?>
        <hr>
        <h2 class="display-6">Outros</h2>
        <?php
        $string = "String";
        $array = [$string];
        $object = new stdClass();
        $object->hello = $string;
        $null = null;
        $int = 123;
        $float = 1.123;
        $bbol = true;
        echo "<pre>";
        var_dump([
            $string,
            $array,
            $object,
            $object->hello,
            $null,
            $int,
            $float,
            $bbol
        ]);
        echo "</pre>";
        ?>

    </main>
    <footer class="text-center">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>