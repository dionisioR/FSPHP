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

    <?php
    require __DIR__ . "/source/autoload.php";
    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Trait</h1>
    </header>

    <main class="container">

        <!--################################################# -->
        <!-- [trait] São traços de código que podem ser reutilizados por mais de uma classe-->
        <!--################################################# -->

        <h2 class="">
            Trait
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        $user = new Source\Traits\User("Dio","Brito","db@g.com");
        $address = new Source\Traits\Address("Rua 1","123","Bairro 1");

        $register = new Source\Traits\Register($user,$address);

        echo "<pre>";
        print_r($register);
        print_r($register->getUser());
        print_r($register->getUser()->getFirstName());
        print_r($register->getAddress());
        print_r($register->getAddress()->getStreet());
        echo "</pre>";


        ?>
        <br><br>

        <h2 class="">
            Agregação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php




        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            Composição
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php




        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->


    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>