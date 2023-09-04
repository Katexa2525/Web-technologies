<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Подключаем PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
// Получаем данные из формы
$email = $_POST['email'];
$message = $_POST['message'];

// Создаем экземпляр PHPMailer
$mail = new PHPMailer;

// Устанавливаем параметры SMTP сервера
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Замените на адрес вашего SMTP сервера
$mail->Port = 587; // Укажите порт SMTP сервера
$mail->SMTPAuth = true;
$mail->Username = 'katya.dendisol@gmail.com'; // Замените на вашу почту
$mail->Password = 'dipgspzdkmmmtnwh'; // Замените на пароль от вашей почты
$mail->SMTPSecure = 'tls';

// Устанавливаем адрес отправителя и получателя
$mail->setFrom('katya.dendisol@gmail.com', 'Катя Д'); // Замените на вашу почту и имя
$mail->addAddress($email); // Используем введенный email как адрес получателя

// Устанавливаем тему и текст сообщения
$mail->Subject = 'Test Email';
$mail->Body = $message;

// Отправляем сообщение
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent successfully.';
}

?>