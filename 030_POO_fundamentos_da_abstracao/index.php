<!DOCTYPE html>
<html lang="pt-br">

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
        <h1 class="display-3">Fundamentos da abstração</h1>
    </header>

    <!--################################################# -->
    <!-- 
    [Superclass]  É a classe criada como modelo e regra para ser 
     herdada por outras classes, mas nunca ser instancada po um objeto
     -->
    <!--################################################# -->
    <main class="container">
        <h2 class="">
            Superclass
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        $client = new Source\App\User("Rodrigo", "Dionisio");
        // $account = new Source\Bank\Account("0001", "123456", $client, 1000);

        echo "<pre>";
        var_dump(
            $client, 
            // $account
        );
        echo "</pre>";



        ?>
        <br><br>
        <!--################################################# -->
        <!--
        [Especialista] É uma classe filha que implementa a superclasse 
        e se especializa com suas próprias rotinas -->
        <!--################################################# -->

        <h2 class="">
            Especialização - a
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $saving = new \Source\Bank\AccountSaving("0001", "123456", $client, 0);

        echo "<pre>";
        var_dump(
            $saving
        );
        echo "</pre>";

        $saving->deposit(1000);
        $saving->withdrawal(1500);
        $saving->extract();
        $saving->withdrawal(1000);
        $saving->extract();
        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            Especialização - b
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