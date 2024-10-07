<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center">Strong Password Generator</h1>
        <p class="text-center">Genera una password random</p>

        <form method="GET" action="" class="bg-light p-4 rounded">
            <div class="mb-3">
                <label for="password-length" class="form-label text-dark">Quanti caratteri vuoi avere nella password?
                    (scrivi un valore tra 6 e 15):</label>
                <input type="number" name="length" id="password-length" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Genera Password</button>
        </form>

        <?php
session_start();
require_once __DIR__ . '/functions.php';

if (isset($_GET['length']) && is_numeric($_GET['length'])) {
    $length = $_GET['length'];
    
    if ($length >= 6 && $length <= 15) {
        $_SESSION['generated_password'] = generatePassword($length);
        header('Location: result.php');
    } else {
        ?>
        <div class="alert alert-danger mt-3">
            <p class="m-0">La lunghezza della password deve essere compresa tra 6 e 15 caratteri.</p>
        </div>
        <?php
    }
}
?>
    </div>
</body>

</html>