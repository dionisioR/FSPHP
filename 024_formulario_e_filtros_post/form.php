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
        echo '<h2>$_POST</h2>';
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        echo '<hr>';
        echo $_POST['name'];
        echo '<br>';
        echo $_POST['email'];
        echo '<hr>';

        echo '<h2>filter_input</h2>';


        // A maneira correta de trabalhar com post e através de filtros
        // devemos evitar utilizar $_POST

        // $post = filter_input(INPUT_POST, "CAMPO", Tipo_de_filtro); 
        $name = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
        echo $name;
        echo '<br>';
        echo $email;

        echo '<hr>';
        echo '<h2>filter_input_array</h2>';

        $postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        echo '<pre>';
        var_dump($postArray);
        echo '</pre>';
        echo '<hr>';
        echo $postArray['name'];
        echo '<br>';
        echo $postArray['email'];

        echo '<hr>';
        echo '<h2>Validando os dados - filter_input_array</h2>';
        if($postArray){ // retorna null caso não tenha nada
            if(in_array("", $postArray)){
                // se tiver algum campo vazio
                echo '<h4 class="text-danger">Por favor, preencha todos os campos!</h4>';
            }elseif(!filter_var($postArray['email'], FILTER_VALIDATE_EMAIL)){
                // se o email não for válido
                echo '<h4 class="text-danger">Por favor, preencha um e-mail válido!</h4>';
            }else{
                $saveStrip = array_map("strip_tags", $postArray); // retira todas as tags
                $save = array_map("trim", $saveStrip); // retira os espaços
                
                echo '<pre>';
                var_dump($save);
                echo '</pre>';

                echo '<h4 class="text-success">Formulário enviado com sucesso!</h4>';
            }

        }

        ?>
    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>