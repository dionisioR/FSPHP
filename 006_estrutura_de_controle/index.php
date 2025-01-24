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
        <h1 class="display-3">Estrutura de controle</h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">if, elseif, else</h2>
    <hr>
        <?php
           $test = true;
            if ($test) {
                echo "Condição verdadeira. {$test}";
            } else {
                echo "Condição falsa. {$test}";
            }
            echo '<br>';

        ?>
       
        <?php
            $numero = 10;
            if ($numero > 0) {
                echo "Número é positivo. {$numero}";
            } elseif ($numero < 0) {
                echo "Número é negativo. {$numero}";
            } else {
                echo "Número é zero / nulo. {$numero}";
            }
            echo '<br><br>';

        ?>

    <h2 class="display-6">isset, empty, !</h2>
    <hr>
        <?php
           // isset() é utilizada para verificar se uma variável existe e possui um valor atribuído que não seja null. 
           // É uma função útil para evitar erros ao tentar acessar variáveis que podem não ter sido inicializadas ou que foram definidas como null.

            $nome = "Jane";
            if (isset($nome)) {
                echo "Variável nome existe. {$nome}";
            } else {
                echo "Variável nome não existe.";
            }
            echo '<br>';

            // empty() -  é usada para verificar se uma variável está vazia ou se seu valor equivale a `false`. 
            // Ela retorna `true` se a variável estiver vazia, `false`, `null`, `0` (como inteiro),
            // `"0"` (como string vazia), `false`, arrays vazios e strings vazias são considerados vazios.
            $idade = 10;
            if (empty($idade)) {
                echo "Variável idade está vazia.";
            } else {
                echo "Variável idade não está vazia. {$idade}";
            }
            echo '<br>';

            //! - Negação
            $negacao = true;
            if (!$negacao) {
                echo "Condição negada. {$negacao}";
            } else {
                echo "Condição não negada. {$negacao}";
            }
            echo '<br><br>';


        ?>
    <h2 class="display-6">switch</h2>
    <hr>
        <?php
        $diaSemana = "segunda";
        switch ($diaSemana) {
            case "segunda":
                echo "Hoje é segunda-feira.";
                break;
            case "terça":
                echo "Hoje é terça-feira.";
                break;
            case "quarta":
                echo "Hoje é quarta-feira.";
                break;
            case "quinta":
                echo "Hoje é quinta-feira.";
                break;
            case "sexta":
                echo "Hoje é sexta-feira.";
                break;
            case "sábado":
                echo "Hoje é sábado.";
                break;
            case "domingo":
                echo "Hoje é domingo.";
                break;
            default:
                echo "Dia da semana não reconhecido.";
        }
        echo '<br><br>';
           
        ?>
  
    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>