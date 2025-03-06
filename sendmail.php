<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Imposta la mail di destinazione
    $to = "giuliopolent@gmail.com"; // Sostituisci con l'email desiderata
    $subject = "Richiesta Informazioni da i Portici";
    
    // Recupera e pulisci i dati inviati dal form
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefono = trim($_POST["telefono"]);
    $arrivo = trim($_POST["arrivo"]);
    $partenza = trim($_POST["partenza"]);
    $messaggio = trim($_POST["messaggio"]);

    // Crea il corpo del messaggio
    $body = "Nome: $nome\n";
    $body .= "Email: $email\n";
    $body .= "Telefono: $telefono\n";
    $body .= "Data di Arrivo: $arrivo\n";
    $body .= "Data di Partenza: $partenza\n";
    $body .= "Messaggio:\n$messaggio";

    // Imposta gli header (ad es. l'indirizzo del mittente)
    $headers = "From: $email\r\n";
    
    // Invio dell'email
    if (mail($to, $subject, $body, $headers)) {
        // Reindirizza a una pagina di ringraziamento o mostra un messaggio di conferma
        echo "Messaggio inviato con successo.";
    } else {
        echo "C'è stato un errore nell'invio del messaggio.";
    }
} else {
    echo "Metodo non valido.";
}
?>
