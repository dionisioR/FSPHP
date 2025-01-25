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
        <h1 class="display-3">Cookies e Sessões</h1>
    </header>

    <main class="container">
        <h2 class="">
            Cookies
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        // Iniciando a sessão
        // session_start();

        echo '<pre>';
        print_r($_COOKIE);
        echo '</pre>';

        // criação de cookies
        // setcookie(nome, valor, expiração, caminho, domínio, segurança, httpOnly);
        // setcookie(
        //     "nome_do_cookie",       // nome
        //     "valor_do_cookie",      // valor
        //     time() + 3600,          // expiração (tempo em segundos)
        //     "/",                    // caminho
        //     "exemplo.com",          // domínio
        //     true,                   // secure (apenas HTTPS)
        //     true                    // httpOnly (protegido contra acesso via JavaScript)
        // );

        // Onde:

        // nome (obrigatório): O nome do cookie.
        // valor (obrigatório): O valor do cookie.
        // expiração (opcional): O tempo de expiração do cookie (em segundos desde o Epoch). O padrão é 0, o que significa que o cookie é um cookie de sessão (expira quando o navegador é fechado).
        // caminho (opcional): O caminho no qual o cookie é válido. O padrão é o diretório do script que está configurando o cookie.
        // domínio (opcional): O domínio para o qual o cookie é válido. O padrão é o domínio atual.
        // segurança (opcional): Se o cookie deve ser enviado apenas por conexões HTTPS. Defina como true para garantir que o cookie só será enviado por HTTPS.
        // httpOnly (opcional): Se o cookie pode ser acessado via JavaScript no lado do cliente. Defina como true para evitar que o cookie seja acessado via JavaScript, o que aumenta a segurança.

        // criar um cookie basico
        // setcookie('nome', 'valor', 'tempo de vida');

        setcookie('rd3w', 'rd3w.com.br', time() + 10);
        setcookie('rd3w_2', 'rd3w.com', time() + 20);

        // reseta o cookie
        // setcookie("rd3w", null, time() - 10);

        echo '<hr>';

        // resgatando os cookies
        $cookie = filter_input_array(INPUT_COOKIE, FILTER_DEFAULT);
        echo '<pre>';
        print_r($cookie);
        echo '</pre>';
        echo '<hr>';


        // resgate de um cookie especifico
        if (isset($cookie['rd3w'])) {
            echo $cookie['rd3w'];
        } else {
            echo 'Cookie não encontrado';
        }

        echo '<hr>';

        // definindo intervalo de tempo para o cookie
        // 1 minuto
        $minuto = time() + 60;
        // 1 hora
        $hora = time() + 60 * 60;
        // 1 dia
        $dia = time() + 60 * 60 * 24;
        // 1 semana
        $semana = time() + 60 * 60 * 24 * 7;
        // 1 mês
        $mes = time() + 60 * 60 * 24 * 30;
        echo "<pre>";
        var_dump([
            '1 minuto' => $minuto,
            '1 hora' => $hora,
            '1 dia' => $dia,
            '1 semana' => $semana,
            '1 mês' => $mes
        ]);
        echo "</pre>";
        echo '<hr>';

        $user = [
            "user" => "admin",
            "password" => "123456",
            "expire" => $minuto
        ];

        // criando um cookie com um array
        setcookie(
            "logRD3W",
            http_build_query($user),
            $minuto,
            "/",
            "localhost",
            true,
            true
        );

        // resgatando o cookie criado
        $log = filter_input(INPUT_COOKIE, "logRD3W", FILTER_DEFAULT);

        $log = urldecode($log);
        if ($log) {
            echo "<pre>";
            var_dump($log);
            echo "</pre>";

            // transformando a string em array
            $log = parse_str($log, $logArray);
            echo "<pre>";
            var_dump($logArray, $logArray['user']);
            echo "</pre>";
        }


        ?>


        <br><br>



        <h2 class="">
            Sessão
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        // A sessão é um array associativo que armazena diversas informações do usuário
        // Ela permanece ativa enquanto o usuário estiver navegando no site. 
        // Quando ele fecha o navegador, a sessão é encerrada.
        // Para iniciar uma sessão, utilizamos a função session_start() que deve ser chamada antes de qualquer saída para o navegador
        // session_start();
        // Para encerrar uma sessão, utilizamos a função session_destroy()

        // definindo onde a sessão será salva
        session_save_path(__DIR__ . '/sessao');

        // criando um nome para a sessão
        session_name('RD3W');

        // iniciando a sessão
        session_start();

        echo '<pre>';
        var_dump(
            $_SESSION,
        [
            "id" => session_id(),
            "name" => session_name(),
            "status" => session_status(),
            "save_path" => session_save_path(),
            "cookie" => session_get_cookie_params()
        ]);
        echo '</pre>';


        $_SESSION['login'] = (object)$user;
        $_SESSION['user'] = $user;

        echo '<h3>$_SESSION</h3>';
        echo '<hr>';
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';

        echo $_SESSION['login']->user;

        // destruindo a sessão 'user'
        unset($_SESSION['user']);

        // var_dump($_SESSION['user']); // vai gerar erro pois a sessão foi destruída

        // destruindo todas as sessões
        // session_destroy();





        ?>
        <br><br>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>