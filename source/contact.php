<?php

$from = 'natalia.dzhurinskaya@gmail.com';
$sendTo = 'natasha.dzhuri@gmail.com';
$subject = 'Neue Nachricht von der Flinte Website';
$fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Nachricht');
$okMessage = 'Die Eule ist im atemberaubenden Flug, kommt sicher Bald an';
$errorMessage = 'Etwas ist schiefgelaufen - Probiere es später erneut';

error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Du hast nichts ausgefüllt');

    $emailText = "Eine neue Nachricht von der Flinte Website\n=============================\n";

    foreach ($_POST as $key => $value) {
    if (isset($fields[$key])) {
$emailText .= "$fields[$key]: $value\n";        # code...
    }    # code...
    }

$headers = array('Content-Type: text/plain; charset="UTF-8";',
'From: ' . $from,
'Reply-to: ' . $from,
'Return-Path' . $from,
);

mail($sendTo, $subject, $emailText, implode("\n", $headers));

$responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

}


?>


