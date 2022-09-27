<?php 
 require 'header.php';
 require '../fonction/pdo.php';
 error_reporting(1);
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter une evaluation</button>
          <?Php    if(isset($_POST['enregistrer_eva'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>

<div class="container tb">
     <div class="tt">
<h4> 
  <?php   
     $sql="SELECT * FROM Evaluer";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> evaluation deja enregistrées</h4>  
</div>
<hr>
     <table class="table table-striped">
            <thead>
                 <tr>
                     <th scope="col"> Id evaluer</th>
                      <th scope="col"> Nom eleve</th>
                      <th scope="col"> cours</th>
                      <th scope="col"> cotes</th>
                      <th scope="col"> max cours</th>
                      <th scope="col"> Periode</th>
                      <th scope="col"> Date d'evaluation</th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                     <?php 
                     $sql=" SELECT Evaluer.* , Eleve.Nom, Eleve.PostNom, Cours.DesigCours from Eleve,Evaluer, Inscrire, Cours where Evaluer.IdInscrip=Inscrire.IdInscrip and Eleve.IdEleve=Inscrire.IdEl and Cours.IdCours=Evaluer.IdCours";
                     $requete=$pdo->prepare($sql);
                     $requete->execute();
                     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                      foreach($tab as $data){
                           $IdEvaluer=$data['IdEvaluer'];
                         $Nom=$data['Nom'];
                         $PostNom=$data['PostNom'];
                         $DesigCours=$data['DesigCours'];
                         $Cotes=$data['Cotes'];
                         $Periode=$data['Periode'];
                         $maximun_cotes=$data['CoteMax'];
                         $DateEv=$data['DateEv'];
                        $date=date_create($DateEv);
                        $dateConvert=date_format($date,"d/m/Y");
                     ?>
                    <td scope="row"> <?= $IdEvaluer ?></td>
                    <td scope="row"> <?= $Nom . "   ". $PostNom?></td>
                    <td scope="row"> <?= $DesigCours ?></td>
                    <td scope="row"> <?= $Cotes ?>point/</td>
                    <td scope="row"> <?= $maximun_cotes ?>point</td>
                    <td scope="row"> <?= $Periode ?>periode</td>
                    <td scope="row"> <?= $dateConvert ?></td>
                    <th> <a href="../page_modifier/evaluer.php?id=<?= $IdEvaluer ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>
                          <form action="../page_supprimer/evaluer.php" method="post">
                               <input type="hidden" name="IdEvaluer" value="<?= $IdEvaluer  ?>">
                               <button type="submit" name="show" class="btn btn-danger"> Supprimer</button>
                          </form>
                         </th>
                </tr>
                <?php }?>
            </tbody>
     </table>
     <!-- 


      -->
  
</div>
    
   <?php 
if(isset($_POST['show_formulaire'])):
?>    
<div class="container login">
     <div class="row">
        <div class="col-12">
            <form action=""  class="form eleve" method="post">
                <div class="titre">
                <h2 class="form-text"> EVALUATION</h2>
                <a href="evaluation.php" class="btn btn-danger"> X</a>
                </div>
                <div class="group-form">
                    <label for="">Nom eleve</label> <br>
                    <select name="IdInscrip" id="" class="form-control"> 
                        <option > selectionner un eleve</option>
                        <?php 
                        $sql="SELECT Inscrire.IdInscrip , Eleve.Nom , Eleve.PostNom from Eleve, Inscrire WHERE Inscrire.IdEl=Eleve.IdEleve";
                        $query=$pdo->prepare($sql);
                        $query->execute();
                        $tab=$query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($tab as $data){
                            ?>
                            <option value="<?= $data['IdInscrip']?>"><?= $data['Nom'] . " ".$data['PostNom']. ": MATRICULE =".$data['IdInscrip']?></option>
                            <?php
                        }
                        ?>
                    </select>
            
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for="">Cours </label> <br>
                 <select name="IdCour" id="" class="form-control"> 
                        <option > selectionner un cours</option>
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
                <input type="text" name="Cotes" id="" class="form-control" value=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                </div>
                <div class="group-form">
                     <div class="item">
                 <label for=""> Periode</label> <br>
                 <select name="Periode" id="" class="form-control">
                            <option ></option>
                            <option value="1">premiere periode</option>
                            <option value="2">deuxieme periode</option>
                            <option value="3">troisieme periode</option>
                            <option value="4">quatrieme periode</option>
                 </select>
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Maximum du cours</label> <br>
                 <input type="text" name="CoteMax" id="" class="form-control" value=""> 
                 </div>
                 <div class="item">
                 <label for=""> Date d'evaluation</label> <br>
                <input type="date" name="DateEv" id="" class="form-control">
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="enregistrer_eva" class="btn btn-success bt">ENGERISTER</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php 
   endif ;
           
   ?>
 
   <style>
        .bt{
             margin:10px;
        }
        .tb{
            width: 1000px;
        }
   </style>
