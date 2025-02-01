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
    require __DIR__ . "/../source/autoload.php";



    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Sessões</h1>
    </header>

    <main class="container">
        <h2 class="">
            Session
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        /*
            [session] Uma classe statless para manipulação de sessões.
        */

        $session = new Source\Core\Session();

        $session->set("user", 1);
        $session->regenerate();

        // $session->set("stats", 255);
        $session->set("stats", ["name", "email"]);
        $session->unset("stats");

        if(!$session->has("login")){
            echo "<p class='alert alert-danger'>Logar-se!</p>";
            // simulando o login
            $user = (new \Source\Models\User())->load(1);
            $session->set("login", $user->data());
        }

        $session->destroy();

        echo "<pre>";
        var_dump(
            $_SESSION,
            $session->all(),
            // $session->user,
            // session_id(),
        );
        echo "</pre>";

        ?>
        <br><br>





    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>