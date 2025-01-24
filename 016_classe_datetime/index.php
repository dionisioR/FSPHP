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
        <h1 class="display-3">Classe DateTime</h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">Datetime</h2>
        <?php
            date_default_timezone_set('America/Sao_Paulo');

           define("DATE_BR","d/m/Y H:i:s");
           $dateNow = new DateTime();
           $dateBirth = new DateTime('2024-08-19');

           // Criando data a partir de um formato
           $dateStatic_01 =DateTime::createFromFormat(DATE_BR,"19/08/2024 14:35:00");

           $dateStatic_02 =DateTime::createFromFormat("d/m/Y","19/08/2024");

           echo "<pre>";
           var_dump([
            "dateNow" => $dateNow,
            // get_class_methods($dateNow),
            "dateBirth" => $dateBirth,
            "dateStatic-01" => $dateStatic_01,
            "dateStatic_02" => $dateStatic_02,

           ]);
           echo "</pre>";
           echo '<hr/>';

           echo "<pre>";
           var_dump([
            $dateNow,
            $dateNow->format('d'),
            $dateNow->format('m'),
            $dateNow->format('y'),
            $dateNow->format('Y'),
            $dateNow->format('H'),
            $dateNow->format('m'),
            $dateNow->format('i'),

           ]);
           echo "</pre>";
           echo "<p>Hoje é dia {$dateNow->format('d')} do mês {$dateNow->format('m')} de {$dateNow->format('Y')}.</p>"
        ?>
        <br>
        <br>
    <h2 class="display-6">DateTimeZone</h2>
        <?php
           $newTimeZone = new DateTimeZone("Pacific/Apia");
           $newDateTime = new DateTime('now',$newTimeZone);
           echo "<pre>";
           var_dump([
            $newTimeZone,
            $newDateTime,
           ]);
           echo "</pre>";
        ?>
        <br>
        <br>
    <h2 class="display-6">DateInterval</h2>
        <?php
           $dateInteval = new DateInterval("P10Y2M3D");
           $dateInteval_1 = new DateInterval("P10Y2M3DT10M");
           echo "<pre>";
           var_dump([
            $dateInteval,
            $dateInteval_1,
           ]);
           echo "</pre>";

        ?>
        <br>
        <br>
    <h2 class="display-6">Adicionando e Subtraindo Tempo</h2>
        <?php
            $dateTime = new Datetime("now");
            
            echo "<pre>";
            var_dump([
                $dateTime,
            ]);
            echo "</pre>";
            echo "<hr/>";
            $dateTime = new Datetime("now");
            
            echo "<pre>";
            var_dump([
                $dateTime->add(new DateInterval("P1D")),
            ]);
            echo "</pre>";
            echo "<hr/>";
            
            $dateTime = new Datetime("now");
            
            echo "<pre>";
            var_dump([
                $dateTime->sub($dateInteval_1),
            ]);
            echo "</pre>";
           
        ?>
        <br>
        <br>
    <h2 class="display-6">Diferença entre duas datas</h2>
        <?php

            $hoje = new Datetime('now');
            $dataMaior = new Datetime('2025-12-31'); 
            $dataMenor = new Datetime('2020-12-31'); 

            $diff_hoje_maior = $hoje->diff($dataMaior);
            $diff_hoje_menor = $hoje->diff($dataMenor);

            echo '<pre>';
            var_dump([
                $diff_hoje_maior,
                $diff_hoje_menor,
                $diff_hoje_maior->format('%d Dias, %m Meses e %Y anos'),
                $diff_hoje_menor->format('%d Dias, %m Meses e %Y anos'),
            ]);
            echo '</pre>';
           
        ?>
        <br>
        <br>
    <h2 class="display-6">createFromDateString</h2>
        <?php
           $dataHoje = new DateTime('now');
           echo "<pre>";
           var_dump([
            $dataHoje,
            $dataHoje->format(DATE_BR),
            $dataHoje->sub(DateInterval::createFromDateString('10days'))->format(DATE_BR),
            $dataHoje->add(DateInterval::createFromDateString('1year'))->format(DATE_BR),
           ]);
        ?>
        <br>
        <br>
    <h2 class="display-6">DataPeriod</h2>
        <?php
           $inicio = new DateTime('now');
           $periodo = new DateInterval('P1M'); // 1 mês
           $fim =new DateTime('2025-12-31');

           var_dump([
            $inicio->format(DATE_BR),
            $periodo,
            $fim->format(DATE_BR),
           ]);


           // PERÍODO
           $mensalidades = new DatePeriod($inicio, $periodo, $fim);
           echo "<h3>Sua assinatura...</h3>";
           foreach ($mensalidades as $dataVencimento) {
            echo $dataVencimento->format(DATE_BR). "<br>";
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