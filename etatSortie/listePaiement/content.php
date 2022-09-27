<?php
 require '../../fonction/pdo.php';
 $IdCl=$_POST['IdCl'];
 $AnneeInscrip=$_POST['AnneeInscrip'];
 if(!empty($IdCl) && !empty($AnneeInscrip)){
  $req="SELECT Designation FROM classe where IdCl='$IdCl'";
 $query=$pdo->prepare($req);
 $query->execute();
 foreach($tab= $query->fetchAll(PDO::FETCH_ASSOC)  as $data){
    $designation=$data['Designation'];
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
  <h5> LISTE PAIEMENT  : <span class="date">  Année Scolaire :<?= $AnneeInscrip . "  Classe : ". $designation ?></span></h5>
  </header>   
  <div class="tab">
  <table class="table table-striped">
            <thead>
                 <tr>
                      <th> MATRICULE</th>
                      <th> NOM POSTNOM PRONOM</th>
                      <th>MONTANT</th>
                 </tr>
            </thead>
            <tbody> 
    <?php
    $req="SELECT Ins.IdInscrip, E.Nom,E.PostNom,E.Prenom FROM eleve AS E INNER JOIN inscrire As Ins ON Ins.IdEl=E.IdEleve INNER JOIN classe AS Cl ON Ins.IdCl=Cl.IdCl WHERE Ins.AnneeInscrip=? AND Cl.IdCl=?";
    $query=$pdo->prepare($req);
    $query->execute([
   $AnneeInscrip,$IdCl
    ]);
    $tabs=$query->fetchAll(PDO::FETCH_ASSOC); 
    if(count($tabs)>=1){
     foreach($tabs as $data){
       $matricule=$data['IdInscrip'] ;
       $Nom=$data['Nom']. " ".$data['PostNom']. " ". $data['Prenom'] ;
       $sql= "SELECT paiement.IdInscrip,  SUM(paiement.MontChiff) AS somme from inscrire INNER JOIN  paiement on paiement.IdInscrip=inscrire.IdInscrip  WHERE paiement.IdInscrip='$matricule' ";
       $query=$pdo->prepare($sql);
       $query->execute();
       $tab=$query->fetchAll(PDO::FETCH_ASSOC); 
    foreach($tab as $data){
        $somme=$data['somme'];
    }
    ?>
      <tr>
       <td><?= $matricule?></td>
       <td><?= $Nom?></td>
       <td><?= ($somme>0)?$somme:0?> $</td>
        </tr>
       <?php
   }?>
 </tbody>
</table>
<?php }else{
    ?>
     <h4 class="resultat"> AUCUN RESULTAT TROUVÉ</h4>
    <?php
}?>
<style>
     .resultat{
        text-align: center;
        position: absolute;
        top: 20%;
        right: 25%;
        margin: 10px 0px;
        color: red;
     }
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
        background:rgba(128, 128, 128, 0.1);
        padding: 10px;
        margin: 5px 5px;
        display: inline-block;
        border-radius: 6px 3px;
        border: 0.2px solid green;
    }
    .titre{

        font-size: 1.1em;
    }
    .titre span{
        color: green;
        font-size: 1em;
    }
    header{
        width: 100%;
        margin-bottom: 20px;
    }
    header h2{
        text-align: center;
        margin: 5px 30px;
        border-bottom: 0.2px solid gray;
        font-weight: 100;
        position: relative;
    }
    header h5 span{
        color: red;
        font-weight: 100;
    }
    header h5 .date{
        color: darkblue;
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
        font-size: 13px;
    }
    .tab table tbody{
        text-align: center;
    }
    .tab table tbody tr {
        border-bottom: 0.1px solid rgba(128, 128, 128, 0.2);
        font-size: 10px;
    }
    .tab table tbody tr:nth-child(even){
        background: rgba(128, 128, 128, 0.1);
    }
    * td{
        padding: 5px 2px;
        border: 0.1px solid rgba(128, 128, 128, 0.4);
        /* font-size: 15px; */
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
    .re h6{
         color: green;    
         font-size: 10px;
    }
    .re h5{
         color: red;   
          font-size: 10px;
    }
</style>
<?php
 }else{
    header("location:../../page/paiement.php");
 }