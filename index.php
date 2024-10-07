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

        <form method="GET" action="" class="bg-secondary p-4 rounded text-light shadow-lg">
            <div class="mb-3">
                <label for="password-length" class="form-label">Quanti caratteri vuoi avere nella password?
                    (scrivi un valore tra 6 e 15):</label>
                <input type="number" name="length" id="password-length" class="form-control" value="1">
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Scegli quali caratteri includere nella password:</label><br>
                <input type="checkbox" name="include_letters" value="1" title="Lettere (a-z, A-Z)" checked> Lettere<br>
                <input type="checkbox" name="include_numbers" value="1" title="Numeri (0-9)" checked> Numeri<br>
                <input type="checkbox" name="include_symbols" value="1" title="Simboli (!@#$%^&*)"> Simboli
            </div>

            <div class="mb-3">
                <label class="form-label text-dark">Vuoi consentire la ripetizione di uno o più caratteri?</label><br>
                <input type="radio" name="allow_repetition" value="1" checked> Si<br>
                <input type="radio" name="allow_repetition" value="0"> No
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Genera Password</button>
        </form>

        <?php
session_start();
require_once __DIR__ . '/functions.php';

if (isset($_GET['length']) && is_numeric($_GET['length'])) {
    $length = $_GET['length'];

    // Recupero le opzioni
    $includeLetters = isset($_GET['include_letters']);
    $includeNumbers = isset($_GET['include_numbers']);
    $includeSymbols = isset($_GET['include_symbols']);
    $allowRepetition = isset($_GET['allow_repetition']) && $_GET['allow_repetition'] == 1;

    if ($length >= 6 && $length <= 15) {
        // Chiamo la funzione di generazione password con le opzioni richieste dell'utente
        $generatedPassword = generatePassword($length, $includeLetters, $includeNumbers, $includeSymbols, $allowRepetition);

        // Redirect a result.php
        $_SESSION['generated_password'] = $generatedPassword;
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