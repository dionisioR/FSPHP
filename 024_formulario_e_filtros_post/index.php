
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
        <h1 class="display-3">Formulários e Filtros</h1>
    </header>
    
    <main class="container">
    <h2 class="display-6">Post</h2>
      
      <form name="post" action="./form.php" method="post" enctype="multipart/form-data">
        <p><a href="./" title="Atualizar">Atualizar</a></p>
        <div class="m-3">
            <label for="name">Nome:</label>
            <input type="text" name="name" value="" placeholder="Nome:">
        </div>
        <div class="m-3">
            <label for="email">E-mail:</label>
            <input type="text" name="email" value="" placeholder="E-mail:">
        </div>
        <div class="m-3">
            <button class="btn btn-primary">Enviar Agora!</button>
        </div>

      </form>

    </main>
    <footer class="text-center fixed-bottom">
        <p>RD3W</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>