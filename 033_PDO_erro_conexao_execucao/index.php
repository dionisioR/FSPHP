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
        <h1 class="display-3">Erro, conexão e execução
        </h1>
    </header>

    <main class="container">
        <h2 class="">
            Controle de erros
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>
        <?php
        ############################################################
        ############################################################

        // try{
        //     throw new Exception("Erro de teste", 1);
        // }catch(Exception $e){
        //     echo "<p class='alert alert-danger'>Erro: {$e->getCode()} - Mensagem: {$e->getMessage()}</p>";
        // }

        try {
            throw new PDOException("Erro de teste", 1);
            throw new Exception("Erro de teste", 1);
        } catch (PDOException | ErrorException $e) {
            echo "<p class='alert alert-danger'>Erro: {$e->getCode()} - Mensagem: {$e->getMessage()}. <br> {$e}</p>";
        }catch (Exception $e) {
            echo "<p class='alert alert-danger'>Erro: {$e->getCode()} - Mensagem: {$e->getMessage()}. <br> {$e}</p>";
        }finally{
            echo "<p class='alert alert-warning'>Finalizando o bloco try</p>";
        }


        ?>
        <br><br>




        <h2 class="">
            Php Data Object
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        ############################################################
        ############################################################

        try {
            // $pdo = new PDO(dsn, user, pwd, options);
            $pdo = new PDO(
                "mysql:host=localhost;dbname=fsphp", 
                "root", 
                "",
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                ]
            );
        } catch (PDOException $e) {
            var_dump($e);
        }

        // var_dump($pdo);

        // O PDO traz ao mesmo tempo um array associativo e um array indexado
        $stmt = $pdo->query("SELECT * FROM users LIMIT 3");
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
            print_r($user);
            echo "<br><br>";
        }

        ?>
        <br><br>





        <h2 class="">
            Conexão com singleton
            <span>
                | Linha <?= __LINE__ ?>
            </span>
        </h2>

        <?php
        ############################################################
        ############################################################

        require __DIR__ . "/source/autoload.php";

        use Source\Database\Connect;

        $pdo1 = Connect::getInstance();
        $pdo2 = Connect::getInstance();
        $pdo3 = Connect::getInstance();

        echo '<pre>';
        var_dump(
            $pdo1, 
            $pdo2, 
            $pdo3,
            Connect::getInstance(),
            Connect::getInstance()->getAvailableDrivers(), // banco de dados que o PDO consegue acessar no momento em minha máquina
            Connect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME) // driver que está sendo utilizado
        );
        echo '</pre>';
        ?>
        <br><br>



    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>