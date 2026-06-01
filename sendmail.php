<?php
header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = strip_tags($_POST["from_name"]);
    $email = strip_tags($_POST["reply_to"]);
    $message = strip_tags($_POST["message"]);

    $to = "markgoodrick1967@gmail.com"; 
    $subject = "New message from your website";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>

