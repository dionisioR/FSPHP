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
        <h1 class="display-3">Gestão de Diretórios</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Verifica, cria e abre o diretório</h2>
        <?php

        $folder = __DIR__ . '/uploads';
        echo $folder;

        echo '<pre>';
        var_dump(pathinfo($folder));
        echo '</pre>';


        if (!file_exists($folder) || !is_dir($folder)) {
            // se não existe ou não é um diretório
            mkdir($folder, '0755'); // cria o diretório
            echo '<br> Diretório criado com sucesso!';
        } else {
            echo '<pre>';
            var_dump(scandir($folder));
            echo '</pre>';
        }
        ?>
        <br><br>
       

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>