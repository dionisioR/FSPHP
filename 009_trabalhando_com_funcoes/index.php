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
        <h1 class="display-3">Trabalhando com Funções</h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">Função Declarada</h2>
        <?php
           require __DIR__."/funcoes.php";
              $result = functionName("Jesus", "Maria", "José");
              echo '<pre>';
              var_dump($result);
              echo '</pre>';
        ?>
        <hr>

        <?php
            $result = argumentosOpcionais("Anna", "Maria");
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
            echo '<hr/>';

            $result = argumentosOpcionais("Anna", "Maria", false);
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
            echo '<hr/>';

            $result = argumentosOpcionais("Anna", "Maria", false, 22);
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
            echo '<hr/>';

        ?>
        <br><br>

    <h2 class="display-6">Acesso Global</h2>
        <?php
           $peso = 86;
           $altura = 1.80;
           echo IMC();
        ?>
        <br><br>
    <h2 class="display-6">Argumento estático</h2>
        <?php
            // Como o argumento é estático os valores são somandos automaticamente
            // toda vez que a função for chamada.
           $valor = totalPagar(100);  
           echo $valor;  // 100
           $valor = totalPagar(150);
           echo $valor;  // 250
           $valor = totalPagar(55);
           echo $valor;  // 305
        ?>
        <br><br>
    <h2 class="display-6">Argumentos Dinâmicos</h2>
        <?php
           // utilizado quando não sabemos a quantidade de argumentos ou quais argumentos serão passados

           echo '<pre>';
           var_dump(argumentosDinamicos());
           echo '</pre>';
           echo '<hr>';

           echo '<pre>';
           var_dump(argumentosDinamicos('Anna'));
           echo '</pre>';
           echo '<hr>';

           echo '<pre>';
           var_dump(argumentosDinamicos('Anna', 'Maria'));
           echo '</pre>';
           echo '<hr>';

           echo '<pre>';
           var_dump(argumentosDinamicos('Anna', 'Maria', 'João'));
           echo '</pre>';
           echo '<hr>';
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>