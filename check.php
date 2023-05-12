<?php
$nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);



if(trim($nickname) == '')
{
echo "Вы не ввели свой никнейм";
exit();
}
if(trim($email) == '')
{
echo "Вы не ввели свою почту";
exit();
}
if(trim($pass) == '')
{
echo "Вы не ввели пароль";
exit();
}
if(mb_strlen($nickname) < 4 || mb_strlen($nickname) > 15)
{
echo "Недопустимый никнейм (От 4 до 15 символов)";
exit();
}
if(mb_strlen($pass) < 6 )
{
echo "Недопустимый пароль (От 6 символов)";
exit();
}

$mysql = new mysqli('localhost', 'root', 'root', 'registration');
$mysql->query("INSERT INTO `users` (`NickName`, `E-Mail`, `Pass`) VALUES('$nickname', '$email', '$pass')")
$mysql->close();


/*if($error != '') {
    echo $error;
    exit;
}
$subject = "=?utf-8?B?".base64_encode("Тема для обзора")."?=";
$head = "From: $email\r\nReply-to: $email\r\nContent-type: text/plain; chatset=utd-8\r\n";
mail('admin@itproger.com', $subject, $message, $head);
head('Location: /post.php');*/
?>