<?php
header('Location: https://' . $_SERVER['HTTP_HOST'] . '/index.html');


$message_sent = false;

if(isset($_POST['email']) && $_POST['email'] != ''){

        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $subject = NULL;

                $to = "mike@mike-terry.com";
                $body = "";

                $body .= "From: ".$name."\r\n";
                $body .= "Email: ".$email."\r\n";
                $body .= "Message: "."\r\n".$message."\r\n";

                mail($to, $subject, $body);
                        
        } 

}

exit;
?>