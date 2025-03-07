<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Specifica l'indirizzo email di destinazione (sostituisci con quello desiderato)
    $to = "tuamail@esempio.com";

    // Imposta l'oggetto della mail
    $subject = "Richiesta Informazioni da i Portici";

    // Recupera e pulisci i dati inviati dal form
    $nome      = strip_tags(trim($_POST["nome"]));
    $email     = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefono  = strip_tags(trim($_POST["telefono"]));
    $arrivo    = strip_tags(trim($_POST["arrivo"]));
    $partenza  = strip_tags(trim($_POST["partenza"]));
    $messaggio = strip_tags(trim($_POST["messaggio"]));

    // Costruisci il corpo della mail
    $body = "Nome: $nome\n";
    $body .= "Email: $email\n";
    $body .= "Telefono: $telefono\n";
    $body .= "Data di Arrivo: $arrivo\n";
    $body .= "Data di Partenza: $partenza\n";
    $body .= "Messaggio:\n$messaggio\n";

    // Imposta gli header, ad esempio per specificare il mittente
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Invio dell'email
    if (mail($to, $subject, $body, $headers)) {
        // Se l'invio va a buon fine, puoi reindirizzare l'utente a una pagina di ringraziamento
        header("Location: thankyou.html");
        exit;
    } else {
        echo "C'è stato un errore nell'invio del messaggio. Riprova più tardi.";
    }
} else {
    echo "Metodo non valido.";
}
?>
