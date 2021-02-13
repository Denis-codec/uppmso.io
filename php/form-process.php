<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "info@uppmso.ru";
$Subject = "zakaz uppmso.ru";

// prepare email body text
$Body = "";
$Body .= "<br><br> Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "<br><br> Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "<br><br> Message: ";
$Body .= $message;
$Body .= "\n";
$headers = 'From: '.$from.'
';
$headers .= 'MIME-Version: 1.0
';
$headers  = "Content-type: text/html; charset=utf-8 From:$email"; 

// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>