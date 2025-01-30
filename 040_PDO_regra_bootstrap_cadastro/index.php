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
        <h1 class="display-3">Bootstrap e cadastro</h1>
    </header>

    <main class="container">
        <h2 class="">
            bootstrap
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // [bootstrap] inicialização dos dados

        $model = new \Source\Models\UserModel();
        $user = $model->bootstrap(
            "Rd3W", 
            'Cursos',
            "rd3w1@g.com",
            "12345678901"
        );

        echo "<pre>";
        var_dump($user);
        echo "</pre>";
        
        


        ?>
        <br><br>




        <h2 class="">
            save create
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // [save create] salvar o usuário ativo (active record)
        
        // de acordo com nossas regras de negócio esses campons não podem ser alterados
        // $user->id = 10;  
        // $user->created_at = date("Y/m/d H:i");


        // Testes
        // $user->email = null;
        // $user->email = 'cursos';

        if(!$model->find($user->email)){
            echo "<p class='alert alert-danger'>Cadastro</p>";
            $user->save();
        }else{
            echo "<p class='alert alert-success'>Read</p>";
            $user = $model->find($user->email);
        }




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