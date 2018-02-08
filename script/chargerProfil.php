<?php
session_start();
include('../db/connect.php');

$username=htmlspecialchars($_POST['profil']);
//On récupère l'id de l'utilisateur qui porte $username
$sql = 'SELECT id, username from user where username=:usnm';
$res = $db->prepare($sql);
$res->bindParam(':usnm', $username, PDO::PARAM_STR);
$res->execute();
$user = $res->fetch();
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

header('Location: ../index.php?goclick=true');
?>