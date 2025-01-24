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
        <h1 class="display-3">Closures & Generators</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Closures - Funções Anônimas</h2>
        <?php
        // echo date("d/m/Y");
        // Pegando a idade atual
        $minhaIdade = function ($anoNascimento) {
            $idade = date("Y") - $anoNascimento;
            return $idade;
        };
        echo $minhaIdade(1978);
        ?>
        <br>
        <br>
        <?php
        // formatando um número
        $formataNumero = function ($numero) {
            // return number_format($numero, qtdCasasDecimais, "separadorDecimal", "separadorMilhar");
            return number_format($numero, 2, ",", ".");
        };
        echo $formataNumero(123456789.12345);
        echo '<br>R$' . $formataNumero(5000300.12345);
        ?>
        <br><br>

        <?php
        // Carrinho de compras com array
        $carrinho = [];
        $carrinho["precoTotal"] = 0;
        $adicionarCarrinho = function ($item, $qtd, $preco) use (&$carrinho) {
            $carrinho[$item] = $qtd * $preco;
            $carrinho["precoTotal"] += $carrinho[$item];
        };
        $adicionarCarrinho("HTML5", 2, 500);
        $adicionarCarrinho("JavaScript", 1, 450);
        $adicionarCarrinho("TypeScript", 3, 550);
        echo '<pre>';
        var_dump($carrinho);
        echo '<hr/>';
        var_dump($adicionarCarrinho);
        echo '</pre>';
        ?>
        <br><br>
        <h2 class="display-6">Generators</h2>
        <p><strong>Função normal - Muito consumo de memória</strong></p>
        <?php
        $iterator = 50;
        function showDates($days)
        {
            $saveDate = [];
            for ($day = 1; $day < $days; $day++) {
                $saveDate[] = date("d/m/Y", strtotime("+{$day}days"));
                yield $saveDate[$day - 1];
            }
            return $saveDate;
        }

        echo "<div class='d-flex w-100' style='width:1200px; flex-wrap: wrap;'>";
        foreach (showDates($iterator) as $date) {
            echo "<p class='bg-danger text-white p-1 m-1' style='margin: 5px; padding: 10px; display: inline-block;'>" . htmlspecialchars($date) . "</p>";
        }
        echo "</div>";
        ?>
        <br><br>

        <p><strong>Generator - Pouco consumo de memória</strong></p>

        <!-- yield: -->
        <!-- O yield é usado em PHP para criar um gerador. Um gerador é uma forma de criar iteradores que podem gerar uma sequência de valores, um de cada vez, sem ter que carregar todos eles na memória ao mesmo tempo. -->
        <!-- Quando um gerador encontra um yield, ele retorna o valor para o código que está iterando sobre o gerador e mantém o estado atual para que possa continuar a partir desse ponto na próxima vez que for iterado. -->
        <?php
        $iterator = 10000;
        function generatorDate($days)
        {
            for ($day = 1; $day < $days; $day++) {
                yield date('d/m/Y', strtotime("+{$day}days"));
            }
        }

        echo "<div class='d-flex w-100' style='width:1200px; flex-wrap: wrap;'>";
        foreach (generatorDate($iterator) as $date) {
            echo "<p class='bg-dark text-white p-1 m-1' style='margin: 5px; padding: 10px; display: inline-block;'>" . htmlspecialchars($date) . "</p>";
        }
        echo "</div>";
        ?>


    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>