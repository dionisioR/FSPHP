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

    use Source\Database\Connect;
    use Source\Models\UserModel;

    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Removendo registro ativo</h1>
    </header>

    <main class="container">
        <h2 class="">
            destroy
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // [Destroi] Deleta um registro ativo

        $model = new \Source\Models\UserModel();
        $user = $model->load(3);
        if ($user) {
            $user->destroy();
        }

        echo "<pre>";
        var_dump($user);
        echo "</pre>";



        ?>
        <br><br>
        <h2 class="">
            modelo destroy
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // [model destroy] Deletar em cadeia

        $list = $model->all(100, 27);

        // excluindo todos os registros da lista
        /**@var \Source\Models\UserModel $user */
        if ($list) {
            foreach ($list as $user) {

                echo "<pre>";
                print_r($list);
                echo "</pre>";

                $user->destroy();
            }
        }

        echo "<pre>";
        var_dump($list);
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