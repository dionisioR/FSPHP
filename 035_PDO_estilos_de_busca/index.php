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
    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Estilos de Busca</h1>
    </header>

    <main class="container">
        <h2 class="">
            fetch
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        $connect = Connect::getInstance();
        $read = $connect->query("SELECT * FROM users LIMIT 3");

        if (!$read->rowCount()) {
            echo "<p class='alert alert-warning'>Nenhum usuário encontrado...</p>";
        } else {

            // o fetch() retorna a primeira linha do resultado, para pegar a próxima linha é necessário chamar o fetch() novamente.
            // depois de chamar o fetch() a primeira vez, o ponteiro de busca é movido para a próxima linha.
            // depois de ler a linha ele apaga o buffer de resultados, para não perder o resultado é necessário armazenar o resultado em uma variável.
            // o fetch() retorna false quando não há mais linhas para serem retornadas.

            echo "<pre>";
            print_r($read->fetch());
            echo "</pre>";

            while ($user = $read->fetch()) {
                echo "<pre>";
                print_r($user);
                echo "</pre>";
            }
        }

        ?>
        <br><br>
        <!-------------------------------------------------------- -->




        <h2 class="">
            fetch all
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // o fetchAll() retorna todas as linhas do resultado em um array.
        // o fetchAll() retorna um array vazio quando não há linhas para serem retornadas.
        // depois de executar o fetchAll() o buffer de resultados é apagado, para não perder o resultado é necessário armazenar o resultado em uma variável.
        $read = $connect->query("SELECT * FROM users LIMIT 3,2");

        // echo "<pre>";
        // print_r($read->fetchAll());
        // echo "</pre>";

        // para percorrer o array retornado pelo fetchAll() é necessário percorrer o array com um foreach.
        foreach ($read->fetchAll() as $user) {
            echo "<pre>";
            print_r($user);
            echo "</pre>";
        }



        ?>
        <br><br>
        <!-------------------------------------------------------- -->





        <!-- 
        Realizar im fetch diretamente em um PDOStatement resulta em um clear no buffer de resultados. Pode armazenar esse resultado em uma variável para não perder o resultado e poder reutilizar futuramente.
        -->
        <h2 class="">
            fetch save
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $read = $connect->query("SELECT * FROM users LIMIT 5,2");
        $results = $read->fetchAll();

        echo "<pre>";

        print_r($read->fetchAll());  // observe que o resultado foi vazio pois os dados forma armazenados na variável $results e o buffer de resultados foi apagado.

        print_r($results);
        print_r($results);
        echo "</pre>";



        ?>
        <br><br>
        <!-------------------------------------------------------- -->


        <h2 class="">
            fetch styles
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $read = $connect->query("SELECT * FROM users LIMIT 15,1");

        // Retorna um objeto
        foreach ($read->fetchAll() as $user) {
            echo "<pre>";
            print_r($user);
            echo $user->first_name;
            echo "</pre>";
        }



        $read = $connect->query("SELECT * FROM users LIMIT 15,1");

        // Retorna um array numérico
        foreach ($read->fetchAll(PDO::FETCH_NUM) as $user) {
            echo "<pre>";
            print_r($user);
            echo $user[1];
            echo "</pre>";
        }


        $read = $connect->query("SELECT * FROM users LIMIT 15,1");

        // Retorna um array associativo
        foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
            echo "<pre>";
            print_r($user);
            echo $user["first_name"];
            echo "</pre>";
        }
        ?>
        <br><br>
        <!-------------------------------------------------------- -->




    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>