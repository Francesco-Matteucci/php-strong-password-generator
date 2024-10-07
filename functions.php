<?php

function generatePassword($length, $includeLetters, $includeNumbers, $includeSymbols, $allowRepetition) {
    $characters = '';
    
    if ($includeLetters) {
        $characters .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($includeNumbers) {
        $characters .= '0123456789';
    }
    if ($includeSymbols) {
        $characters .= '!@#$%^&*_+-=<>?';
    }

    $password = '';
    $charactersLength = strlen($characters);

    if ($allowRepetition) {
        // Genero la password se l'utente ha richiesto la ripetizione dei caratteri
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charactersLength - 1)];
        }
    } else {
        // Nel caso l'utente scelga di non avere ripetizioni, eseguo un controllo se la lunghezza richiesta è maggiore dei caratteri disponibili (una password superiore a 10 caratteri solo numerici, senza ripetizione sarebbe impossibile)
        if ($length > $charactersLength) {
            return 'Errore: non ci sono abbastanza numeri disponibili per generare una password di questo genere, senza ripeterne alcuni :(';
        }
        $shuffledCharacters = str_shuffle($characters);
        $password = substr($shuffledCharacters, 0, $length);
    }

    return $password;
}