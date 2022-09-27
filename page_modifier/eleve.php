<?php 
  require '../fonction/pdo.php';
  $id=$_GET['id'];
 $sql=" SELECT * FROM Eleve where IdEleve='$id'";
  $requete=$pdo->prepare($sql);
  $requete->execute();
  $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
   foreach($tab as $data){
      $Nom=$data['Nom'];
      $PostNom=$data['PostNom'];
      $Prenom=$data['Prenom'];
      $Sexe=$data['Sexe'];
      $DateNaiss=$data['DateNaiss'];
      $NomPere=$data['NomPere'];
      $NomMere=$data['NomMere'];
      $LieuNaiss=$data['LieuNaiss'];
      $Adresse=$data['Adresse'];
      $NumResp=$data['NumResp'];
   }
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
                <h2 class="form-text"> Modifier un eleve</h2>
               
                </div>
                
                 <div class="group-form">
                     <div class="item">
                 <label for=""> Nom</label> <br>
                 <input type="text" name="Nom" id="" class="form-control" value="<?=$Nom ?> "> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> PostNom</label> <br>
                 <input type="text" name="PostNom" id="" class="form-control" value="<?=$PostNom ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Prenom</label> <br>
                 <input type="text" name="Prenom" id="" class="form-control" value="<?=$Prenom ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Sexe</label> <br>
                 <select name="Sexe" class="form-control">
                      <option value="<?=$Sexe ?>"> <?= $Sexe ?> </option>
                      <option value="M">M</option>
                      <option value="F">F</option>
                 </select>
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Nom du Pere</label> <br>
                 <input type="text" name="NomPere" id="" class="form-control" value="<?=$NomPere ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Nom de la Mere</label> <br>
                 <input type="text" name="NomMere" id="" class="form-control" value="<?=$NomMere ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group three -->
                        
                <div class="group-form">
                     <div class="item">
                 <label for=""> Lieu de Naissance</label> <br>
                 <input type="text" name="LieuNaiss" id="" class="form-control" value="<?=$LieuNaiss ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Date de Naissance</label> <br>
                 <input type="text" name="DateNaiss" id="" class="form-control" value="<?=$DateNaiss ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group four -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Adresse</label> <br>
                 <input type="text" name="Adresse" id="" class="form-control" value="<?=$Adresse ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Numero du Responsable</label> <br>
                 <input type="text" name="NumResp" id="" class="form-control" value="<?=$NumResp ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group five -->
                <button type="submit" name="modifier_eleve" class="btn btn-success">MODIFIER</button>
                 <?php 
                    if(isset($_POST['modifier_eleve'])){
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
        top:10%;
        right: 30%;
        padding-bottom:10px;
    }
</style>



