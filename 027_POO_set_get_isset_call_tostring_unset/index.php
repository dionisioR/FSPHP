<?php
        require __DIR__ . "/source/autoload.php" ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RD3W - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        h2 {
            background-color: #222;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 10px;
            font-weight: 400;
            font-family: monospace;
        }

        h2 span {
            font-weight: 300;
            color: #ccc;
        }
    </style>
</head>

<body>
    <header class="text-center p-5">
        <h1 class="display-3">Métodos mágicos <br> Interpretação e operação</h1>
    </header>

    <main class="container">
        <h2 class="">
            __set
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php


        // [set] - Executado automaticamente ao tentar atribuir um valor a uma propriedade inacessível.

        $rd3w = new Source\Interpretation\Product();
        $rd3w->handler("PHP", 1999.99);

        $rd3w->name = "JavaScript";
        $rd3w->title = "JavaScript"; // A propriedade title não existe em Source\Interpretation\Product!
        $rd3w->value = 1999.99; // A propriedade value não existe em Source\Interpretation\Product!
        // $rd3w->price = 1999.99; // A propriedade price é privada em Source\Interpretation\Product!

        echo "<pre>";
        print_r($rd3w);
        echo "</pre>";

        $rd3w->title = "PHP 8.0 com POO";
        $rd3w->company = "RD3W Cursos";

        ?>


        <br><br>



        <h2 class="">
            __get
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [get] - Executado automaticamente ao tentar acessar uma propriedade inacessível.

        echo "<p> O curso {$rd3w->title} da {$rd3w->company} é o melhor curso de PHP do mercado!!!</p>";



        ?>
        <br><br>
        <h2 class="">
            __isset
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [isset] - Executado automaticamente ao verificar se uma propriedade inacessível existe.
        // quando utilizamos as propriedades de um objeto em uma função isset() ou empty().
        // isset() - Verifica se a propriedade existe e se não é nula (se foi setada).
        // empty() - Verifica se a propriedade existe e se não é vazia.
        // isset() e empty() são usados para verificar se uma variável foi setada ou não.

        $teste;
        $existe = "existe";
        echo '<pre>';
        var_dump([
            'naoExiste_isset' => isset($naoExiste),
            'naoExiste_empty' => empty($naoExiste),
            "teste_isset" => isset($teste),
            "teste_empty" => empty($teste),
            "existe_isset" => isset($existe),
            "existe_empty" => empty($existe),

        ]);
        echo '</pre>';
        echo "<hr>";
        isset($rd3w->title);
        empty($rd3w->title);
        echo "<hr>";
        isset($rd3w->company);
        empty($rd3w->company);


        ?>
        <br><br>




        <h2 class="">
            __call
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [call] - Executado automaticamente ao tentar executar um método inacessível.
        $rd3w->notFound("call", "title");
        $rd3w->setPrice(1999.99, 10); // O método setPrice não existe em Source\Interpretation\Product!
        ?>

        <br><br>



        <h2 class="">
            __toString
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [toString] - Executado automaticamente ao tentar imprimir um objeto (quando utilizamos o echo por exemplo), ou converter um objeto para string.
        echo $rd3w;

        ?>
        <br><br>




        <h2 class="">
            __unset
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [unset] - Executado automaticamente ao tentar remover uma propriedade inacessível.
        // unset() - Remove a propriedade de um objeto.
        // unset() é usado para remover uma variável ou um índice de um array.
        unset(
            $rd3w->name,
            $rd3w->price,
            $rd3w->data
        );

        var_dump($rd3w);
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>