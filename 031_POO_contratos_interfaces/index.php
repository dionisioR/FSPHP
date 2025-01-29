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
        <h1 class="display-3">Contratos e interfaces</h1>
    </header>

    <!-- [implementação] Um contrato de quais métodos a classe deve implementar -->
    <main class="container">
        <h2 class="">
        Implementação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // require __DIR__ . "/source/Contracts/UserInterface.php";
        // require __DIR__ . "/source/Contracts/User.php";
        $user = new Source\Contracts\User(
            "Rodrigo",
            "Dionisio",
            "rd3w@g.com"
        );

        $admin = new Source\Contracts\UserAdmin(
            "Rodrigo Admin",
            "Dionisio Admin",
            "rd3w_adm@g.com",
        );

        echo "<pre>";
        var_dump($user, $admin);
        echo "</pre>";



        ?>
        <br><br>
        <!--################################################# -->
        <!-- [associação] Um exemplo associado ao login -->
        <!--################################################# -->

        <h2 class="">
            Associação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $login = new Source\Contracts\Login();

        $loginUser = $login->loginUser($user);
        $loginAdmin = $login->loginAdmin($admin);

        echo "<pre>";
        var_dump(
            $loginUser,
            $loginAdmin
        );
        echo "</pre>";


        ?> 
        <br><br>
        <!--################################################# -->
        <!-- [Dependência] - Dependency Injection oi DI, é um contrado de relação entre objetos
         onde um método assina seu atributos com uma interface -->
        <!--################################################# -->

        <h2 class="">
            Dependência
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        echo "<pre>";
        var_dump(
            $login->login($user),
            $login->login($user)->getFirstName(),
            $login->login($user)->getEmail(),
            $login->login($admin),
            $login->login($admin)->getFirstName(),
            $login->login($admin)->getEmail()
        );
        echo "</pre>";



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