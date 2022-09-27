<?php 
      require '../../fonction/pdo.php';
    $IdCl=$_POST['IdCl'];
    $AnneeInscrip=$_POST['AnneeInscrip'];
      $sql="SELECT Inscrire.IdInscrip, Eleve.Nom, Eleve.PostNom, Eleve.Prenom, Eleve.Sexe, Eleve.Adresse ,Eleve.LieuNaiss, Eleve.DateNaiss,  Classe.Designation, Inscrire.AnneeInscrip from Eleve,Inscrire, Classe WHERE Inscrire.IdEl=Eleve.IdEleve and Inscrire.IdCl=Classe.IdCl and Inscrire.IdCl='$IdCl' and Inscrire.AnneeInscrip='$AnneeInscrip'";
      $requete=$pdo->prepare($sql);
      $requete->execute();
      $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
if(count($tab)==0){
    header("location:../../page/inscrire.php");
    exit;
}else{
       foreach($tab as $data){
         $Designation=$data['Designation'];
       }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4 class="titre">INSTITUT COMMUNAUTAIRE DU LAC<span> ICL/goma</span> </h4>
  <header>
    <h2>Liste des eleves  inscrit  en <span class="date"> <?= $AnneeInscrip . " dans  ". $Designation ?></span></h2>

  </header>   
  <div class="tab">
  <table class="table table-striped ">
            <thead>
                 <tr>
                      <th scope="col"> id Ins</th> 
                      <th scope="col"> Nom</th>
                      <th scope="col"> PostNom</th>
                      <th scope="col"> Prenom</th>
                      <th scope="col"> Sexe</th>
                      <th scope="col"> Lieu de naissance</th>
                      <th scope="col"> Date de naissance</th>
                      <th scope="col"> Adresse</th>
                 </tr>
            </thead>
            <tbody>
                     <?php 
                 
                      foreach($tab as $data){
                           $IdInscrip=$data['IdInscrip'];
                         $Nom=$data['Nom'];
                         $PostNom=$data['PostNom'];
                         $Prenom=$data['Prenom'];
                         $Sexe=$data['Sexe'];
                         $LieuNaiss=$data['LieuNaiss'];
                         $DateNaiss=$data['DateNaiss'];
                         $date=date_create($DateNaiss);
                         $datec=date_format($date,"d.m.Y");
                         $Adresse=$data['Adresse'];
                     ?>
                     <tr>
                    <td scope="row"> <?= $IdInscrip ?></td>
                    <td scope="row"> <?= $Nom ?></td>
                    <td scope="row"> <?= $PostNom ?></td>
                    <td scope="row"> <?= $Prenom ?></td>
                    <td scope="row"> <?= $Sexe ?></td>
                    <td scope="row"> <?= $LieuNaiss ?></td>
                    <td scope="row"> <?= $datec ?></td>
                    <td scope="row"> <?= $Adresse ?></td>
                </tr>
                <?php }?>
            </tbody>
     </table>
  </div> 
</body>
</html>
<style>
    .fin{
        background: gray;
        color: white;
    }
    *{
        padding: 0;
        margin: 0;
        font-family: 'Franklin Gothic Medium', 'Times New Roman', Times, serif;
    }
    body{
        padding: 5px;
    }
    .titre{
        background:rgba(128, 128, 128, 0.1);
        padding: 10px;
        margin: 5px 5px;
        display: inline-block;
        border-radius: 6px 3px;
        border: 0.2px solid green;
    }
    .titre span{
        color: green;
        font-size: 1.3em;
    }
    header{
        width: 100%;
    }
    header h2{
        text-align: center;
        margin: 5px 30px;
        border-bottom: 0.2px solid gray;
        font-weight: 100;
        position: relative;
    }
    header h2 span{
        color: red;
        font-weight: 100;
    }
    header h2 .date{
        color: red;
        font-weight: 100;
    }
    header h5{
        text-align: center;
    }
    .tab{
        margin: 5px 30px;
        border: 0.2px solid black;
    }
    .tab table{
        border-collapse: collapse;
        width: 100%;
    }
    .tab table thead{
        background: rgba(128, 128, 128, 0.8);
        color: black;
    }
    .tab table thead tr th{
        padding: 5px 2px;
    }
    .tab table tbody{
        text-align: center;
    }
    .tab table tbody tr {
        border-bottom: 0.1px solid rgba(128, 128, 128, 0.2);
    }
    .tab table tbody tr:nth-child(even){
        background: rgba(128, 128, 128, 0.1);
    }
    * td{
        padding: 5px 2px;
        border: 0.1px solid rgba(128, 128, 128, 0.4);
    }
    .main{
        width: 100%;
    }
    .main th{
        background:  rgba(128, 128, 128, 0.2);
        padding: 5px 2px;
    }
    .main td{
        border: 1px solid rgba(128, 128, 128, 0.9);
    }
</style>
<?php } ?>