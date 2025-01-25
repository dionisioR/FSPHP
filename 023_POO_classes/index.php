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
        <h1 class="display-3">Classes</h1>
    </header>

    <main class="container">
        <h2 class="">
            Classes e objetos
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        // importando a classe User
        require_once __DIR__ . '/classes/User.php';
        $user = new User();
        echo '<pre>';
        var_dump($user);
        echo '</pre>';



        ?>


        <br><br>



        <h2 class="">
            Propriedades
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        $user->firstName = 'John';
        $user->lastName = 'Doe';
        $user->email = "john@g.com";

        echo '<pre>';
        var_dump($user);
        echo '</pre>';



        ?>
        <br><br>
        <h2 class="">
            Métodos
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        echo $user->getFirstName();
        echo '<br>';

        echo $user->getLastName();
        echo '<br>';

        echo $user->getEmail();
        echo '<br>';

        echo $user->getFullName();



        ?>
        <br><br>





    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>