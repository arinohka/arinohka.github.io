<?php //require_once 'admin/connect.php';?>
<?php session_start();?>
<?php
$email=$_POST["email"];
$password=$_POST["password"];
$pdo=new PDO ('mysql:host=localhost;dbname=test;charset=utf8',"root","");
$sql = $pdo->prepare('SELECT id, email FROM user WHERE email=:email AND password=:password');
$sql->execute(array('email' => $email, 'password'=>$password));
$array=$sql->fetch(PDO::FETCH_ASSOC);
if($array["id"]>0){
    $_SESSION['email']=$array["email"];
    header('Location:/gsnrf/index1.html');
}
else{
    header('Location:/check1.php');
}
$sql = $pdo->prepare('SELECT name FROM user WHERE email=:email AND password=:password');
$name =$sql->fetch(PDO::FETCH_ASSOC);
setcookie('user', $name['name'], time() + 3600, "/");

