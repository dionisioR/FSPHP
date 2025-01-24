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
        <h1 class="display-3">Estrutura de Repetição</h1>
    </header>

    <main class="container">
        <h2 class="display-6">While</h2>
        <?php

        $contador = 0;

        while ($contador <= 10) {
            echo "Contador: {$contador} <br>";
            $contador++;
        }

        ?>
        <br>
        <br>
        <h2 class="display-6">Do While</h2>
        <?php
        $contador = 0;
        do {
            echo "Contador: {$contador} <br>";
            $contador++;
        } while ($contador <= 10);
        ?>
        <br>
        <br>

        <h2 class="display-6">For</h2>
        <?php

        for ($i = 0; $i <= 10; $i++) {
            echo "Contador: {$contador} <br>";
        }
        ?>
        <br><br>

        <h2 class="display-6">Break - Continue</h2>
        <p><strong>Break</strong></p>
        <?php
        for ($i = 0; $i <= 10; $i++) {
            if ($i == 5) {
                break;
            }
            echo "Contador: {$i} <br>";
        }

        ?>
        <br><br>
        <p><strong>Continue</strong></p>
        <?php

        for ($i = 0; $i <= 10; $i++) {
            if ($i % 2 == 0)
                continue;

            echo "Contador: {$i} <br>";
        }
        ?>
        <br><br>

        <h2 class="display-6">Foreach</h2>
        <?php

        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, true, 'string'];

        foreach ($array as $valor) {
            echo "Valor: {$valor} <br>";
        }
        echo '<hr/>';

        foreach ($array as $chave => $valor) {
            echo "Chave: {$chave} - Valor: {$valor} <br>";
        }

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