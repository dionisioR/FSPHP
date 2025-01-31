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
        <h1 class="display-3">Configurações do PHP</h1>
    </header>

    <main class="container">
        <h2 class="">
            RFI and SoS
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        /*
        [allow_urk_fopen | allow_url_include] Com eles sua aplicação fica vulnerável a
        ataques de inclusão remotas de arquivos RFI (Remote File Inclusion) e 
        negação de serviços SoS (Service of Services).

        RFI: File Remote Inclusion
        DoS: Denial of Service
        */

        echo "<pre>";
        var_dump([
            "allow_url_fopen" => ini_get("allow_url_fopen"),
            "allow_url_include" => ini_get("allow_url_include")
        ]);
        echo "</pre>";


        // configurações:
        // allow_url_fopen=Off
        // allow_url_include=Off
        // memory_limit=128M
        // max_execution_time=5
        // max_input_time=60
        // post_max_size=25M
        // max_input_nesting_level = 64
        // file_uploads=On
        // upload_max_filesize=8M
        // max_file_uploads=3
        // output_buffering=4096
        // implicit_flush=Off
        // ;realpath_cache_size = 4096k (já é o padrão)
        // ;realpath_cache_ttl = 120 (já é o padrão)


        /*
        [DoS - Denial of Service] Configurações que melhoram performance e ajudam a evitar
        ataques de negação de serviço.

        [memory_limit] 64m (pequenas), 128m (a maioria) e 512m ou + (grandes) de 
        memória alocada para o PHP. Uma regra básica de 1/4 (da memória do servidor)
        pode ser aplicada.

        [max_execution_time] O padrão é 30s, mas vamos buscar o mínimo possível ou o máximo 
        aceitável (5s) para seu usuário esperar

        [max_input+time] é o tempo que o PHP interpreta dados vindos via GET ou POST.
        O padrão é 60 segundos, e esse é um bom número devido ao tratamento da aplicação.
        */


        ?>
        <br><br>
        <h2 class="">
            memory and time
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        echo "<pre>";
        var_dump([
            "mempry_get_peak_usage" => $mem = memory_get_peak_usage(),
            "mempry_get_peak_usage | MB" => number_format($mem / (1024 * 1024), 2) . "MB",
        ], [
            "memory_limit" => ini_get("memory_limit"),
            "max_execution_time" => ini_get("max_execution_time"),
            "max_input_time" => ini_get("max_input_time")
        ]);
        echo "</pre>";

        /*
        [post_max_size] Limite máximo permitido em ddos vindos de um formulário.
        [max_input_nesting_level] Profundidade máxima permitida em um vetor. (GET, POST)
        [file_uploads] Permite ou não o envio de arquivos via formulário.
        [upload_max_filesize] Tamanho máximo permitido para um arquivo enviado no formulário.
        [max_file_uploads] Quantidade máxima de arquivos permitidos em ma requisição
        */
        ?>
        <br><br>


        <h2 class="">
            post and files
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        echo "<pre>";
        var_dump([
            "post_max_size" => ini_get("post_max_size"),
            "max_input_nesting_level" => ini_get("max_input_nesting_level"),
            "file_uploads" => ini_get("file_uploads"),
            "upload_max_filesize" => ini_get("upload_max_filesize"),
            "max_file_uploads" => ini_get("max_file_uploads"),
        ]);
        echo "</pre>";



        /*
        [output_buffering] limita a quantidade de requisições melhorando a performance da 
        aplicação ao empurrar todos os comandos de saída para o final da requisição.

        [implicit_flush] Em off para empurrar o buffering para o final da saída. Em on
        para descarregar a cada echo, print, etc.
        */


        ?>
        <br><br>

        <h2 class="">
            buffering
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        echo "<pre>";
        var_dump([
            "output_buffering" => ini_get("output_buffering"),
            "implicit_flush" => ini_get("implicit_flush"),
        ]);
        echo "</pre>";

        /*
        [realpath_cache_size] O PHP consegue manter um cache de arquivos usados em sua
        aplicação para evitar reprocessamento e com isso melhora a performance.

        [realpath_cache_ttl] Tempo de vida do cache de arquivos em segundos.
        */
        ?>
        <br><br>


        <h2 class="">
            realpath
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        echo "<pre>";
        var_dump(
            [
                "realpath_cache_size()" => realpath_cache_size(),
            ],
            [
                "realpath_cache_size" => ini_get("realpath_cache_size"),
                "realpath_cache_ttl()" => ini_get("realpath_cache_ttl"),
            ]
        );
        echo "</pre>";

        /*
        [OPcache] Um cache bytecode de scripts PHP pré-compilados em memória compartilhada
        que elimina a necessidade do PHP carregar e analisar scripts em cada requisição.
        */
        ?>
        <br><br>


        <h2 class="">
            opcache
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        /*
        [opcache] Um cache bytecode de scripts PHP pré-compilados em memória compartilhada.
        Observação: verificar se o opcache está habilitado no php.ini
        Isso pode aumentar a performance da aplicação em até 50%.
        Atenção para a configuração.
        Rever estes conceitos em produção (com cuidado para não prejudicar a aplicação).
        */
        echo "<pre>";
        // var_dump(
        //     opcache_get_configuration(),
        //     opcache_get_status()["scripts"]
        // );
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