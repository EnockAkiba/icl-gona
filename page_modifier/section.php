<?php 
  require '../fonction/pdo.php';
  $id=$_GET['id'];
 $sql=" SELECT * FROM Section where IdSection='$id'";
  $requete=$pdo->prepare($sql);
  $requete->execute();
  $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
  foreach($tab as $data){
  $DesigSection=$data['Designation'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/css/bootstrap.min.css">
    <link rel="stylesheet" href="../include/style.css?t=<?= time() ?>">
    <link rel="stylesheet" href="../include/all.css?t=<?= time() ?>">
    <link rel="stylesheet" href="../include/modi.css?t=<?= time() ?>">
    <title>ICL Goma</title>
</head>
<body>
<div class="container login">
     <div class="row">
        <div class="col-12 mo">
            <form action=""  class="form eleve" method="post">
                <div class="titre">
                <h2 class="form-text"> Modifier une section</h2>
               
                </div>
                
                 <div class="group-form">
                     <div class="item">
                 <label for=""> Designation</label> <br>
                 <input type="text" name="DesigSection" id="" class="form-control" value="<?=$DesigSection ?> "> 
                 </div>
                </div>
                <!-- group one -->

               
                <button type="submit" name="modifier_section" class="btn btn-success">MODIFIER</button>
                 <?php 
                    if(isset($_POST['modifier_section'])){
                         require '../fonction/modifier.php';
                    }                 ?>
            </form>
        </div>
    </div>
    </div>  
    </div>

</body>

<style>
    .login{
        top:15%;
        right: 30%;
        padding-bottom:10px;
    }
</style>

