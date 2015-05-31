<?php

    if(isset($_POST['email'])) {
        error_log($_POST['email']);
        $to = "abhinav@innovaccer.com";
        $subject = "Mail From Assistants.io";

        $message = $_POST['message'];
        $email_from = $_POST['email'];
        $name = $_POST['name'];

        $message_mail = "Form details below.\n\n";

        function clean_string($string) {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $message_mail .= "Name: " . clean_string($name) . "\n";
        $message_mail .= "Email: " . clean_string($email_from) . "\n";
        $message_mail .= "Message: " . clean_string($message) . "\n";

        $headers = 'From: ' . $email_from . "\r\n" .
                    'Reply-To: ' . $email_from . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message_mail, $headers);
    }