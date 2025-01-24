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
        <h1 class="display-3">Comandos de saída</h1>
    </header>

    <main class="container">
        <h2 class="display-6">ECHO</h2>
        <?php
        // Concatenando com [,]
        echo "<p>Texto feito ", "com o comando ", "<span class='badge bg-secondary'> echo</span>.</p>";
        // Concatenando com [.]
        echo "<p>Texto feito " . "com o comando " . "<span class='badge bg-secondary'> echo</span>.</p>";

        $variavel = "comando echo";
        echo "<p>Contedúdo da variável <span class='badge bg-secondary'> $variavel </span>... com aspas duplas!!!";
        echo '<p>Contedúdo da variável <span class="badge bg-secondary"> $variavel </span>... com aspas simples!!!';

        // Melhor cenário protegendo a variável
        $dia = 'dia';
        echo "<p>Falta um {$dia} para o evento!</p>";
        echo "<p>Faltam dois {$dia} para o evento!</p>";
        ?>
        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">SHORT CODE</h2>
        <!-- Variável com SHORT CODE -->
        <p>Faltam três <?= $dia; ?>(s) para o evento!</p>
        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">Print</h2>
        <?php
        print "<p>Olá</p>";
        $nome = "RD3W";
        print $nome;
        print "<p>curso $nome !</p>";
        print "<p>Vídeos {$nome}!</p>";
        ?>
        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">Print_r</h2>
        <p>Função para imprimir Array</p>
        <?php
        $array = [
            "nome" => "Rafael",
            "idade" => "33",
            "sobrenome" => "Silva"
        ];
        print_r($array);
        echo "<pre>" . print_r($array, true) . "</pre>";
        ?>
        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">Printf</h2>
        <p>Trabalha com variável formatada</p>
        <?php
        $artigo = "<div><h1>%s</h1><p>%s</p></div>";
        $titulo = "Variáveis com PHP";
        $paragrafo = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. A ad optio laborum, aliquam culpa quidem neque ducimus id repellendus impedit dignissimos consequatur harum atque, incidunt cum aliquid eos, quia quaerat.";
        printf($artigo, $titulo, $paragrafo);
        ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">SPrintf</h2>
        <p>Faz a mesma coisa que o 'printf', mas neste caso a diferenã é que a função 'sprintf' retorna os dados, deste modo devemos utilizar outra função (echo por exemplo) para exibir as informaçoes. <br> Também podemos utilizar a função 'sprintf' para armazenar os dados em uma variável.</p>
        <br>
        <?php
        echo sprintf($artigo, $titulo, $paragrafo);
        $sprintTexto =  sprintf($artigo, $titulo, $paragrafo);
        echo $sprintTexto;
        ?>
        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">Vprintf / VSprintf</h2>
        <p>Faz a mesma coisa que o printf e sprintf, mas neste caso ele recebe os dados de um array.</p>
        <?php
        $dados = ["titulo" => "RD3W", "paragrafo" => $paragrafo];
        $template = "<div><h1>%s</h1><p>%s</p></div>";
        echo vprintf($template, $dados);
        $svprintTexto = vprintf($template, $dados);
        echo $svprintTexto;
        ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h2 class="display-6">Var_Dump</h2>
        <?php
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
        ?>


    </main>
    <footer class="text-center container">
        <hr>
        <p class="mt-5">RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>