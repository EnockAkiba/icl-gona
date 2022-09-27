
<?php 
  require '../fonction/pdo.php';
  $id=$_GET['id'];
 $sql=" SELECT * FROM Inscrire where IdInscrip ='$id'";
  $requete=$pdo->prepare($sql);
  $requete->execute();
  $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
   foreach($tab as $data){
    $IdEleve=$data['IdEl'];
    $IdInscrip=$data['IdInscrip'];
    $IdClasse=$data['IdCl'];
    $DateInscription=$data['DateInscrip'];
    $AnneeInscription=$data['AnneeInscrip'];
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
                <h2 class="form-text"> INSCRIPTION</h2>
                <a href="../page/inscrire.php" class="btn btn-danger"> X</a>
                </div>
                <div class="group-form">
                    <label for="">ID inscription</label> <br>
                    <input type="text" name="IdInscrip" id="" class="form-control" value="<?= $IdInscrip?>">
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for="">Selectionner un eleve</label> <br>
                 <select name="IdEl" id="" class="form-control">
                     <option value="<?= $IdEleve ?>"><?= $IdEleve ?></option>
                    <?php 
                    $sql="SELECT IdEleve,Nom from Eleve";
                    $requete=$pdo->prepare($sql);
                    $requete->execute();
                    $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tab as $data){
                        ?>
                        <option value="<?= $data['IdEleve'] ?>"> <?= $data['Nom'] ?></option>
                        <?php
                    }
                    ?>
                 </select> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for="">Selectionner une classe</label> <br>
                 <select name="IdCl" id="" class="form-control">
                     <option value="<?= $IdClasse ?>"><?= $IdClasse ?></option>
                    <?php 
                    $sql="SELECT IdCl ,Designation from Classe";
                    $requete=$pdo->prepare($sql);
                    $requete->execute();
                    $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tab as $data){
                        ?>
                        <option value="<?= $data['IdCl'] ?>"> <?= $data['Designation'] ?></option>
                        <?php
                    }
                    ?>
                 </select> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                </div>
                <div class="group-form">
                     <div class="item">
                 <label for=""> Date inscription</label> <br>
                 <input type="text" name="DateInscrip" id="" class="form-control" value="<?= $DateInscription ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> AnneeInscrip</label> <br>
                 <select name="AnneeInscrip" class="form-control">
                     <option value="<?= $AnneeInscription ?>"> <?= $AnneeInscription ?></option>
                     <option value="2020-2021">2020-2021</option>
                       <option value="2021-2022">2021-2022</option>
                       <option value="2022-2023">2022-2023</option>
                 </select>
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="modifier_inscrire" class="btn btn-success bt">MODIFIER</button>
                <?php
                if(isset($_POST['modifier_inscrire'])){
                    require '../fonction/modifier.php';
                }
                ?>
                </div>
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
    .bt{
        margin-top:5px ;
    }
</style>

