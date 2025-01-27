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
        <h1 class="display-3">Membros da classe</h1>
    </header>

    <main class="container">
        <h2 class="">
            Constantes
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        use Source\Members\Config;
        $config = new Config();

        echo "<p>Empresa: " . $config::COMPANY . "</p>";

        echo '<pre>';

        // Chamando as constantes através do objeto
        var_dump([
            $config::COMPANY,
            // $config::DOMAIN,
            // $config::SECTOR
        ]);

        // Chamando as constantes diretamente através da classe
        var_dump([
            Config::COMPANY,
            // Config::DOMAIN,
            // Config::SECTOR
        ]);

        var_dump($config);
        echo '</pre>';


        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            ReflectionClass
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        $reflection = new ReflectionClass($config); //ou
        // $reflection = new ReflectionClass(Config::class);
        echo '<pre>';
        var_dump($reflection);
        echo '</pre>';
        echo "<hr>";

        echo '<pre>';
        // retorna todos os métodos da classe
        var_dump(get_class_methods($reflection));
        echo '</pre>';
        echo "<hr>";

        // buscando todas as contains da classe
        echo '<pre>';
        var_dump($reflection->getConstants());
        echo '</pre>';
        echo $reflection->getConstant("COMPANY");
        echo "<hr>";







        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            Propriedades
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        Config::$company = "RD3W";
        Config::$domain = "rd3w.com.br";
        Config::$sector = "TI";

        $config::$company = ">>> RD3W <<<";

        echo '<pre>';
        var_dump(
            $config,
            $reflection->getProperties(),
            $reflection->getDefaultProperties()
        );
        echo '</pre>';


        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            Métodos
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php


        // Config::setConfig("", "", "");
        $config::setConfig("RD3W", "rd3w.com.br", "TI");

        echo '<pre>';
        var_dump(
            $config,
            $reflection->getMethods(),
            $reflection->getDefaultProperties()
        );
        echo '</pre>';



        ?>
         <br><br>
        <!--################################################# -->
        <!--################################################# -->

        <h2 class="">
            Uma classe trigger
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        use Source\Members\Trigger;

        $trigger = new Trigger();
        $trigger::show("Mensagem de alerta");
        $trigger::show("Mensagem de sucesso", Trigger::ACCEPT);
        $trigger::show("Mensagem de sucesso", Trigger::WARNING);
        $trigger::show("Mensagem de sucesso", Trigger::ERROR);
        $trigger::show("Mensagem de sucesso", "Não existe");

        echo '<hr>';

        echo Trigger::push("Mensagem de alerta");
        echo Trigger::push("Mensagem de alerta", Trigger::ACCEPT);
        echo Trigger::push("Mensagem de alerta", Trigger::WARNING);
        echo Trigger::push("Mensagem de alerta", Trigger::ERROR);
        echo Trigger::push("Mensagem de alerta", "Não existe");

        echo '<pre>';
        var_dump($trigger);
        echo '</pre>';

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