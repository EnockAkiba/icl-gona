
<?php 
  require '../fonction/pdo.php';
  $id=$_GET['id'];
  $sql=" SELECT Paiement.* , Eleve.Nom, Eleve.PostNom from Eleve,Paiement, Inscrire where Paiement.IdInscrip=Inscrire.IdInscrip and Eleve.IdEleve=Inscrire.IdEl and IdPaie=:id";
                     $requete=$pdo->prepare($sql);
                     $requete->execute([':id'=>$id]);
                     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                      foreach($tab as $data){
                           $IdPaie=$data['IdPaie'];
                           $IdInscrip=$data['IdInscrip'];
                         $Nom=$data['Nom'];
                         $PostNom=$data['PostNom'];
                         $MontChiff=$data['MontChiff'];
                         $MontLett=$data['MontLett'];
                         $MotifPaie=$data['MotifPaie'];
                         $DatePaie=$data['DatePaie'];
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
<<div class="container login">
     <div class="row">
        <div class="col-12">
            <form action=""  class="form eleve" method="post">
                <div class="titre">
                <h2 class="form-text"> PAIEMENT</h2>
                <a href="../page/paiement.php" class="btn btn-danger"> X</a>
                </div>
                <div class="group-form">
                    <label for="">ID inscription</label> <br>
                    <select name="IdInscrip" id="" class="form-control"> 
                        <option value="<?= $IdInscrip?>"> <?=$Nom . "  ". $PostNom ?></option>
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
                 <label for="">Montant en Chiffre</label> <br>
                <input type="number" name="MontChiff" id="" class="form-control" value="<?=$MontChiff ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for="">Montant en Lettre</label> <br>
                <input type="text" name="MontLett" id="" class="form-control" value="<?=$MontLett ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                </div>
                <div class="group-form">
                     <div class="item">
                 <label for=""> Motif de Paiement</label> <br>
                 <input type="text" name="MotifPaie" id="" class="form-control" value="<?=$MotifPaie ?>"> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Date de Paiement</label> <br>
                <input type="text" name="DatePaie" id="" class="form-control" value="<?=$DatePaie ?>"> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="modifier_paie" class="btn btn-success bt">MODIFIER</button>
                </div>
            </form>
            <?php if(isset($_POST['modifier_paie'])){
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

