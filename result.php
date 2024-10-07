<?php
session_start();

$password = $_SESSION['generated_password'];
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password - Risultato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center">Password Generata</h1>
        <p class="text-center">La password generata è:</p>

        <div class="alert alert-success mt-3">
            <p class="m-0">Password: <strong><?php echo $password; ?></strong></p>
        </div>

        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-primary">Genera una nuova password</a>
        </div>
    </div>
</body>

</html>