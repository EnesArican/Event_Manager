<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 13/01/2017
 * Time: 18:01
 */


//THIS IS A TEST FILE ---> NOT USED IN PROJECT



define('SENDER', 'enesarican@hotmail.com');

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
define('RECIPIENT', 'zcemari@ucl.ac.uk');

// Replace smtp_username with your Amazon SES SMTP user name.
define('USERNAME','AKIAI2FMDBJJZKP5QDLQ');

// Replace smtp_password with your Amazon SES SMTP password.
define('PASSWORD','AhTF9QQfYNt6X1WEL1PwzHjSb4ZwOz3avAmA8OTW3ACr');

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
define('HOST', 'email-smtp.us-west-2.amazonaws.com');

// The port you will connect to on the Amazon SES SMTP endpoint.
define('PORT', '587');

// Other message information
define('SUBJECT','Amazon SES test (SMTP interface accessed using PHP)');
define('BODY','This email was sent through the Amazon SES SMTP interface by using PHP.');

require_once ('/usr/share/pear/Mail.php');

$headers = array (
    'From' => SENDER,
    'To' => RECIPIENT,
    'Subject' => SUBJECT);

$smtpParams = array (
    'host' => HOST,
    'port' => PORT,
    'auth' => true,
    'username' => USERNAME,
    'password' => PASSWORD
);

// Create an SMTP client.
$mail = Mail::factory('smtp', $smtpParams);

// Send the email.
$result = $mail->send(RECIPIENT, $headers, BODY);

if (PEAR::isError($result)) {
    echo("Email not sent. " .$result->getMessage() ."\n");
} else {
    echo("Email sent!"."\n");
}

