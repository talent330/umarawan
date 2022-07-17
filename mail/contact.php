<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    echo "Name: $name \n";
    echo "Email: $email \n";
    echo "Message: $message \n";

    if( empty($name)       || 
        empty($email)      ||
        empty($message)    ||
        !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        echo "No arguments Provided!";
        return false;
    }
    
    $to = "jhonatanmaranosilva@gmail.com";
    $email_subject = "Website Contact Form:  $name";
    $email_body = "You have received a new message from your website contact form.";
    $headers = "From: noreply@yourdomain.com\n"; //No email on the host, tried postmark inbound email address but no go.
    $headers .= "Reply-To: $email";

    $retVal = mail($to, $email_subject, $email_body, $headers);
    if( $retval == true ) {
        echo "Message sent successfully...";
        return true;
    }else {
        echo "Message could not be sent...";
        return false;
    }
    
?>
