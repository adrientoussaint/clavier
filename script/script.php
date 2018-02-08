<?php
include('../db/connect.php');
$user_id=$_POST['user_id'];
$sql = 'SELECT name, touche from perso INNER JOIN user ON perso.username = user.username where user.id=:usid';
$res= $db->prepare($sql);
$res->bindParam(':usid', $user_id, PDO::PARAM_INT);
$res->execute();
$touche=[];
foreach($res as $params){
    $touche[$params['touche']]=$params['name'];
}
$json=json_encode($touche,JSON_FORCE_OBJECT);
echo $json;
?>