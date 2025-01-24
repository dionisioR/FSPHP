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
        <h1 class="display-3">Operadores de atribuição </h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">= += -= *= /= </h2>
        <?php
           $operatorA = 5;
           $operators = [
            "a += 5" => ($operatorA += 5),
            "a -= 5" => ($operatorA -= 5),
            "a *= 5" => ($operatorA *= 5),
            "a /= 5" => ($operatorA /= 5),
            "a %= 5" => ($operatorA %= 5),
           ];

           echo '<pre>';
           var_dump($operators);
           echo '<pre>';

        ?>
    <h2 class="display-6">++ --</h2>
        <?php
           $incrementarA = 5;
           $incrementarB = 5;
           $increment = [
            "pós-incremento" => $incrementarA++,
            "res-incremento" => $incrementarA,
            "pré-incremento" => ++$incrementarA,
            "pós-decremento" => $incrementarB--,
            "res-decremento" => $incrementarB,
            "pré-decremento" => --$incrementarB
           ];

           echo '<pre>';
           var_dump($increment); 
           echo '</pre>';

        ?>
    <h2 class="display-6">Comparação</h2>
        <?php
           $valueA = 5;
           $valueB = "5";
           $valueC = 10;

           $valores = [
            "a == b" => $valueA == $valueB,
            "a === b" => $valueA === $valueB,
            "a != b" => $valueA != $valueB,
            "a !== b" => $valueA !== $valueB,
            "a > c" => $valueA > $valueC,
            "a < c" => $valueA < $valueC,
            "a >= b" => $valueA >= $valueB,
            "a >= c" => $valueA >= $valueC,
            "a <= c" => $valueA <= $valueC,
           ];

           echo '<pre>';
           var_dump($valores); 
           echo '</pre>';
        ?>
    <h2 class="display-6">Lógicos</h2>
        <?php
           $a = true;
           $b = false;
           $logica = [
            "A" => $a,
            "B" => $b,
            "A && B" => $a && $b,
            "A || B" => $a ||$b,
            "!A" =>  !$a,
            "!B" => !$b
           ];

           echo '<pre>';
           var_dump($logica);
           echo '</pre>';
        ?>
    <h2 class="display-6">Aritméticos</h2>
        <?php
           $a = 10;
           $b = 5;
           $calc = [
            "a + b" => $a + $b,
            "a - b" => $a - $b,
            "a * b" => $a * $b,
            "a / b" => $a / $b,
            "a % b" => $a % $b,
           ];

           echo '<pre>';
           var_dump($calc); 
           echo '<pre>';
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>