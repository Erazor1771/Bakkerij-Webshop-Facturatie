<?php

$to = $email;
$subject = $onderwerp;

$message = 'Hallo, ' . $naam . ' <br><br>

                    Bedankt voor u interresse in Bakkerij van der Westen. Onze werknemers van Bakkerij van der Westen zullen zo
                    snel mogelijk contact met u opnemen. <br><br>

                    Met vriendelijke groet,

                    <br><br>

                    Bakkerij van der Westen';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@theguitarfactory.nl>' . "\r\n";

mail($to,$subject,$message,$headers);

