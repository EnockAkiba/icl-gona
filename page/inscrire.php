<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Inscrire un eleve</button>
          <button type="submit" name="resultat" class="btn btn-warning">Liste des eleves inscrits</button>
          <?Php    if(isset($_POST['enregistrer_ins'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>

<div class="container tb">
     <div class="tt">
<h4> 
  <?php   
     $sql="SELECT * FROM Inscrire";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> Eleves deja inscrire</h4>  
</div>
<hr>
     <table class="table table-striped">
            <thead>
                 <tr>
                      <th scope="col"> Matricule</th>
                      <th scope="col"> Nom eleve</th>
                      <th scope="col"> Designation classe</th>
                      <th scope="col"> Date d'inscription</th>
                      <th scope="col"> Année scolaire</th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                     <?php 
                     $sql=" SELECT Inscrire.IdInscrip, Eleve.Nom, Classe.Designation ,Inscrire.DateInscrip, Inscrire.AnneeInscrip from Eleve,Inscrire, Classe WHERE Inscrire.IdEl=Eleve.IdEleve and Inscrire.IdCl=Classe.IdCl
                      order by Inscrire.IdInscrip desc";
                     $requete=$pdo->prepare($sql);
                     $requete->execute();
                     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                      foreach($tab as $data){
                           $IdInscrip=$data['IdInscrip'];
                         $Nom=$data['Nom'];
                         $Designation=$data['Designation'];
                         $DateInscrip=$data['DateInscrip'];
                         $AnneeInscrip=$data['AnneeInscrip'];
                        
                     ?>
                    <td scope="row"> <?= $IdInscrip ?></td>
                    <td scope="row"> <?= $Nom ?></td>
                    <td scope="row"> <?= $Designation ?></td>
                    <td scope="row"> <?= $DateInscrip ?></td>
                    <td scope="row"> <?= $AnneeInscrip ?></td>
                    <th> <a href="../page_modifier/inscrire.php?id=<?= $IdInscrip ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>
                          <form action="../page_supprimer/inscrire.php" method="post">
                               <input type="hidden" name="idinscrire" value="<?= $IdInscrip ?>">
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
                <h2 class="form-text"> INSCRIPTION</h2>
                <a href="eleve.php" class="btn btn-danger"> X</a>
                </div>
                <div class="group-form">
                    <label for="">Matricule d'eleve</label> <br>
                    <input type="text" name="IdInscrip" id="" class="form-control">
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for="">Selectionner un eleve</label> <br>
                 <select name="IdEl" id="" class="form-control">
                    <?php 
                    $sql="SELECT IdEleve,Nom from Eleve order by Eleve.IdEleve desc";
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
                 <input type="datetime-local" name="DateInscrip" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> AnneeInscrip</label> <br>
                 <select name="AnneeInscrip" class="form-control">
                       <option value="2020-2021">2020-2021</option>
                       <option value="2021-2022">2021-2022</option>
                       <option value="2022-2023">2022-2023</option>
                 </select>
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="enregistrer_ins" class="btn btn-success bt">ENGERISTER</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php 
   endif ;
  if(isset($_POST['resultat'])): ?>
     <div class="container login resultat">
     <div class="row">
        <div class="col-12">
            <form action="../etatSortie/resultatEleve/pdf.php" method="post" class="form">
                <h2 class="form-text"> IMPRIMER  LISTE D'INSCRIPTION</h2> <hr>
                <br>
                 <label for="">CLASSE</label><br>
                 <select name="IdCl" id="" class="form-control">
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
                 </select>  <br>
                 <label for="">ANNEE SCOLAIRE</label><br>
                 <select name="AnneeInscrip" class="form-control">
                       <?php 
                       for($i=2020; $i<=2023; $i++){?>
                       <option value="<?= $i ?>"><?= $i ?></option>
                       <?php }
                       ?>
                       <option value="2020-2021">2020-2021</option>
                       <option value="2021-2022">2021-2022</option>
                       <option value="2022-2023">2022-2023</option>
                 </select><br>
                 <button type="submit" name="resultat" class="btn btn-success">IMPRIMER</button> 
                 <a href="inscrire.php" class="btn btn-danger">ANNULER</a>
                    <br>
            </form>
            <br>
        </div>
    </div>
    </div>
 <?php endif;
 ?>
   <style>
        .bt{
             margin:10px;
        }
        .tb{
            width: 900px;
        }
   </style>
