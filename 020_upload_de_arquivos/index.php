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
        <h1 class="display-3">Upload de Arquivos</h1>
    </header>
    
    <main class="container">
    <!-- <form action="./?post=true" method="post" enctype="multipart/form-data"> -->
    <form action="./Upload_01.php" method="post" enctype="multipart/form-data">
            <p>
                <a href="./" title="Atualizar">Atualizar</a>
            </p>
            <div class="mb-3">
                <label for="file" class="form-label">Arquivo</label>
                <input type="file" class="form-control" name="file">
            </div>
            <button class="btn btn-primary">Enviar Agora!</button>
            
        </form>

  

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>