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
        <h1 class="display-3">Manipulação de Arquivos</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Verificando se um arquivo existe</h2>
        <?php
        $arquivo = __DIR__ . "/file.txt";
        echo __DIR__ . '<br />';

        // Verifica se o arquivo existe e se é um arquivo
        if (file_exists($arquivo) && is_file($arquivo)) {
            echo "Arquivo existente.";
        } else {
            echo "Arquivo não encontrado.";
        }
        ?>
        <br>
        <br>
        <h2 class="display-6">Criando o arquivo (leitura e gravação)</h2>
        <?php

        if (!file_exists($arquivo) || !is_file($arquivo)) {
            // Cria o arquivo
            $criarArquivo = fopen($arquivo, 'w');
            // fwrite($arquivo, "Este é um texto de teste.\n");
            // fclose($arquivo);
            echo "Arquivo criado com sucesso.";
        } else {
            echo "Arquivo já existe.";
            echo "<pre>";
            var_dump([
                // Lê os dados do arquivo
                file($arquivo),
                // Retorna informações sobre o arquivo
                // Caminho do arquivo, nome e extensão do arquivo, extensão do arquivo, nome do arquivo
                pathinfo($arquivo),
            ]);
            echo "</pre>";
        }
        ?>
        <br>
        <br>
        <h2 class="display-6">Escrevendo no arquivo</h2>
        <?php
        //se existe vou escrever
        if (file_exists($arquivo) && is_file($arquivo)) {
            // Abre o arquivo para escrita
            $arquivoRecurso  = fopen($arquivo, 'a');
            // Escreve no arquivo
            fwrite($arquivoRecurso, "Este é um texto adicionado." . PHP_EOL);
            fwrite($arquivoRecurso, "Este é outro texto adicionado." . PHP_EOL);
            fwrite($arquivoRecurso, "Este é mais um texto adicionado." . PHP_EOL);
            fwrite($arquivoRecurso, "Este é mais um outro texto adicionado." . PHP_EOL);
            // Fecha o arquivo
            fclose($arquivoRecurso);
            echo "Texto adicionado ao arquivo com sucesso.<br><br>";
        }
        echo file($arquivo)[0] . '<br>';
        echo file($arquivo)[1] . '<br>';
        echo file($arquivo)[2] . '<br>';

        ?>
        <br>
        <br>
        <h2 class="display-6">Percorrendo e lendo o arquivo </h2>
        <?php
        $open = fopen($arquivo, 'r');
        while (!feof($open)) {
            echo "<p>" . fgets($open) . "</p>";
        }
        fclose($open)
        ?>
        <br>
        <br>
        <h2 class="display-6">get, put content</h2>
        <?php
        $getContent = __DIR__ . '/teste2.txt';
        if (file_exists($getContent) && is_file($getContent)) {
            echo file_get_contents($getContent); // lê o arquivo e retorna uma string
        } else {
            $data = "<div><h1>RD3W</h1><p>Canal YOUTUBE</p><p>rd3w@g.com</p></div>";
            file_put_contents($getContent, $data);  // cria o arquivo e insere o texto
            echo file_get_contents($getContent); // lê o arquivo
        }
        ?>
        <br>
        <br>
        <h2 class="display-6">Excluíndo o arquivo</h2>
        <?php
        // Exclui o arquivo
        // unlink($arquivo);
        // unlink($getContent);
        if (file_exists(__DIR__ . '/teste3.txt') && is_file(__DIR__ . '/teste3.txt')) {
            unlink(__DIR__ . '/teste3.txt');
            echo "Arquivo excluído com sucesso.";
        } else {
            echo "Arquivo não encontrado.";
        }
        ?>
        <br>
        <br>
        <h2 class="display-6">**--**</h2>
        <?php

        ?>
        <br>
        <br>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>