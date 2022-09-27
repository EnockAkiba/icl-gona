<?php 
 require 'fonction/pdo.php';
 $user="TOMATALA";
 $pass=md5("nixon");
  $sql= "INSERT INTO utilisateur (nom_utilisateur,motdepasse) values (:user, :pass)";
  $query=$pdo->prepare($sql);
  $query->execute([':user'=>$user, ':pass'=>$pass]);
?>