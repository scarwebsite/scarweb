<?php
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

//send email
    mail("uloemz@gmail.com", "This is an email from:" .$email, $message);
}
?>
