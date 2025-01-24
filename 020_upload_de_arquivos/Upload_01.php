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
    <header class="text-center p-5">
        <h1 class="display-3">Upload de Arquivos</h1>
    </header>

    <main class="container">
        <p>
            <a href="./index.php" class="btn btn-primary">Voltar</a>
        </p>


        <?php
        // criando o diretório para upload
        $folder = __DIR__ . "/uploads";

        if (!file_exists($folder) || !is_dir($folder)) {
            mkdir($folder, 0755);
        }

        echo "<pre>";
        var_dump([
            "filesize" => ini_get("upload_max_filesize"),  // tamanho máximo por arquivo individual
            "postsize" => ini_get("post_max_size")  // tamanho máximo que pode ser enviado pelo formumário
        ]);
        echo "</pre>";

        // validando o tipo de arquivo 
        $getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);  // retorna true/false

        //    $_FILES  - variável global que verifica se existe o arquivo
        if ($_FILES && !empty($_FILES['file']['name'])) {
            echo '<pre>';
            var_dump($_FILES);
            echo '</pre>';
        }elseif($getPost){
            echo '<div class="alert alert-danger" role="alert">Opsss!!!<br> Parece que o arquivo é muito grande!</div>';
        }else{
            if($_FILES){
                echo '<div class="alert alert-danger" role="alert">Opsss!!!<br> Selecione um arquivo para enviar!</div>';
            }
        }


        echo '<pre>';
        var_dump(
            // verifica o que tem dentro da pasta uploads
            scandir(__DIR__ . "/uploads")
        );
        echo '</pre>';
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>