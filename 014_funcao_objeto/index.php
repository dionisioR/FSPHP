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
        <h1 class="display-3">Função PHP</h1>
    </header>

    <main class="container">
        <h2 class="display-6">Manipulação - Criando um array</h2>
        <?php
        $arrProfile = [
            'name' => 'RD3W',
            'company' => 'RD3W Cursos',
            'email' => 'rd3w@g.com'
        ];
        echo '<pre>';
        var_dump($arrProfile);
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">Transformando o array em objeto</h2>
        <?php
        $objProfile = (object)$arrProfile;
        echo '<pre>';
        var_dump($objProfile);
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">Manipulando o array e o objeto</h2>
        <?php
        // array
        echo "<p class='text-danger'>{$arrProfile['name']} - {$arrProfile['company']} - {$arrProfile['email']}</p>";
        // objeto
        echo "<p class='text-primary'>{$objProfile->name} - {$objProfile->company} - {$objProfile->email}</p>"
        ?>
        <br>
        <br>
        <h2 class="display-6">unset() - Retira um atributo do objeto</h2>
        <?php
        $ceo = $objProfile;
        echo '<pre>';
        var_dump($ceo);
        echo '</pre>';

        unset($ceo->company);
        echo '<pre>';
        var_dump($ceo);
        echo '</pre>';

        ?>
        <br>
        <br>
        <h2 class="display-6">new StdClass() - objeto genérico</h2>
        <?php
        $company = new StdClass();
        $company->company = 'RD3W Cursos';
        $company->ceo = $ceo;
        $company->manager = new StdClass();
        $company->manager->name = 'José';
        $company->manager->email = 'manager@rd3w.com';

        echo '<pre>';
        var_dump($company);
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">getClass - retorna a qual classe o objeto pertence</h2>
        <?php
        $date = new DateTime();
        echo '<pre>';
        var_dump(get_class($date));
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">get_class_methods - retorna os métodos do objeto</h2>
        <?php
        echo '<pre>';
        var_dump(get_class_methods($date));
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">get_objetct_vars - retorna os atributos do objeto</h2>
        <?php
        echo '<pre>';
        var_dump(get_object_vars($date));
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">get_parent_class - retorna as super classes (herança)</h2>
        <?php
        echo '<pre>';
        var_dump(get_parent_class($date));
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">is_subclass_of - retorna se a classe é subclasse de outra classe</h2>
        <?php
        // retorna se $date é subclasse de "DateTime"
        echo '<pre>';
        var_dump(is_subclass_of($date, 'DateTime'));
        echo '</pre>';
        ?>
        <br>
        <br>
        <h2 class="display-6">Exemplo com PDOException</h2>
        <?php

        $exception = new PDOException();
        echo '<pre>';
        var_dump(
            [
                "class" => get_class($exception),
                "methods" => get_class_methods($exception),
                "vars" => get_object_vars($exception),
                "parent" => get_parent_class($exception),
                "subclass" => is_subclass_of($exception, 'Exception')
            ]
        );
        echo '</pre>';



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