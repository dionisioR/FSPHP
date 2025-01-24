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
        <h1 class="display-3">Requisição de Arquivos</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Include / include_once</h2>
        <?php
        // include - permite inserir o mesmo arquivo várias vezes

        // include_once - insere o arquivo uma única vez, uma vez já inserido ele não será inserido novamente mesmo que o código se repita

        // A página condinua funcionando mesmo que o arquivo não exista

        //    include "file.php";
        //    echo __LINE__;

        include 'header.php';
        include __DIR__ . '/header.php';

        $profile = new stdClass();
        $profile->name = "Anna";
        $profile->age = 25;
        $profile->email = 'anna@g.com';

        include __DIR__ . '/profile.php'
        ?>
        <br>
        <br>
        <h2 class="display-6">Require</h2>
        <?php
        // A página para de funcionar se o arquivo não existir
        
        //    require "file.php";
        //    echo __LINE__;

        require __DIR__ . '/footer.php';
        require __DIR__ . '/footer.php';
        require __DIR__ . '/footer.php';
        require __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        require_once __DIR__ . '/footer.php';
        ?>
        <br>
        <br>
    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>