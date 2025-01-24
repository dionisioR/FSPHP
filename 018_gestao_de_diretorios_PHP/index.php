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
    <header class="text-center p-5">
        <h1 class="display-3">Gestão de diretório</h1>
    </header>

    <main class="container">
        <h2 class="">
            Verificar, criar e abrir
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        $dirUploads = __DIR__ . '/uploads';
        if(!file_exists($dirUploads) || !is_dir($dirUploads)){
            // cria o diretório
            mkdir($dirUploads, 0755);
        }else{

            echo '<pre>';
            var_dump(
                // abre o diretório
                scandir($dirUploads)
            );
            echo '</pre>';
        }
       
       


        ?>


        <br><br>



        <h2 class="">
            Copiar e renomear
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        
        <?php

        $file = __DIR__ . "/file.txt";
        echo '<pre>';
        var_dump(
            pathinfo($file),
            scandir($dirUploads),
            scandir(__DIR__)
        );
        echo '</pre>';


        if(!file_exists($file) || !is_file($file)){
            // cria o arquivo
            fopen($file, 'w');
        }else{
            // copia o arquivo
            copy($file, $dirUploads . '/' . basename($file));

            // renomeia o arquivo
            rename( __DIR__ . "/uploads/file.txt", __DIR__ . "/uploads/" . time() . '.' . pathinfo($file)['extension']);
        }

        ?>
        <br><br>




        <h2 class="">
           Remover e deletar
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        
        <?php

        $dirRemove = __DIR__ . '/remove';
        if(!file_exists($dirRemove) || !is_dir($dirRemove)){
            // cria o diretório
            mkdir($dirRemove, 0755);
        }

        
        // Remover diretório
        // para remover um diretório, ele precisa estar vazio

        // Caminho do diretório
        $dirRemove = __DIR__ . '/remove';
        // lendo os arquivos do diretório
        $dirFiles = array_diff(scandir($dirRemove), ['.', '..']);
        // conta quantos arquivos tem no diretório
        $dirFilesCount = count($dirFiles);

        echo '<pre>';
        var_dump(
            $dirRemove,
            $dirFiles,
            $dirFilesCount
        );
        echo '</pre>';



        // removendo os arquivos do diretório   
        if($dirFilesCount > 0){
            echo '<h5>Removendo arquivos do diretório</h5>';
            foreach(scandir($dirRemove) as $fileItem){
                // $fileItem é o nome do arquivo
                // echo $fileItem . '<br>';

                //pegando o caminho completo do arquivo
                $fileRemove = $dirRemove . '/' . $fileItem;
               // echo $fileRemove . '<br>';

               if(file_exists($fileRemove) && is_file($fileRemove)){
                  
                // echo $fileRemove . '<br>';
                // var_dump(file($fileRemove));

                // remove o arquivo
                unlink($fileRemove);
               }
                
            }
        }else{
            echo '<h5>Removendo diretório</h5>';
            // remove o diretório
            rmdir($dirRemove);
        }


        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>