<?php

$to = 'larsmertens_webdesign@hotmail.com';
$subject = 'Onderwerp "'.$onderwerp.'"';

$message = 'De volgende gegevens zijn achter gelaten via het contact formulier op de website. <br><br>

               Naam: '.$naam.' <br>
               Onderwerp: '.$onderwerp.' <br>
               E-mail: '.$email.' <br>
               Bericht: '.$bericht.' <br>

               <br><br>

            Met vriendelijke groet,
            <br><br>

            Bakkerij van der Westen';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@bakkerijvanderwesten.nl>' . "\r\n";

mail($to,$subject,$message,$headers);

