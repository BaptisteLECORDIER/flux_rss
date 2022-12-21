<?php 

    $gen_code = rand(111111,999999);

    $to      = $_POST['user_email'];
    $subject = 'Code de confirmation';
    $message = 'Votre code est : '.$gen_code;
    $headers = 'From: lecordierbaptiste@gmail.com' . "\r\n" .
     'Reply-To: lecordierbaptiste@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);





?>