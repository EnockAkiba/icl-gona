<?php 
$user="root";
$password="";
try {
    $pdo= new PDO ('mysql:host=localhost;dbname=gestionecole',$user,$password);
} catch (PDOException $e) {
    echo "erreur". $e->getMessage();
}
?>