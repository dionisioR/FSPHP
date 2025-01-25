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
        <h1 class="display-3">Interação com URLs</h1>
    </header>

    <main class="container">
        <h2 class="">
            Interação Com URLs
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        echo "<a class='btn btn-primary my-3' href='index.php'>Limpar</a> <br>";
        echo "<a class='btn btn-success my-3' href='index.php?arg1=true&arg2=true'>Enviar Dados</a>";

        echo "<pre>";
        var_dump($_GET);
        echo "</pre> <hr>";
        ?>


        <br><br>



        <h2 class="">
            Argumentos
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        // criando agumentos para a URL
        $data = [
            "nome" => "Juca",
            "sobrenome" => "Silva",
            "email" => "juca@gmail.com"
        ];
        $args = http_build_query($data);
        echo $args . '<br>';
        echo "index.php?$args";
        echo "<br>";
        echo "<a href='index.php?$args'>Enviar Dados</a>";

        echo '<br>';
        echo '<br>';


        // podemos converter o dados em um objeto
        $obj = (object) $data;
        echo "<pre>";
        var_dump($obj);
        echo "</pre>";




        ?>
        <br><br>
        <h2 class="">
            Segurança
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        // criando agumentos para a URL
        $data = http_build_query([
            "nome" => "Rodrigo",
            "sobrenome" => "Dionisio",
            "email" => "RD@gmail.com",
            "site" => "https://www.rd3w.com.br",
            "script" => "<script>alert('Ataque XSS')</script>"
        ]);

        echo '<br>';
        echo "<a href='index.php?{$data}'>Enviar Dados</a>";

        // validando a url
        $dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_URL);

        echo '<hr/>';
        echo "<pre>";
        var_dump($dataUrl);
        echo "</pre>";
        echo '<hr/>';

        // PÓS FILTRO
        if ($dataUrl) {
            if(in_array("", $dataUrl)){
                echo "<p class='alert alert-danger'>Faltam dados</p>";
            }elseif(empty($dataUrl["email"])){
                echo "<p class='alert alert-danger'>O Email não foi enviado</p>";
            }elseif(!filter_var($dataUrl["email"], FILTER_VALIDATE_EMAIL)){
                echo "<p class='alert alert-danger'>Email inválido</p>";
            }else{
                echo "<p class='alert alert-success'>Dados enviados com sucesso</p>";
            }
        } else {
            echo "Nenhum dado foi enviado";
        }



        // PRÉ FILTRO

        $dataFilter = http_build_query([
            "nome" => "Rodrigo",
            "sobrenome" => "Dionisio",
            "email" => "RD@gmail.com",
            "site" => "https://www.rd3w.com.br",
            "script" => "<script>alert('Ataque XSS')</script>"
        ]);

        // convertendo para uma string e armazenado na variável $arrDataFilter
        // o parse_str transforma a string em um array associativo
        parse_str($dataFilter, $arrDataFilter);
        
        echo '<hr/>';
        echo "<pre>";
        var_dump($arrDataFilter);
        echo "</pre>";


        $dataPreFilter = [
            "nome" => FILTER_SANITIZE_SPECIAL_CHARS,
            "sobrenome" => FILTER_SANITIZE_SPECIAL_CHARS,
            "email" => FILTER_VALIDATE_EMAIL,
            "site" => FILTER_VALIDATE_URL,
            "script" => FILTER_SANITIZE_STRING
        ];


        // APLICANDO A VALIDAÇÃO
        echo "<pre>";
        var_dump(filter_var_array($arrDataFilter, $dataPreFilter));

        ?>
        <br><br>



    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>