<?php 
error_reporting(0);
@$modifier_eleve=$_POST['modifier_eleve'];
if(isset($modifier_eleve)){
    $Nom=$_POST['Nom'];
    $PostNom=$_POST['PostNom'];
    $Prenom=$_POST['Prenom'];
    $Sexe=$_POST['Sexe'];
    $DateNaiss=$_POST['DateNaiss'];
    $NomPere=$_POST['NomPere'];
    $NomMere=$_POST['NomMere'];
    $LieuNaiss=$_POST['LieuNaiss'];
    $Adresse=$_POST['Adresse'];
    $NumResp=$_POST['NumResp'];
 $sql="UPDATE Eleve SET Nom =:Nom, PostNom=:PostNom , Prenom=:Prenom,Sexe=:Sexe, DateNaiss=:DateNaiss,NomPere=:NomPere,NomMere=:NomMere, LieuNaiss=:LieuNaiss,Adresse=:Adresse,NumResp=:NumResp  WHERE `Eleve`.`IdEleve` = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            'id'=>$id,
           ':Nom'=>$Nom, ':PostNom'=>$PostNom,':Prenom'=> $Prenom,':Sexe'=> $Sexe,':NomPere'=> $NomPere,':NomMere'=> $NomMere,':LieuNaiss'=> $LieuNaiss,':DateNaiss'=>$DateNaiss,':Adresse'=>$Adresse,':NumResp'=> $NumResp
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/eleve.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}

// 
// 
// 
// modifier cours

@$modifier_cours=$_POST['modifier_cours'];
if(isset($modifier_cours)){
    $DesigCours=$_POST['DesigCours'];
 $sql="UPDATE Cours SET DesigCours =:DesigCours WHERE IdCours = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            'id'=>$id,
           ':DesigCours'=>$DesigCours
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/cours.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}


// 
// 
// 
// modifier cours

@$modifier_section=$_POST['modifier_section'];
if(isset($modifier_section)){

    $DesigSection=$_POST['DesigSection'];
 $sql="UPDATE Section SET Designation =:DesigSection  WHERE IdSection = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            'id'=>$id,
           ':DesigSection'=>$DesigSection
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/section.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}



// 
// 
// 
// modifier cours

@$modifier_classe=$_POST['modifier_classe'];
if(isset($modifier_classe)){
    $Designation=$_POST['Designation'];
    $IdSection=$_POST['IdSection'];
 $sql="UPDATE Classe SET Designation =:Designation, IdSect  =:IdSection  WHERE IdCl = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            'id'=>$id,
           ':Designation'=>$Designation,
           ':IdSection'=>$IdSection
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/classe.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}



// 
// 
// 
// modifier inscription

@$modifier_inscrire=$_POST['modifier_inscrire'];
if(isset($modifier_inscrire)){
    $IdEleve=$_POST['IdEl'];
    $IdInscrip=$_POST['IdInscrip'];
    $IdClasse=$_POST['IdCl'];
    $DateInscription=$_POST['DateInscrip'];
    $AnneeInscription=$_POST['AnneeInscrip'];
 $sql="UPDATE Inscrire SET IdEl =:IdEl, IdInscrip  =:IdInscrip ,IdCl =:IdCl, DateInscrip  =:DateInscrip,  AnneeInscrip=:AnneeInscrip  WHERE IdInscrip = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
            ':IdEl'=>$IdEleve,
            ':IdCl'=>$IdClasse,
            ':DateInscrip'=>$DateInscription,
            ':AnneeInscrip'=>$AnneeInscription,
            ':id'=>$id
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/inscrire.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}

// 
// modifier paiement

@$modifier_paie=$_POST['modifier_paie'];
if(isset($modifier_paie)){
    $id=$_GET['id'];
    $IdInscri=$_POST['IdInscrip'];
    $MontChif=$_POST['MontChiff'];
    $MontLet=$_POST['MontLett'];
    $MotifPai=$_POST['MotifPaie'];
    $DatePai=$_POST['DatePaie'];
 $sql="UPDATE Paiement SET IdInscrip =:IdInscrip, MontChiff  =:MontChiff ,MontLett =:MontLett, MotifPaie  =:MotifPaie,  DatePaie=:DatePaie  WHERE  IdPaie= :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscri,
            ':MontChiff'=>$MontChif,
            ':MontLett'=>$MontLet,
            ':MotifPaie'=>$MotifPai,
            ':DatePaie'=>$DatePai,
            ':id'=>$id
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  <a href="../page/paiement.php" class="btn btn-primary">Retour</a>
             </div>
           
            <?php
        }
}



// 
// modifier paiement

@$modifier_eva=$_POST['modifier_eva'];
if(isset($modifier_eva)){
    $id=$_GET['id'];
    $IdInscrip=$_POST['IdInscrip'];
    $IdCours=$_POST['IdCour'];
    $Cotes=$_POST['Cotes'];
    $Periode=$_POST['Periode'];
    $CoteMax=$_POST['CoteMax'];
    $DateEv=$_POST['DateEv'];
    $date=date_create($DateEv);
    $dateConvert=date_format($date,"Y/m/d");
 $sql="UPDATE Evaluer SET IdInscrip =:IdInscrip, IdCours=:IdCours , Periode =:Periode,Cotes =:Cotes, CoteMax  =:CoteMax,  DateEv=:DateEv  WHERE  IdEvaluer = :id";
 $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
            ':IdCours'=>$IdCours,
            ':Cotes'=>$Cotes,
            ':Periode'=>$Periode,
            ':CoteMax'=>$CoteMax,
            ':DateEv'=>$dateConvert,
            ':id'=>$id
        ]);
        $resultat=$requete;
        if($resultat){
            ?>
             <div class="alert alert-success">
                <span> Modification reusi </span>  
             </div>
            <?php
        }
}

















?>
<style>
    .alert{
        display:flex;
        margin-top:10px;
        justify-content:space-between;
    }
</style>