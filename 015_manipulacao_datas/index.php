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
        <h1 class="display-3">Manipulação de Datas</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Função date</h2>
        <?php
        // verificando o timezone do servidor
        echo "<pre>";
        var_dump(
            [
                date_default_timezone_get(),
                date(DATE_W3C),
                date('Y-m-d H:i:s'),
            ]
        );

        define("DATE_BR", "d/m/Y H:i:s");
        // define(("DATE_TIMEZONE"), "Pacific/Apia");
        define(("DATE_TIMEZONE"), "America/Sao_Paulo");

        date_default_timezone_set(DATE_TIMEZONE);

        var_dump([
            date_default_timezone_get(),
            date(DATE_BR),
        ]);


        // funcao com varias informacoes de data
        var_dump(getdate());
        echo "</pre>";
        echo "<h4>Hoje é dia ", getdate()["mday"] , ".</h4>";
        ?>


        <br><br><br>



        <h2 class="display-6">String to date</h2>
        <?php
            echo '<pre>';
            var_dump([
                "strtotime" => strtotime("now"),
                "time" => time(),
                "strtotime+10dias" => strtotime("+10 days"),
                "date DATE_BR" => date(DATE_BR),
                "date +10 days" => date(DATE_BR, strtotime("+10 days")),
                "date -10 days" => date(DATE_BR, strtotime("-10 days")),
                "date +1 year" => date(DATE_BR, strtotime("+1 year")),
                "date +1 years" => date(DATE_BR, strtotime("+1 years")),
            ]);
            echo '</pre>';

            // uma maneira de ter acesso rápido a data atual
            $format = "%d/%m/%Y %Hh%M";
            echo "<p>Hoje é dia ", strftime($format), ".</p>";
            echo strftime("%d de %B de %Y");
        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>