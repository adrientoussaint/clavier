<?php
session_start();
include('../db/connect.php');
$alphabet = ['a','z','e','r','t','y','u','i','o','p','q','s','d','f','g','h','j','k','l','m','w','x','c','v','b','n'];
$sounds=$_SESSION['sounds'];
var_dump($_SESSION);
$username=htmlspecialchars($_POST['username']);
//On récupère l'id de l'utilisateur qui porte $username
$sql = 'SELECT id, username from user where username=:usnm';
$res = $db->prepare($sql);
$res->bindParam(':usnm', $username, PDO::PARAM_STR);
$res->execute();
$user = $res->fetch();
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
//On compte le nombre d'utilisateur qui porte $username
$nb_ut = $res->rowCount();
//Si il n'y a qu'un seul utilisateur qui s'appelle comme ça
if($nb_ut==1){
    //On met a jour sa config
    foreach($alphabet as $letter){
        $sql = 'UPDATE perso SET name =:sound, touche=:letter where username=:usnm';
        $res= $db->prepare($sql);
        $res->bindParam(':usnm', $username, PDO::PARAM_STR);
        $res->bindParam(':sound', $sounds[$_POST[$letter]], PDO::PARAM_STR);
        $res->bindParam(':letter', $letter, PDO::PARAM_STR);
        $res->execute();
    }
    // header('Location: ../index.php?goclick=true');
//Si il n'y en a pas
}else{
    //On créer un nouvel ut dans user
    $sql = 'INSERT INTO user SET username=:usnm';
    $res = $db->prepare($sql);
    $res->bindParam(':usnm', $username, PDO::PARAM_STR);
    $res->execute();
    //On créer son profil dans perso
    foreach($alphabet as $letter){
        $sql = 'INSERT INTO perso SET name =:sound, touche=:letter, username=:usnm';
        $res = $db->prepare($sql);
        $res->bindParam(':usnm', $username, PDO::PARAM_STR);
        $res->bindParam(':sound', $sounds[$_POST[$letter]], PDO::PARAM_STR);
        $res->bindParam(':letter', $letter, PDO::PARAM_STR);
        $res->execute();
    }

    $sql = 'SELECT id, username from user where username=:usnm';
    $res = $db->prepare($sql);
    $res->bindParam(':usnm', $username, PDO::PARAM_STR);
    $res->execute();
    $user = $res->fetch();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    
    // header('Location: ../index.php?goclick=true');
    
}
?>