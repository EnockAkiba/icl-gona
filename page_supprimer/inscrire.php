<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/css/bootstrap.min.css">
    <link rel="stylesheet" href="../include/style.css?t=<?= time() ?>">
    <link rel="stylesheet" href="../include/all.css?t=<?= time() ?>">
    <title>ICL Goma</title>
</head>
<?php
require '../fonction/pdo.php';
$id=$_POST['idinscrire'];

?>
<div class="container supp">
     <div class="row">
         <div class="col-12">
              <form action="" method="post">
                   <h4>voulez-vous supprimer ?</h4>
                   <div class="btns">
                        <input type="hidden" name="ids" value="<?=$id?>">
                       <button type="submit" name="ok" class="btn btn-danger">OUI</button> 
                       <a href="../page/cours.php" class="btn btn-warning">NON</a>  <br>
                       <br>
                       Une fois clique oui cette action sera supprimer
                   </div>
              </form>
              <?php 
              @$ids=$_POST['ids'];
               if(isset($_POST['ok'])){
                    $sql="DELETE FROM Inscrire WHERE IdInscrip =:id";
                    $requete=$pdo->prepare($sql);
                    $requete->execute([':id'=>$ids]);
                    if($requete){
               header("location:../page/inscrire.php");
                }               
               }
              ?>
         </div>
     </div>
 </div>

 <style>
 .supp{
     width: 30%;
     box-shadow:2px 3px 5px black;
     padding:50px;
     background: white;
     margin-top:10%
 }
 </style>