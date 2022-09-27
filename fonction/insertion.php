<?php
error_reporting(0);
@$enregistrer_eleve=$_POST['enregistrer_eleve'];
if(isset($enregistrer_eleve)){
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
    if(
        (!empty($Nom))&&
        (!empty($PostNom))&&
        (!empty($Prenom))&&
        (!empty($Sexe))&&
        (!empty($DateNaiss))&&
       (!empty($NomPere))&&
        (!empty($NomMere))&&
        (!empty($LieuNaiss))&&
        (!empty($Adresse))&&
        (!empty($NumResp))
    ){ 
         $sql="SELECT IdEleve,Nom,PostNom,Prenom FRoM Eleve where Nom=:Nom and PostNom= :PostNom and Prenom = :Prenom limit 1";
         $requete=$pdo->prepare($sql);
         $requete->execute([
            ':Nom'=>$Nom, ':PostNom'=>$PostNom,':Prenom'=> $Prenom,
         ]);
         $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
         if(count($tab)>=1){
                $erreur= "l'eleve existe deja "; ?>
                <div class="alert alert-danger resultat">
              <?= $erreur ?>
          </div> 
          <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Eleve(Nom,PostNom,Prenom,Sexe,NomPere,NomMere,LieuNaiss,DateNaiss,Adresse,NumResp) VALUES (:Nom,:PostNom,:Prenom,:Sexe,:NomPere,:NomMere,:LieuNaiss,:DateNaiss,:Adresse,:NumResp)";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':Nom'=>$Nom, ':PostNom'=>$PostNom,':Prenom'=> $Prenom,':Sexe'=> $Sexe,':NomPere'=> $NomPere,':NomMere'=> $NomMere,':LieuNaiss'=> $LieuNaiss,':DateNaiss'=>$DateNaiss,':Adresse'=>$Adresse,':NumResp'=> $NumResp
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                         <?= $resultat ?>
                   </div> 
            <?php
        }
    }
    }else{ ?>
 
 <script>alert(" vous devez remplir tous les champs")</script>
        <?php
    }
}
// 
// 
// insertion cours

@$enregister_cours=$_POST['enregister_cours'];
if(isset($enregister_cours)){
    $DesigCours=$_POST['DesigCours'];
    // $MaxCours=$_POST['MaxCours'];
   
    if(
        (!empty($DesigCours))
    ){   $sql="SELECT IdCours,DesigCours FRoM Cours where DesigCours=:DesigCours limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':DesigCours'=>$DesigCours
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "le Cours existe deja "; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Cours(DesigCours) VALUES (:DesigCours)";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':DesigCours'=>$DesigCours
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }else{ ?>
 
 <script>alert("vous devez remplir tous les champs")</script>

        <?php
    }
}
}


// 
// 
// insertion section

@$enregister_section=$_POST['enregister_section'];
if(isset($enregister_section)){
    $DesigSection=$_POST['DesigSection'];
    if(
        (!empty($DesigSection))
    ){   $sql="SELECT IdSection,Designation FRoM Section where Designation=:DesigSection  limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':DesigSection'=>$DesigSection
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "la section existe deja "; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Section(Designation) VALUES (:DesigSection)";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':DesigSection'=>$DesigSection
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }else{ ?>
 
 <script>alert("vous devez remplir tous les champs")</script>

        <?php
    }
}
}





// 
// 
// insertion classe

@$enregister_classe=$_POST['enregister_classe'];
if(isset($enregister_classe)){
    $Designation=$_POST['Designation'];
    $IdSection=$_POST['IdSection'];
    if(
        (!empty($Designation)) &&
        (!empty($IdSection))
    ){   $sql="SELECT IdSection,Designation FRoM Classe where Designation=:Designation and IdSection=:IdSection limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':Designation'=>$Designation,
           ':IdSection'=>$IdSection
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "la classe existe deja "; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Classe(Designation,IdSect ) VALUES (:Designation,:IdSection )";
        $requete=$pdo->prepare($sql);
        $requete->execute([
           ':Designation'=>$Designation,
           ':IdSection'=>$IdSection
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }else{ ?>
 
 <script>alert("vous devez remplir tous les champs")</script>

        <?php
    }
}
}






// 
// 
// insertion enregistrer_paie

@$enregistrer_paie=$_POST['enregistrer_paie'];
if(isset($enregistrer_paie)){
    $IdInscrip=$_POST['IdInscrip'];
    $MontChiff=$_POST['MontChiff'];
    $MontLett=$_POST['MontLett'];
    $MotifPaie=$_POST['MotifPaie'];
    $DatePaie=$_POST['DatePaie'];
    if(
         (!empty($IdInscrip))&&
        (!empty($MontChiff)) &&
        (!empty($MontLett))&&
        (!empty($MotifPaie)) &&
        (!empty($DatePaie))
    ){   $sql="SELECT IdInscrip FROM Paiement where IdInscrip=:IdInscrip and MotifPaie=:MotifPaie limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
            ':MotifPaie'=>$MotifPaie
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "le paiement existe  deja"; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Paiement(IdInscrip,MontChiff,MontLett,MotifPaie,DatePaie ) VALUES (:IdInscrip,:MontChiff,:MontLett,:MotifPaie,:DatePaie)";
        $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
           ':MontChiff'=>$MontChiff,
           ':MontLett'=>$MontLett,
           ':MotifPaie'=>$MotifPaie,
           ':DatePaie'=>$DatePaie
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }else{ ?>
 
 <script>alert("vous devez remplir tous les champs")</script>

        <?php
    }
}
}



// 
// 
// insertion inscription

@$enregistrer_ins=$_POST['enregistrer_ins'];
if(isset($enregistrer_ins)){
    $IdEleve=$_POST['IdEl'];
    $IdInscrip=$_POST['IdInscrip'];
    $IdClasse=$_POST['IdCl'];
    $DateInscription=$_POST['DateInscrip'];
    $AnneeInscription=$_POST['AnneeInscrip'];
    if(
         (!empty($IdInscrip))&&
        (!empty($IdEleve)) &&
        (!empty($IdClasse))&&
        (!empty($DateInscription)) &&
        (!empty($AnneeInscription))
    ){   $sql="SELECT IdInscrip,IdEl, DateInscription, AnneeInscription,IdClasse FROM Inscrire  where IdEl=:IdEl  AND IdInscrip=:IdInscrip  limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
           ':IdEl'=>$IdEleve
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "l'eleve existe  deja dans cette classe"; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
        $sql= "INSERT INTO Inscrire(IdInscrip,IdEl,IdCl,DateInscrip,AnneeInscrip ) VALUES (:IdInscrip,:IdEl,:IdCl,:DateInscrip,:AnneeInscrip)";
        $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
           ':IdEl'=>$IdEleve,
           ':IdCl'=>$IdClasse,
           ':DateInscrip'=>$DateInscription,
           ':AnneeInscrip'=>$AnneeInscription
        ]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }else{ ?>
 
 <script>alert("vous devez remplir tous les champs")</script>

        <?php
    }
}
}



// 
// insertion enregistrer_evaluation

@$enregistrer_eva=$_POST['enregistrer_eva'];
if(isset($enregistrer_eva)){
    $IdInscrip=$_POST['IdInscrip'];
    $IdCours=$_POST['IdCour'];
    $Cotes=$_POST['Cotes'];
    $CoteMax=$_POST['CoteMax'];
    $Periode=$_POST['Periode'];
    $DateEv=$_POST['DateEv'];
    if(
         (!empty($IdInscrip))&&
        (!empty($IdCours)) &&
        (!empty($Cotes))&&
        (!empty($CoteMax)) &&
        (!empty($Periode)) &&
        (!empty($DateEv))
    ){   $sql="SELECT IdInscrip,IdCours FROM Evaluer where IdInscrip=:IdInscrip and IdCours=:IdCours  and Periode=:Periode limit 1";
        $requete=$pdo->prepare($sql);
        $requete->execute([
            ':IdInscrip'=>$IdInscrip,
            ':IdCours'=>$IdCours,
            ':Periode'=>$Periode
        ]);
        $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
        if(count($tab)>=1){
               $erreur= "l'evaluation de ce cours dans cette periode existe  deja"; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
         </div> 
         <?php
         }elseif(count($tab)==0){
            if($Cotes>$CoteMax){
                $erreur= "les cotes doivent etre inferieur ou egal a la maximum"; ?>
               <div class="alert alert-danger resultat">
              <?= $erreur ?>
              <?php
            }else{
        $sql= "INSERT INTO Evaluer(IdInscrip,IdCours,Periode,Cotes,CoteMax,DateEv ) VALUES (?,?,?,?,?,?)";
        $requete=$pdo->prepare($sql);
        $requete->execute([$IdInscrip,$IdCours,$Periode,$Cotes,$CoteMax,$DateEv]);
        $resultat=$requete;
        if($resultat){
            $resultat="Enregistrement reusi";
            ?>
        <div class="alert alert-success resultat">
                        <?= $resultat ?>
                   </div> 
                   <?php
        }
    }
}
 
}else{ 
    $erreur= "les champs sont vides"; 
    ?> 
 <div class="alert alert-danger resultat">
    <?= $erreur ?>
</div> 

    <?php
 }
}














































?>

<style>
     .alert{
         margin-top:5px;
     }
</style>
