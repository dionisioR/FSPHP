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

    use Source\Database\Connect;
    ?>
    <header class="text-center p-5">
        <h1 class="display-3">Statement e bind</h1>
    </header>

    <main class="container">
        <h2 class="">
            prepared Statement
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php

        // exemplo de sql injection

        //$stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = 50 or 1 = 1");

        $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = 50");
        $stmt->execute();

        echo "<pre>";
        print_r($stmt);
        print_r($stmt->rowCount());
        echo "<br>";
        print_r($stmt->columnCount());
        echo "<br>";
        print_r($stmt->fetchAll());
        echo "</pre>";

        ?>
        <br><br>
        <!-- --------------------------------------------------------- -->




        <h2 class="">
            stmt bind value
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // substituição de posições de sua instrução sql por  valores tratados pelo PDO

        // exemplo com select
        $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(":id", 50, PDO::PARAM_INT);
        $stmt->execute();

        echo "<pre>";
        print_r($stmt->fetch());
        echo "</pre>";
        echo '<hr>';

        //--------------------------------------------------------------------------------



        // exemplo com insert
        $stmt = Connect::getInstance()->prepare("INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)");
        $stmt->bindValue(1, "RD3W", PDO::PARAM_STR);
        $stmt->bindValue(2, "Cursos", PDO::PARAM_STR);
        $stmt->bindValue(3, "rd3w@email.com", PDO::PARAM_STR);
        $stmt->execute();

        echo "<pre>";
        print_r($stmt->rowCount());
        echo "<br>";
        print_r(Connect::getInstance()->lastInsertId());
        echo "</pre>";
        echo '<hr>';


        //--------------------------------------------------------------------------------

        // exemplo com insert
        $stmt = Connect::getInstance()->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $stmt->bindValue(":first_name", "RD3W***", PDO::PARAM_STR);
        $stmt->bindValue(":last_name", "Cursos", PDO::PARAM_STR);
        $stmt->bindValue(":email", "rd3w@email.com", PDO::PARAM_STR);
        $stmt->execute();

        echo "<pre>";
        print_r($stmt->rowCount());
        echo "<br>";
        print_r(Connect::getInstance()->lastInsertId());
        echo "</pre>";



        ?>
        <br><br>
        <!-- --------------------------------------------------------- -->





        <h2 class="">
            stmt bind param
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        // O BIND PARAM funciona praticamente da mesma forma que o bind value
        // O BIND PARAM é mais seguro que o bind value, pois ele faz a referência do valor e não a cópia, ou seja, no BIND PARAM você passa a variável diretamente e não o valor dela


        // exemplo com insert

        $nome = "Rd3w <<<";
        $sobrenome = "Cursos";
        $email = "rd3w.cursos@email.com";

        $stmt = Connect::getInstance()->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $stmt->bindParam(":first_name", $nome, PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $sobrenome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        echo "<pre>";
        print_r($stmt->rowCount());
        echo "<br>";
        print_r(Connect::getInstance()->lastInsertId());
        echo "</pre>";


        ?>
        <br><br>
        <!-- --------------------------------------------------------- -->



        <h2 class="">
            stmt execute array
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php

        // exemplo com insert
        $stmt = Connect::getInstance()->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");

        $user = [
            ":first_name" => ">>> RD3W <<<",
            ":last_name" => "Cursos",
            ":email" => "rd3w@email.com"
        ];

        $stmt->execute($user);

        echo "<pre>";
        print_r($stmt->rowCount());
        echo "<br>";
        print_r(Connect::getInstance()->lastInsertId());
        echo "</pre>";



        ?>
        <br><br>
        <!-- --------------------------------------------------------- -->



        <h2 class="">
            bind colums
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id >= :id");
        $stmt->bindValue(":id", 50, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->bindColumn("first_name", $first_name);
        $stmt->bindColumn("last_name", $last_name);
        $stmt->bindColumn("email", $email);

        while ($value = $stmt->fetch()) {
            echo "<pre>";
            print_r($value);
            echo "</pre>";

            echo "<p>{$first_name} {$last_name} - {$email}</p>";
        }


        ?>
        <br><br>
        <!-- --------------------------------------------------------- -->

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>