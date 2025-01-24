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
        <h1 class="display-3">Manipulação de arquivos</h1>
    </header>

    <main class="container">
        <h2 class="">
            Verificação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <hr>
        <?php
        // Verifica se o arquivo existe
        echo __DIR__;
        echo '<br>';
        // volta um diretório
        echo dirname(__DIR__);
        echo '<br>';

        $file = __DIR__ . '/teste.txt';
        // file_exists() verifica se o arquivo existe
        // is_file() verifica se é um arquivo
        if (file_exists($file) && is_file($file)) {
            echo 'O arquivo existe';
        } else {
            echo 'O arquivo não existe';
        }



        ?>


        <br><br><br>



        <h2 class="">
            Leitura e gravação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <hr>
        <?php

        if (!file_exists($file) || !is_file($file)) {
            // Cria o arquivo
            $file = fopen($file, 'w');
            // escreve no arquivo
            fwrite($file, 'Teste de escrita' . PHP_EOL);
            fwrite($file, 'Teste de escrita 2' . PHP_EOL);
            fwrite($file, 'Teste de escrita 3' . PHP_EOL);
            // Fecha o arquivo
            fclose($file);
            echo 'Arquivo criado';
        } else {
            echo 'Arquivo já existe';
            echo '<pre>';
            var_dump(
                // file() retorna um array com as linhas do arquivo
                file($file),
                // pathinfo() retorna informações sobre o arquivo
                pathinfo($file),

            );
        }
        echo '</pre>';

        echo '<hr>';
        echo file($file)[1];
        echo '<br>';
        echo pathinfo($file)['dirname'];
        echo '<br>';
        echo pathinfo($file)['basename'];
        echo '<br>';
        echo pathinfo($file)['filename'];
        echo '<br>';
        echo pathinfo($file)['extension'];

        echo '<hr>';

        // lendo as linhas do arquivo

        // Abre o arquivo para leitura
        $fileOpen = fopen($file, 'r');
        // Lê o arquivo linha por linha
        while (!feof($fileOpen)) {
            echo fgets($fileOpen) . '<br>';
        }
        // Fecha o arquivo
        fclose($fileOpen);


        ?>
        <br><br><br>




        <h2 class="">
            get, put content
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <hr>
        <?php

        $getContents = __DIR__ . '/teste2.txt';

        if (file_exists($getContents) && is_file($getContents)) {
            echo file_get_contents($getContents); // lê o conteúdo do arquivo
        } else {
            $data = "<h1>Teste de escrita</h1>";
            // file_put_contents() 
            // Isso cria o arquivo (caso ele não exista) ou substitui o conteúdo dele com a string passada por parâmetro
            file_put_contents($getContents, $data);

            // file_get_contents() lê o conteúdo do arquivo
            echo file_get_contents($getContents);
        }


        // excluido o arquivo
        if(file_exists($getContents) && is_file($getContents)){
            unlink($getContents);
        }

        // ou
        if(file_exists(__DIR__ . "/teste.txt") && is_file(__DIR__ . "/teste.txt")){
            unlink($getContents);
        }

        
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>