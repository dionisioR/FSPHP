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
        <h1 class="display-3">Manipulação de datas</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Função date</h2>
        <?php
        echo '<pre>';
        var_dump([
            date_default_timezone_get(), // exibe o time zone do servidor 
            date(DATE_W3C),  // Data Completa - string(25) "2024-08-14T19:30:26-03:00"
            date('d'),
            date('d/m'),
            date('d/m/Y'),
            date('d/m/Y H:i:s')
        ]);
        echo '</pre>';

        define("DATE_BR", "d-m-Y H:i:s");
        echo '<pre>';
        var_dump(
            date(DATE_BR)
        );
        echo '</pre>';

        ?>
        <br>
        <br>
        <h2 class="display-6">getdate()</h2>
        <?php
        echo '<pre>';
        var_dump(getdate());
        echo '</pre>';
        echo "<p>getdate()['mday'] - " . getdate()['mday'] . "</p>";
        echo "<p>getdate()['hours'] - " . getdate()['hours'] . "</p>";
        echo "<p>getdate()['month'] - " . getdate()['month'] . "</p>";
        ?>
        <br>
        <br>
        <h2 class="display-6">strtotime</h2>
        <?php
        echo '<pre>';
        var_dump([
            "strtotime NOW" => strtotime('now'),
            "time" => time(),
            "date DATE_BR" => date(DATE_BR),
            "date + 10d" => date(DATE_BR, strtotime("+10days")),
            "date - 10d" => date(DATE_BR, strtotime('-10days')),
            'date + 1years' => date(DATE_BR, strtotime("+1years"))
        ]);
        echo '</pre>';

        ?>
        <br>
        <br>
        <h2 class="display-6">strftime</h2>
        <?php
        $format = "%d/%m/%Y %H horas %M minutos";
        echo '<p>' , strftime($format) , '</p>';
        echo '<p>' , strftime($format, strtotime('+1years')) , '</p>';
        echo strftime('<p> Hoje é dia %d de %m de %Y às %H horas e %M minutos.</p>');

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