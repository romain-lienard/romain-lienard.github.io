<?php

if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_phone = "";
    $email_title = "";
    $visitor_message = "";
    $recipient = "roro333@hotmail.com";

    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Bien reçu, nous vous répondrons au plus vite !</p>";
    } else {
        echo '<p>Erreur, veuillez réessayer plus tard !</p>';
    }

} else {
    echo '<p>Erreur !</p>';
}

?>
