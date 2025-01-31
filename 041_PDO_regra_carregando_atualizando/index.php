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
        <h1 class="display-3">Carregando e atualizando</h1>
    </header>

    <main class="container">
        <h2 class="">
            save updata
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // [save update] Salvar o usuário ativo (active record)

        $model = new \Source\Models\UserModel();
        $user = $model->load(2);

        // echo "<pre>";
        // var_dump($user);
        // echo "</pre>";

        // $user->first_name = "Ricardo";
        // $user->last_name = "Barbosa";
        // $user->email = "ricardo@email.com";
        // $user->save();

        if ($user != $model->load(2)) {
            $user->save();
            echo "<p class='alert alert-warning'>Usuário atualizado com sucesso</p>";
        } else {
            echo "<p class='alert alert-success'>Usuário já atualizado</p>";
        }


        echo '<hr>';
        echo "<pre>";
        var_dump($user);
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