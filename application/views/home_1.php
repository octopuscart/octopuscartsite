<?php

if (count($email)) {
    $emailt = $email[0];
    foreach ($email as $to_add) {
//    $mail->AddAddress("imteyaz_bari@yahoo.com", "");
        $mail->AddAddress($to_add, "");              // name is optional
    }
//echo $welcomemsg;

    if (isset($_REQUEST['sender_email'])) {
        $mail->AddAddress($_REQUEST['sender_email'], "");
    }


    $mail->MsgHTML($welcomemsg); //Put your body of the message you can place html code here
    if ($emailt) {
        $send = $mail->Send(); //Send the mails
    }
}
?>