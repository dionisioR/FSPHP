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
        // criando o diretório para upload para onde os arquivos serão enviados
        $folder = __DIR__ . "/uploads";

        if (!file_exists($folder) || !is_dir($folder)) {
            mkdir($folder, 0755);
        }

        // exibindo o tamanho máximo de upload de arquivos
        // limites establecidos no php.ini
        echo "<h3>Limites de Upload</h3> <hr/>";
        echo "<pre>";
        var_dump([
            "filesize" => ini_get("upload_max_filesize"),  // tamanho máximo por arquivo individual
            "postsize" => ini_get("post_max_size")  // tamanho máximo que pode ser enviado pelo formumário
        ]);
        echo "</pre>";





        // O que não podemos aceitar em nossa aplicação
        // aqui nós falamos de segurança

        // devemos sempre validar o MIME_CONTENT_TYPE
        // Neste exemplo devemos verificar o tipo de arquivo que estamos recebendo
        // devemos ter muito cuidado com os tipos de arquivos que estamos recebendo
        // pois podem ser arquivos maliciosos

        // regra básica: dizemos o que aceitamos e nunca o que não aceitamos
        // e vamos utilizar o MIME_CONTENT_TYPE para isso
        echo "<h3>Arquivos não permitidos</h3> <hr/>";
        echo "<pre>";
        var_dump([
            filetype(__DIR__ . "/index.php"),  // retorna o tipo de arquivo
            mime_content_type(__DIR__ . "/index.php")  // retorna o tipo de conteúdo
        ]);
        echo "</pre>";


        // validando o tipo de arquivo 
        $getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);  // retorna true/false
        echo $getPost ? "Sim <<<<<" : "Não <<<<<";

        echo '<hr/>';

        //    $_FILES  - variável global que verifica se existe o arquivo
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';


        echo '<hr/>';

        //    $_FILES  - variável global que verifica se existe o arquivo
        if ($_FILES && !empty($_FILES['file']['name'])) {
            echo '<pre>';
            var_dump($_FILES);
            echo '</pre>';

            // TRATANDO O ARQUIVO
            $flieUpload = $_FILES['file'];
            // echo '<pre>';
            // var_dump($flieUpload);
            // echo '</pre>';

            // Tipos de arquivos permitidos
            $tiposPermitidos = [
                "image/jpg",
                "image/jpeg",
                "image/png",
                "application/pdf",
            ];


            // criando o nome do arquivo dinaicamente
            // mb_strstr - retorna a parte da string após a primeira ocorrência de uma substring (neste caso o ponto)
            $newFileName = time() . mb_strstr($flieUpload['name'], ".");
            // echo $newFileName;

            // validando o tipo de arquivo (verifica se a extensão do arquivo está no array de tipos permitidos)
            if (in_array($flieUpload['type'], $tiposPermitidos)) { 

                // movendo o arquivo da pasta temporária para a pasta uploads
                if (move_uploaded_file($flieUpload['tmp_name'], __DIR__ . "/uploads/{$newFileName}")) {
                    echo '<div class="alert alert-success" role="alert">Arquivo enviado com sucesso!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Opsss!!!<br> Falha ao enviar o arquivo!</div>';
                }

            }else{
                echo '<div class="alert alert-danger" role="alert">Opsss!!!<br> Tipo de arquivo inválido!</div>';
            }

        } elseif ($getPost) {
            echo '<div class="alert alert-danger" role="alert">Opsss!!!<br> Parece que o arquivo é muito grande!</div>';
        } else {
            if ($_FILES) {
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