<?php
if(isset($_POST['email'])) {
     
   
    $to = "aayush@chefensa.com";
    $subject = "Mail From Assistants.io";

    function died($error) {

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    if(!isset($_POST['message']) ||
       !isset($_POST['email']) ||
       !isset($_POST['name'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $message = $_POST['message']; 
    $email_from = $_POST['email']; 
    $name = $_POST['name']; 

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$name)) {
        $error_message .= 'Name you entered does not appear to be valid.<br />';
    }
    if(strlen($message) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    $message_mail = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $message_mail .= "Name: ".clean_string($first_name)."\n";
    $message_mail .= "Email: ".clean_string($email_from)."\n";
    $message_mail .= "Message: ".clean_string($message)."\n";



$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message_mail, $headers);  
?>

Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>
