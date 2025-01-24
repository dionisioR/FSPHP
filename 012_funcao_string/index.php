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
        <h1 class="display-3">Funções para Strings</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Strings e multibytes</h2>
        <?php
        $string = "Um exemplo de string para trabalharmos em nosso estudo com PHP [á, é, í, ó, ú] !!!";
        var_dump(["string" =>$string]);
        echo "<br>";
        var_dump(["strlen" => strlen($string)]);
        echo "<br>";
        var_dump(["mb_strlen" => mb_strlen($string)]);
        echo "<hr>";
        // substr($string, "indice", "qtde")
        var_dump((["subst" => substr($string, "9", "11") ]));
        echo "<br>";
        var_dump((["subst" => substr($string, "9") ]));
        echo "<br>";
        var_dump((["mb_substr" => mb_substr($string, '9')]));
        echo "<br>";
        var_dump((["mb_substr" => mb_substr($string, '9', 11)]));
        echo "<hr>";
        var_dump((["strtoupper" => strtoupper($string) ]));
        echo "<br>";
        var_dump((["mb_strtoupper" => mb_strtoupper($string) ]));
        ?>
        <br><br>
        <h2 class="display-6">Conversão Caixa</h2>
        <?php
            $mbString = $string;
            var_dump((["mb_strtoupper" => mb_strtoupper($mbString)]));
            echo "<br>";
            var_dump((["mb_strtolower" => mb_strtolower($mbString)]));
            echo "<br>";
            var_dump((["mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER)]));
            echo "<br>";
            var_dump((["mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER)]));
            echo "<br>";
            var_dump((["mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE)]));
            // echo "<br>";
        ?>
        <br><br>
        <h2 class="display-6">Substituição</h2>
        <?php
            $mbReplace = "Oi, tudo bem, isso é apenas uma string para teste, ok...!!!";
            var_dump(["mb_strlen" => mb_strlen($mbReplace) ]);
            echo "<br>";
            var_dump(["mb_strpos" => mb_strpos($mbReplace, ",") ]);  // retorna o índice da primeira ocorrência se existir
            echo "<br>";

            var_dump(["mb_strpos" => mb_strpos($mbReplace, "?") ]);  // retorna false caso não encontre
            echo "<br>";
            var_dump(["mb_strrpos" => mb_strrpos($mbReplace,",")]); // retorna o índice da última ocorrência se existir
            echo "<br>";
            var_dump(["mb_substr" => mb_substr($mbReplace,4,45) ]);
            echo "<br>";
            var_dump(["mb_strstr" => mb_strstr($mbReplace, ',', false) ]); // retorna todo o texto após a primeira ocorrência
            echo "<br>";
            var_dump(["mb_strstr" => mb_strstr($mbReplace, ',', true) ]); // retorna todo o texto antes da primeira ocorrência
            echo "<br>";
            var_dump(["mb_strrchr" => mb_strrchr($mbReplace, ',', false) ]);  // retorna todo o texto após a última ocorrência
            echo "<br>";
            var_dump(["mb_strrchr" => mb_strrchr($mbReplace, ',', true) ]);  // retorna todo o texto antes da última ocorrência
            echo '<hr>';
            // str_replace('valor-procurado', 'valor-a-ser-substituido', $mbReplace)
            echo '<p>' . str_replace(' ', '__', $mbReplace) . '</p>';
            echo '<hr>';
            // substituindo várias palavras ao mesmo tempo
            echo '<p>' . str_replace(['tudo','bem','apenas','teste'], '>>> :) <<<', $mbReplace) . '</p>';
            echo '<hr>';

            // poderia ter utilizado qualquer palavra no delimitador
            $article = <<<Delimitador
            <article class='alert alert-success'>
                <h1>event</h1>
                <p>desc</p>
                <p>link</p>
                <p>date</p>
            </article>
            Delimitador;

            $articleData = [
                "event" => "Rock in Rio",
                "desc" => "Rock in Rio é um show de 1992 com a banda The Beatles",
                "link" => "https://www.rockinrio.com.br/",
                "date" => "20/02/2022"
            ];

            echo str_replace(array_keys($articleData), array_values($articleData), $article);
        ?>
        <br><br>
        <h2 class="display-6">Parse String</h2>
        <?php
            $endPoint = "name=Dionisio&email=dio@g.com";

            // cria a variável parseEndPoint (array)
            mb_parse_str($endPoint, $parseEndPoint);
            var_dump($parseEndPoint);
            echo "<br>";
            echo $parseEndPoint['name'];
            echo "<br>";
            echo $parseEndPoint['email'];
            echo "<br>";
            // converte para objeto
            $parseEndPointObj = (object)$parseEndPoint;
            var_dump($parseEndPointObj);
            echo "<br>";
            echo $parseEndPointObj->name;
            echo "<br>";
            echo $parseEndPointObj->email;

        ?>
        <br><br>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>