<?php
header('Location: https://' . $_SERVER['HTTP_HOST'] . '/index.html');
//Redirect user to index.html upon completion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6Lfahx0fAAAAAB6v9qRw50DFy5uhjt7WDxZCgMPG';
        $recaptcha_response = $_POST['recaptcha_response'];

        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha_result = json_decode($recaptcha);

        if ($recaptcha_result->success) {

                if (isset($_POST['email']) && $_POST['email'] != '') {
                        //If email key exists & email value is not empty

                        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                //If email is in correct format

                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $message = $_POST['message'];
                                $subject = '';

                                $to = "mike@mike-terry.com";
                                $body = "";

                                $body .= "From: " . $name . "\r\n";
                                $body .= "Email: " . $email . "\r\n";
                                $body .= "Message: " . "\r\n" . $message . "\r\n";

                                if (mail($to, $subject, $body)) {
                                        echo 'Email sent successfully!';
                                } else {
                                        echo 'Failed to send email. Please try again later.';
                                }
                        } else {
                                echo 'Invalid email format.';
                        }
                } else {
                        echo 'Email field is empty.';
                }
        } else {

                echo 'reCAPTCHA verification failed.';
        }
}

exit;
?>