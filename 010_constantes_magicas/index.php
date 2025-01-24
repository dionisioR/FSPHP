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
        <h1 class="display-3">Constantes Mágicas</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Constantes</h2>
        <?php
        // Em PHP podemos declarar as constantes de duas maneiras
        define("CURSO", "Curso de PHP");

        // Ou usando a palavra-chave const
        // Esta maneira não funciona dentro de estruturas devendo ser declarado fora delas
        const TIPO_CURSO = 'Programaçao';

        // As constantes também não funcionam dentro de aspas
        echo CURSO . '<br>'; // Imprime: Curso de PHP
        echo TIPO_CURSO . '<br>'; // Imprime: Programaçao
        echo "<p>{CURSO} {TIPO_CURSO}</p>";  // {CURSO} {TIPO_CURSO}

        if (true) {
            define("TEXTO", "Um exemplo de texto....");  // Pode ser declarado dentro de uma estrutura
            // const STRING = "Uma String";  // não pode ser declarado dentro de uma estrutura
        }

        echo TEXTO . '<br>'; // Imprime: Um exemplo de texto....
        ?>
        <br><br>

        <h2 class="display-6">Constantes nativas do PHP</h2>
        <?php
        $line = __LINE__; // exibe a linha
        echo $line  . '<br/>'; 

        $file = __FILE__;  // exibe o caminho e o arquivo
        echo $file  . '<br/>';

        $dir = __DIR__;  // exibe o caminho do diretório
        echo $dir . '<br/>';
        ?>
        <br><br>



    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>