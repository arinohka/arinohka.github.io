<?php session_start(); ?>
<?php
$name=filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$email=filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$password=filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
$password1=filter_var(trim($_POST["password1"]), FILTER_SANITIZE_STRING);
$pdo=new PDO ('mysql:host=localhost;dbname=test;charset=utf8',"root","");

if(mb_strlen($name) < 5){
    echo "Недопустимая длина имени.";
    exit();
} // Проверяем длину имени
if($password=$password1) {
    $password = md5($password."thisisforhabr"); // Создаем хэш из пароля
}
else{
    echo 'минус минус';
}
$mysql = new mysqli('localhost', 'root', '', 'test');
$mysql->query('INSERT INTO user (name, email, password) VALUES($name, $email, $password)');
$mysql->close();
header('Location:/gsnrf/index1.html');
?>
if($password=$password1) {
    $sql=$pdo->query('INSERT INTO user (name, email, password) VALUES($name, $email, $password)');
//    $sql=$pdo->close();
    header('Location:/gsnrf/index1.html');
}
else{
    echo 'минус минус';
}
?>
