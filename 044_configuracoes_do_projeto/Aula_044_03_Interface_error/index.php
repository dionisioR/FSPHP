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

    use Source\Database\Connect;
    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Uma única interface de erro</h1>
    </header>

    <main class="container">
        <h2 class="">
            message class
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // [message class] uma classe padrão para reportar ao usuário
        $message = new  Source\Core\Message();

        echo "<pre>";

        var_dump(
            $message,
            get_class_methods($message),

        );
        echo "</pre>";




        ?>
        <br><br>
        <!-- ------------------------------------------------------------ -->




        <h2 class="">
            message types
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [message types] tipos de mensagens para o usuário
        $error = $message->success("Esta é uma mensagem de sucesso");

        echo "<pre>";
        var_dump(
            [
                $error,
                $message->getText(),
                $message->getType(),
                $message->render(),
            ]
        );
        echo "</pre>";

        echo $message;
        echo '<hr>';

        echo $message->info("Esta é uma mensagem de informação");
        echo $message->success("Esta é uma mensagem de sucesso");
        echo $message->warning("Esta é uma mensagem de aviso");
        echo $message->error("Esta é uma mensagem de erro");



        ?>
        <br><br>
        <!-- ------------------------------------------------------------ -->





        <h2 class="">
            json message
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [json message] mudando o padrão de retorno
        echo $message->error("Esta é uma mensagem de erro")->json();
        echo $message->info($message->error("Esta é uma mensagem de erro")->json());


        ?>
        <br><br>
        <!-- ------------------------------------------------------------ -->


        <h2 class="">
            flash message
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [flash message] uma mensagem vias sessão para refresh de navegação

        // $message->success("Esta é uma mensagem FLASH!!!")->flash();

        // echo "<pre>";
        // var_dump(
        //     $_SESSION,
        //     $_SESSION['flash']
        // );

        // echo "</pre>";
        // echo $_SESSION['flash'];

        $session = new Source\Core\Session();
        $message->success("Esta é uma mensagem FLASH!!!")->flash();

        if ($flash = $session->flash()) {
            echo $flash;
            echo "<pre>";
            var_dump([
                $flash->getText(),
                $flash->getType(),
            ]);
            echo "</pre>";
        }

        echo "<pre>";
        var_dump(
            $_SESSION,
            $session->all()
        );
        echo "</pre>";

        ?>
        <br><br>
        <!-- ------------------------------------------------------------ -->



    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>