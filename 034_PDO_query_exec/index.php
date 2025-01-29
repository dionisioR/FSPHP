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
        <h1 class="display-3">Cosulta com query e exec</h1>
    </header>

    <main class="container">
        <h2 class="">
            Insert
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        ############################################################
        #### EXEC - Retorna 0 ou 1 - Não retorna dados (INSERT, UPDATE, DELETE) ####
        ############################################################

        $insert = "
        INSERT INTO users (first_name, last_name, email, document) VALUES ('Juca', 'Pedrito', 'juca@example.com', '98798798798')
        ";

        try {
            // $exec = Connect::getInstance()->exec($insert);
            $exec = null;

            $query = Connect::getInstance()->query($insert);

            echo "<pre>";
            var_dump(Connect::getInstance()->lastInsertId());
            print_r($exec);
            print_r($query);
            print_r( $query->rowCount());
            print_r( $query->errorInfo());
            echo "</pre>";

        } catch (PDOException $e) {
            var_dump($e);
        }

        ?>
        <br><br>




        <h2 class="">
            Select
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        ############################################################
        ############################################################

        try {
            $query = Connect::getInstance()->query("SELECT * FROM users Limit 3");

            echo "<pre>";
            print_r($query); 
            echo '<br><br>';
            print_r($query->rowCount());
            echo '<br><br>';

            print_r($query->fetchAll());
            echo "</pre>";
        } catch (PDOException $e) {
            var_dump($e);
        }

        ?>
        <br><br>





        <h2 class="">
            Update
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        ############################################################
        ############################################################


        try {

            $exec = Connect::getInstance()->exec("UPDATE users SET first_name = 'JUJUBA', last_name='COLORIDA' WHERE id = 55");

            echo "<pre>";
            print_r($exec);
            echo "</pre>";
        } catch (PDOException $e) {
            var_dump($e);
        }
        ?>
        <br><br>



        <h2 class="">
            Delete
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        ############################################################
        ############################################################


        try {
            $exec = Connect::getInstance()->exec("DELETE FROM users WHERE id > 50");

            echo "<pre>";
            print_r($exec);
            echo "</pre>";
        } catch (PDOException $e) {
            var_dump($e);
        }
        ?>
        <br><br>



    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>