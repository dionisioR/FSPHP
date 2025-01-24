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
        <h1 class="display-3">Manipulando datas</h1>
    </header>

    <main class="container">
        <h2 class="display-6">A classe DateTime</h2>
        <hr>
        <?php
        define("DATE_BR", "d/m/Y H:i:s");

        // criando datas
        $dateNow = new DateTime();
        $dateBirth = new DateTime("1980-10-01");
        $dateStatic = DateTime::createFromFormat("d/m/Y", "22/10/2025");

        echo "<pre>";
        var_dump([
            $dateNow,
            // get_class_methods($dateNow),
            $dateBirth,
            $dateStatic,
        ]);

        echo "<hr>";

        var_dump([
            $dateNow,
            $dateNow->format(DATE_BR),
            $dateNow->format("d"),
            $dateNow->format("m"),
            $dateNow->format("Y"),
        ]);

        echo "<hr>";
        echo "<p>
            Hoje é dia {$dateNow->format("d")} do mês {$dateNow->format("M")} do ano {$dateNow->format("Y")}
        </p>";
        echo "<hr>";

        // Modificando Timezone
        $newTimeZone = new DateTimeZone("Pacific/Apia");
        $newDateTime = new DateTime("now", $newTimeZone);

        var_dump([
            $newTimeZone,
            $newDateTime,
            $dateNow
        ]);
        echo "</pre>";
        ?>


        <br><br><br>



        <h2 class="display-6">Classe DateInterval</h2>
        <hr>
        <?php
        // trabalha com intervalo entre datas
        // criando um periodo de 10 anos, 2 meses, 5 dias, 10 horas e 30 minutos
        $dateInterval = new DateInterval("P10Y2M5DT10H30M");
        $dateInterval_2 = new DateInterval("P5Y2M5DT10H30M");

        echo "<pre>";
        var_dump([
            $dateInterval,
            $dateInterval->y,
            $dateInterval->m,
            $dateInterval->d,
            $dateInterval->h,
            $dateInterval->i,
        ]);
        echo "<hr>";

        $dateTime = new DateTime('now');
        print_r($dateTime);

        // adicionando um intervalo a uma data
        $dateTime->add($dateInterval);
        print_r($dateTime);
        echo "<hr>";

        // subtraindo um intervalo de uma data
        $dateTime->sub($dateInterval_2);
        print_r($dateTime);


        ?>
        <br><br><br>



        <h2 class="display-6">String to date</h2>
        <hr>
        <?php

        ?>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>