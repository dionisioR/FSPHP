<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RD3W - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style></style>
</head>

<body>
    <main class="container mt-5">
        <a href="./index.php">VOLTAR</a>
        <?php
            echo '<pre>';
            var_dump($_GET);
            echo '</pre>';

            $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
            $nome = filter_input(INPUT_GET, 'name', FILTER_DEFAULT);
            echo $email . '<br>';
            echo $nome . '<hr>';

            $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
            echo '<pre>';
            var_dump($get);
            echo '</pre>';
            echo $get['name'] . '<br>';
            echo $get['email'] . '<br>';

            echo '<br><h2>Filter_list()</h2>';
            echo '<pre>';
            var_dump(filter_list());
            echo '</pre>';

            echo '<br><h2>Validando filter_input_array</h2>';

            // primeiro devemos ordenar o tipo de filtro com cada campo do formulário
            $filtro = [
                'name' => FILTER_DEFAULT,
                'email' => FILTER_VALIDATE_EMAIL
            ];
            $getForm = filter_input_array(INPUT_GET, $filtro);

            echo '<pre>';
            var_dump($getForm);
            echo '</pre>';


            echo '<br><h2>Validando filter_var</h2>';
            // depois que recebemos os dados do formulário, podemos validar os dados 
            // utilizando o filter_var 
            echo '<pre>';
            $email = 'rd3w@g.com';
            $nome = 'RD3W';
            var_dump([
                'name' => filter_var($nome, FILTER_DEFAULT),
                'email' => filter_var($email, FILTER_VALIDATE_EMAIL)
            ]);
            echo '</pre>';
            echo '<hr>';

            echo '<pre>';
            $email = 'rd3w@';
            $nome = '';
            var_dump([
                'name' => filter_var($nome, FILTER_DEFAULT),
                'email' => filter_var($email, FILTER_VALIDATE_EMAIL)
            ]);
            echo '</pre>';


        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>