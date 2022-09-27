
<?php 
  require '../fonction/pdo.php';
  $id=$_GET['id'];
  $sql=" SELECT Evaluer.* , Eleve.Nom, Eleve.PostNom, Cours.DesigCours from Eleve,Evaluer, Inscrire, Cours where Evaluer.IdInscrip=Inscrire.IdInscrip and Eleve.IdEleve=Inscrire.IdEl and Cours.IdCours=Evaluer.IdCours and IdEvaluer=:id";
  $requete=$pdo->prepare($sql);
  $requete->execute([':id'=>$id]);
  $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
   foreach($tab as $data){
       $IdInscrip=$data['IdInscrip'];
        $IdEvaluer=$data['IdEvaluer'];
      $Nom=$data['Nom'];
      $PostNom=$data['PostNom'];
      $IdCours=$data['IdCours'];
      $DesigCours=$data['DesigCours'];
      $Cotes=$data['Cotes'];
      $CoteMax=$data['CoteMax'];
      $Periode=$data['Periode'];
      $DateEv=$data['DateEv'];
      $date=date_create($DateEv);
    $dateConvert=date_format($date,"d/m/Y");
     
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
        <div class="col-12">
        <form action=""  class="form eleve" method="post">
                <div class="titre">
                <h2 class="form-text">Modifier l'evaluation</h2>
                <a href="../page/evaluation.php" class="btn btn-danger"> X</a>
                </div>
                <div class="group-form">
                    <label for="">Nom d'eleve</label> <br>
                    <select name="IdInscrip" id="" class="form-control"> 
                        <option value="<?=$IdInscrip ?>"><?=$Nom . " ".$PostNom ?></option>
                        <?php 
                        $sql="SELECT Inscrire.IdInscrip , Eleve.Nom , Eleve.PostNom from Eleve, Inscrire WHERE Inscrire.IdEl=Eleve.IdEleve";
                        $query=$pdo->prepare($sql);
                        $query->execute();
                        $tab=$query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($tab as $data){
                            ?>
                            <option value="<?= $data['IdInscrip']?>"><?= $data['Nom'] . " ".$data['PostNom']?></option>
                            <?php
                        }
                        ?>
                    </select>
            
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for="">Cours </label> <br>
                 <select name="IdCour" id="" class="form-control"> 
                        <option value="<?= $IdCours?>"> <?= $DesigCours?></option>
                        <?php 
                        $sql="SELECT * FROM Cours";
                        $query=$pdo->prepare($sql);
                        $query->execute();
                        $tab=$query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($tab as $data){
                            ?>
                            <option value="<?= $data['IdCours']?>"><?= $data['DesigCours']?></option>
                            <?php
                        }
                        ?>
                    </select>
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for="">Cotes obtenue</label> <br>
                <input type="text" name="Cotes" id="" class="form-control" value="<?= $Cotes ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                </div>
                <div class="group-form">
                     <div class="item">
                 <label for=""> Maximum du cours</label> <br>
                 <input type="text" name="CoteMax" id="" class="form-control" value="<?= $CoteMax ?>"> 
                 </div>
                 <div class="item">
                 <label for=""> Periode</label> <br>
                 <select name="Periode" id="" class="form-control">
                 <option value="<?= $Periode?>"> <?= $Periode?></option>
                            <option value="1">premiere periode</option>
                            <option value="2">deuxieme periode</option>
                            <option value="3">troisieme periode</option>
                            <option value="4">quatrieme periode</option>
                 </select>
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Date d'evaluation</label> <br>
                <input type="text" name="DateEv" id="" class="form-control" value="<?= $dateConvert ?>">
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="modifier_eva" class="btn btn-success bt">MODIFIER</button>
                </div>
            </form>
            <?php if(isset($_POST['modifier_eva'])){
                    require '../fonction/modifier.php';
            }?>
        </div>
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

