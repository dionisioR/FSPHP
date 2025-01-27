<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RD3W - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        h2 {
            background-color: #222;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 10px;
            font-weight: 400;
            font-family: monospace;
        }

        h2 span {
            font-weight: 300;
            color: #ccc;
        }
    </style>
</head>

<body>

    <?php
    require __DIR__ . "/source/autoload.php";
    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Relacionamento entre Objetos</h1>
    </header>

    <!--################################################# -->
    <!--
    Associação - É a associação mais comum entre os objetos onde o objeto tera um 
    atributo que seja um objeto da outra classe.
      -->
    <!--################################################# -->
    <main class="container">
        <h2 class="">
            Associação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        $company = new Source\Related\Company();
        $company->bootCompany("RD3W", "Rua dos Desenvolvedores");


        echo '<pre>';
        var_dump($company);
        echo '</pre>';
        echo '<hr>';

        $address = new Source\Related\Address("Rua dos Desenvolvedores", 123, "Sala 101");
        $company->boot(
            "RD3W Company",
            $address
        );
        echo '<pre>';
        var_dump($company);
        echo '</pre>';
        echo '<hr>';

        echo "<p class='alert alert-dark'>
            A {$company->getCompany()} está localizada na {$company->getAddress()->getStreet()},
            número {$company->getAddress()->getNumber()} {$company->getAddress()->getComplement()}.
        </p>";


        ?>
        <br><br>
        <!--################################################# -->
        <!--
        Agregação - Em agregação tornamos um objeto externo parte do objeto base,
        contudo não o referenciamos em uma propriedade caomo na associação.    
        -->
        <!--################################################# -->

        <h2 class="">
            Agregação
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $php = new Source\Related\Product("PHP 8", 1000);
        $java = new Source\Related\Product("Java", 950);

        echo '<pre>';
        var_dump($php);
        var_dump($java);
        echo '</pre>';
        echo '<hr>';

        // Agregação
        $company->addProduct($php);
        $company->addProduct($java);
        $company->addProduct(new Source\Related\Product("Python", 800));
        echo '<pre>';
        var_dump($company);
        echo '</pre>';

        echo "<p class='alert alert-dark'>
            A {$company->getCompany()} tem os seguintes produtos: </p>
            <ul>
                <li>{$company->getProducts()[0]->getName()} por {$company->getProducts()[0]->getPrice()}</li>
                <li>{$company->getProducts()[1]->getName()} por {$company->getProducts()[1]->getPrice()}</li>
            </ul>
            ";

        echo '<hr>';
        // utilizando foreach
        foreach ($company->getProducts() as $product) {
            echo "<p class='alert alert-dark'>
                {$product->getName()} por {$product->getPrice()}
                </p>";
        }
        ?>
        <br><br>
        <!--################################################# -->
        <!--
        Composição - Em composição temos um objeot base qie é o responsável por instanciar 
        o objeto externo, ou seja, o objeto externo não existe sem o objeto base.
        -->
        <!--################################################# -->

        <h2 class="">
            Composição
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        $company->addTeamMember("Developer", "Marcos", "Ribeiro");
        $company->addTeamMember("CEO", "João", "Silva");
        $company->addTeamMember("Producer", "Pedro", "Pereira");
        $company->addTeamMember("Desiger", "Maria", "Santos");
        $company->addTeamMember("Manager", "Luiz", "Alves");
        $company->addTeamMember("Developer", "Rafael", "Gonçalves");

        echo '<pre>';
        var_dump($company);
        echo '</pre>';

        // utilizando foreach
        foreach ($company->getTeam() as $teamMember) {
            echo "<p class='alert alert-dark'>
                {$teamMember->getJob()} : {$teamMember->getFirstName()} {$teamMember->getLastName()}
                </p>";
        }
        ?>
        <br><br>
        <!--################################################# -->
        <!--################################################# -->


    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>