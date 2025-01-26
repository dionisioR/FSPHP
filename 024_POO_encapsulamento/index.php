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
        <h1 class="display-3">Encapsulamento e qualificação</h1>
    </header>

    <main class="container">
        <h2 class="">
            namespace
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        require_once __DIR__ . '/classes/App/Template.php';
        require_once __DIR__ . '/classes/Web/Template.php';

        // 1ª maneira de instanciar a classe Template
        $appTemplate = new App\Template();
        $webTemplate = new Web\Template();

        echo '<pre>';
        var_dump([
            $appTemplate,
            $webTemplate
        ]);
        echo '</pre>';
        echo '<hr>';


        // 2ª maneira de instanciar a classe Template
        use App\Template;
        use Web\Template as WebTemplate;

        $appUseTemplate = new Template();
        $webUseTemplate = new WebTemplate();

        echo '<pre>';
        var_dump([
            $appUseTemplate,
            $webUseTemplate
        ]);
        echo '</pre>';



        ?>


        <br><br>



        <h2 class="">
            visibilidade
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        require __DIR__ . "/source/Qualifield/User.php";

        $user = new Source\Qualifield\User();
        // $user->firstName = 'RD3W';
        // $user->lastName = 'Treinamentos';
        // $user->email = 'rd3w@cursos.com';

        // $user->setFirstName('RD3W');
        // $user->setLastName('Treinamentos');
        // $user->setEmail('rd3w@cursos.com');

        echo '<pre>';
        var_dump(
            $user,
            get_class_methods($user)
        );
        echo '</pre>';

        echo "O e-mail do usuário {$user->getFirstName()} é: {$user->getEmail()}";
        ?>
        <br><br>
        <h2 class="">
            Manipulação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $dio = $user->setUser("Rodrigo", "Dionisio", "rd3w");
        if (!$dio) {
            echo "<p class='alert alert-danger'>" . $user->getError() . "</p>";
        }
       

        $rod = new Source\Qualifield\User();

        $rod->setUser("Rodrigo", "Dionisio", "rd3w@gmail.com");
        if (!$rod) {
            echo "<p class='alert alert-danger'>" . $user->getError() . "</p>";
        } else {
            echo '<pre>';
            var_dump(
                $rod,
            );
            echo '</pre>';
        }


        echo '<pre>';
        var_dump(
            $dio,
            $rod
        );
        echo '</pre>';

        ?>
        <br><br>






    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>