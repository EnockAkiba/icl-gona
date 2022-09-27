<?php
require '../../fonction/pdo.php';
$IdInscrip=$_POST['IdInscrip'];
$sql="SELECT IdInscrip  from Inscrire  where IdInscrip=? limit 1";
$requte=$pdo->prepare($sql);
$requte->execute([$IdInscrip]);
$tabs=$requte->fetchAll(PDO::FETCH_ASSOC);
if(count($tabs)==1){
 $sql="SELECT AnneeInscrip, IdCl from Inscrire where IdInscrip=?";
 $requete=$pdo->prepare($sql);
 $requete->execute([$IdInscrip]);
 $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
 foreach($tab as $data){
     $AnneeInscrip=$data['AnneeInscrip'];
     $IdCl=$data['IdCl'];
 }
$sql="SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode ,El.Nom,El.PostNom,El.Prenom,El.Sexe,C.DesigCours,Cl.Designation,Ins.AnneeInscrip,SUM(Ev.Cotes) AS SOMME FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl Where Ins.AnneeInscrip=? AND Ins.IdCl=? AND Ins.IdInscrip='$IdInscrip' GROUP BY C.DesigCours, Ev.Periode";
$requete=$pdo->prepare($sql);
$requete->execute([$AnneeInscrip,$IdCl]);
$tabs=$requete->fetchAll(PDO::FETCH_ASSOC);
if(count($tabs)==0){
    header("location:../../index.php");
    exit;
}elseif(count($tabs)>=1){
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
    <header>
         <h3>RESULTAT SCOLAIRE <span> ICL/goma</span></h3>
        <?php
        //  $tabs=$requete->fetchAll(PDO::FETCH_ASSOC);
         foreach($tabs as $data){
            $eleve= $data['Nom']." ".$data['PostNom']." ".$data['Prenom'];
            $sexe=$data['Sexe'];
            $classe=$data['Designation'];
            $AnneeInscrip=$data['AnneeInscrip'];
         }
        ?>
        <h4> Noms:  <span><?= $eleve ?></span></h4>
        <h4>Sexe : <span><?= $sexe ?></span></h4>
        <h4>Classe:<span> <?= $classe ?></span></h4>
        <h4>Annee Scolaire:  <span><?= $AnneeInscrip ?></span></h4>
    </header>
    <table>
         <tr class="heade">
             <th>Periode</th>
             <th>Cours</th>
             <th>cotes</th>
             <th>max</th>
         </tr>
        
         <?php    
         foreach($tabs as $data){
            $Periode= $data['Periode'];
            $DesigCours=$data['DesigCours'];
            $Cotes=$data['Cotes'];
            $CoteMax=$data['CoteMax'];
      ?>
       <tr class="cour">
           <td class="s"><?= ($Periode==1)?' premiere periode':'' ?></td>
           <td class="item"><?= ($Periode==1)? @$DesigCours:'' ?></td>
           <td class="item"><?=  ($Periode==1)? @$Cotes.' point':''  ?></td>
           <td class="item"><?=  ($Periode==1)? @$CoteMax.' point':''  ?></td>
      
       
         <?php } ?>
         </tr>
         <?php
        //  
        // 
        // 
        //  recuperation de pourcentage
         $sql="SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,Ev.CoteMax,Ev.Periode,SUM(Ev.Cotes) as maxCOURS, SUM(Ev.CoteMax) as maxmAx,((100* SUM(Ev.Cotes)/(SELECT SUM(Ev.CoteMax)) )) AS POURC FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl WHERE  Ins.IdInscrip='$IdInscrip' and Ev.Periode='1' Group By Ins.IdInscrip,Ins.IdInscrip";
         $requete=$pdo->prepare($sql);
$requete->execute();
$tab=$requete->fetchAll(PDO::FETCH_ASSOC);
foreach($tab as $data){
    $POURC=$data['POURC'];
    $maxCOURS=$data['maxCOURS'];
    $maxmAx=$data['maxmAx'];
     } ?>
          <tr class="pour">
          <td><strong> Pourcentage:<?=round(@$POURC,1) ?>%</strong></td>
          <td class="tt"><strong>TOTAL :</strong></td>
          <td class="tt"><strong><?=$maxCOURS ?></strong></td>
          <td class="tt"><strong><?=$maxmAx ?></strong></td>
          </tr>
         <?php    
         foreach($tabs as $data){
            $Periode= $data['Periode'];
            $DesigCours=$data['DesigCours'];
            $Cotes=$data['Cotes'];
            $CoteMax=$data['CoteMax'];
      ?>
         <tr class="cour">
           <td class="s"><?= ($Periode==2)?'deuxieme periode':'' ?></td>
           <td class="item"> <?= ($Periode==2)? @$DesigCours:'' ?></td>
           <td class="item"><?=  ($Periode==2)? @$Cotes.' point':''  ?></td>
           <td class="item"><?=  ($Periode==2)? @$CoteMax.' point':''  ?></td>
         </tr>
       
         <?php 
        } ?>
         <?php
         $Periode=2;
         $sql="SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,Ev.CoteMax,Ev.Periode,SUM(Ev.Cotes) as maxCOURS, SUM(Ev.CoteMax) as maxmAx,((100* SUM(Ev.Cotes)/(SELECT SUM(Ev.CoteMax)) )) AS POURC FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl WHERE  Ins.IdInscrip='$IdInscrip' and Ev.Periode='2' Group By Ins.IdInscrip,Ins.IdInscrip";
         $requ=$pdo->prepare($sql);
$requ->execute();
$taba=$requ->fetchAll(PDO::FETCH_ASSOC);
foreach($taba as $data){
    $POURC=$data['POURC'];
    $maxCOURS=$data['maxCOURS'];
    $maxmAx=$data['maxmAx'];
     } ?>
          <tr class="pour">
          <td><strong>Pourcentage:<?=($Periode==2)? round(@$POURC,1):'' ?>%</strong></td>
          <td class="tt"><strong>TOTAL :</strong></td>
          <td class="tt"><strong><?=$maxCOURS ?></strong></td>
          <td class="tt"><strong><?=$maxmAx ?></strong></td>
          </tr>

          <?php    
         foreach($tabs as $data){
            $Periode= $data['Periode'];
            $DesigCours=$data['DesigCours'];
            $Cotes=$data['Cotes'];
            $CoteMax=$data['CoteMax'];
      ?>

         <tr class="cour">
           <td class="s"><?= ($Periode==3)?'troisieme periode':'' ?></td>
           <td class="item"> <?= ($Periode==3)? @$DesigCours:'' ?></td>
           <td class="item"><?=  ($Periode==3)? @$Cotes.' point':''  ?></td>
           <td class="item"><?=  ($Periode==3)? @$CoteMax.' point':''  ?></td>
         </tr>
       
         <?php 
        } ?>
         <?php
         $Periode=0;
         $sql="SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,SUM(Ev.Cotes) as maxCOURS, SUM(Ev.CoteMax) as maxmAx ,((100* SUM(Ev.Cotes)/(SELECT SUM(Ev.CoteMax)) )) AS POURC FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl WHERE  Ins.IdInscrip='$IdInscrip' and Ev.Periode='3' Group By Ins.IdInscrip,Ins.IdInscrip";
         $requete=$pdo->prepare($sql);
$requete->execute();
$tab=$requete->fetchAll(PDO::FETCH_ASSOC);
foreach($tab as $data){
    $POURCa=$data['POURC'];
    $maxCOURS=$data['maxCOURS'];
    $maxmAx=$data['maxmAx'];
     }
 
      ?>

          <tr class="pour">
          <td><strong>Pourcentage:<?= round(@$POURCa,1)?>%</strong></td>
          <td class="tt"><strong>TOTAL :</strong></td>
          <td class="tt"><strong><?=$maxCOURS ?></strong></td>
          <td class="tt"><strong><?=$maxmAx ?></strong></td>
          </tr>

          <?php    
         foreach($tabs as $data){
            $Periode= $data['Periode'];
            $DesigCours=$data['DesigCours'];
            $Cotes=$data['Cotes'];
            $CoteMax=$data['CoteMax'];
      ?>
         <tr class="cour">
           <td class="s"><?= ($Periode==4)?'quartieme periode':'' ?></td>
           <td class="item"> <?= ($Periode==4)? @$DesigCours:'' ?></td>
           <td class="item"><?=  ($Periode==4)? @$Cotes.' point':''  ?></td>
           <td class="item"><?=  ($Periode==4)? @$CoteMax.' point':''  ?></td>
         </tr>
       
         <?php 
        } ?>
         <?php
        
         $sql="SELECT Ev.Cotes,Ev.CoteMax,Ev.Periode,Ev.CoteMax,Ev.Periode,SUM(Ev.Cotes) as maxCOURS, SUM(Ev.CoteMax) as maxmAx,((100* SUM(Ev.Cotes)/(SELECT SUM(Ev.CoteMax)) )) AS POURC FROM Eleve AS El INNER JOIN Inscrire AS Ins ON Ins.IdEl=El.IdEleve INNER JOIN Evaluer AS Ev ON Ev.IdInscrip=Ins.IdInscrip INNER JOIN  Cours AS C On C.IdCours=Ev.IdCours INNER JOIN Classe AS Cl ON Cl.IdCl=Ins.IdCl WHERE  Ins.IdInscrip='$IdInscrip' and Ev.Periode='4' Group By Ins.IdInscrip,Ins.IdInscrip";
         $requete=$pdo->prepare($sql);
$requete->execute();
$tabss=$requete->fetchAll(PDO::FETCH_ASSOC);
foreach($tabss as $data){
    $POURCs=$data['POURC'];
    $maxCOURS=$data['maxCOURS'];
    $maxmAx=$data['maxmAx'];
     } ?>
          <tr class="pour">
            <td><strong>Pourcentage:<?= round(@$POURCs,2) ?>%</strong></td>
            <td class="tt"><strong>TOTAL :</strong></td>
          <td class="tt"><strong> <?=$maxCOURS ?> </strong></td>
          <td class="tt"><strong> <?=$maxmAx ?> </strong></td>
          </tr>
    </table>
                  <p>
                  Fait le <?= date("d/m/Y")?><br>
                pour plus d'informations, Veuillez passer a l'institut communautaire du lac 
            
            </p>
</body>
</html>
<style>
    p{
        text-align: center;
        font-size: 12px;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        border: 0.1px solid rgba(60, 98, 111, 0.353);
    }
    .heade{
        background: rgba(60, 98, 111, 0.353);
    }
    .heade th{
        padding: 5px 2px;
        text-align: left;
    }
    .cour .s{
        width: 130px;
        padding: 1px;
        background: rgba(128, 128, 128, 0.1);
     color: darkblue;
    }
    .cour .item{
        background: rgba(128, 128, 128, 0.1);
        color: darkblue;
    }
    .pour td{
        padding: 5px;
        border-right: 1px solid rgba(128, 128, 128, 0.8);
        color: red;
    }
    td{
        border-right: 1px solid rgba(128, 128, 128, 0.8);
        text-align: center;
    }
    h3{
        background:rgba(128, 128, 128, 0.1);
        padding-left: 20px;
    }
    h3 span{
        color: red;
    }
    h4{
        border-bottom:0.3px solid  rgba(128, 128, 128, 0.3);
        padding: 5px;
        margin: 5px;
    }
    h4 span{
        color: blue;
    }
    .tt{
        color: darkblue;
    }
</style>
<?php
}else{
    header("location:../../index.php");
}
}elseif(count($tab)==0){
    header("location:../../index.php");
 }