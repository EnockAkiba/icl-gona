<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter un eleve</button>
          <!-- <button type="submit" name="show_formulaire" class="btn btn-warning">  PALMARES D'ELEVE</button> -->
          <button type="submit" name="resultat" class="btn btn-warning">Palmares des eleves</button>
          <!-- <a href="" class="btn btn-warning"> PALMARES D'ELEVE </a> -->
          <?Php    if(isset($_POST['enregistrer_eleve'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>

<div class="container tb">
     <div class="tt">
<h4> 
  <?php   
     $sql="SELECT * FROM Eleve";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> Eleves deja enregistrer</h4>  
</div>
<hr>
     <table class="table table-striped">
            <thead>
                 <tr>
                      <th scope="col"> id eleve</th>
                      <th scope="col"> Nom</th>
                      <th scope="col"> PostNom</th>
                      <th scope="col"> Prenom</th>
                      <th scope="col"> Sexe</th>
                      <th scope="col"> Nom du Pere</th>
                      <th scope="col"> Nom de la Mere</th>
                      <th scope="col"> Lieu de Naissance</th>
                      <th scope="col"> Date de Naissance</th>
                      <th scope="col"> Adresse</th>
                      <th scope="col"> Numero du Responsable</th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                     <?php 
                     $sql=" SELECT * FROM Eleve order by Eleve.IdEleve desc";
                     $requete=$pdo->prepare($sql);
                     $requete->execute();
                     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                      foreach($tab as $data){
                           $ideleve=$data['IdEleve'];
                         $Nom=$data['Nom'];
                         $PostNom=$data['PostNom'];
                         $Prenom=$data['Prenom'];
                         $Sexe=$data['Sexe'];
                         $DateNaiss=$data['DateNaiss'];
                         $NomPere=$data['NomPere'];
                         $NomMere=$data['NomMere'];
                         $LieuNaiss=$data['LieuNaiss'];
                         $Adresse=$data['Adresse'];
                         $NumResp=$data['NumResp'];
                     ?>
                    <td scope="row"> <?= $ideleve ?></td>
                    <td scope="row"> <?= $Nom ?></td>
                    <td scope="row"> <?= $PostNom ?></td>
                    <td scope="row"> <?= $Prenom ?></td>
                    <td scope="row"> <?= $Sexe ?></td>
                    <td scope="row"> <?= $NomPere ?></td>
                    <td scope="row"> <?= $NomMere ?></td>
                    <td scope="row"> <?= $LieuNaiss ?></td>
                    <td scope="row"> <?= $DateNaiss ?></td>
                    <td scope="row"> <?= $Adresse ?></td>
                    <td scope="row"> <?= $NumResp ?></td>
                    <th> <a href="../page_modifier/eleve.php?id=<?= $ideleve ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>
                          <form action="../page_supprimer/eleve.php" method="post">
                               <input type="hidden" name="ideleve" value="<?= $ideleve ?>">
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
                <h2 class="form-text"> ajouter un eleve</h2>
                <a href="eleve.php" class="btn btn-danger"> X</a>
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for=""> Nom</label> <br>
                 <input type="text" name="Nom" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> PostNom</label> <br>
                 <input type="text" name="PostNom" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Prenom</label> <br>
                 <input type="text" name="Prenom" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Sexe</label> <br>
                 <select name="Sexe" class="form-control">
                      <option > selectionner  le sexe</option>
                      <option value="M">M</option>
                      <option value="F">F</option>
                 </select>
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Nom du Pere</label> <br>
                 <input type="text" name="NomPere" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Nom de la Mere</label> <br>
                 <input type="text" name="NomMere" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group three -->
                        
                <div class="group-form">
                     <div class="item">
                 <label for=""> Lieu de Naissance</label> <br>
                 <input type="text" name="LieuNaiss" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Date de Naissance</label> <br>
                 <input type="date" name="DateNaiss" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group four -->

                <div class="group-form">
                     <div class="item">
                 <label for=""> Adresse</label> <br>
                 <input type="text" name="Adresse" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Numero du Responsable</label> <br>
                 <input type="text" name="NumResp" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group five -->
                <button type="submit" name="enregistrer_eleve" class="btn btn-success bt">ENGERISTER</button>
          
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
             <form action="../etatSortie/parlmare/pdf.php" method="post" class="form">
                 <h2 class="form-text"> IMPRIMER  LA PALMARES DES ELEVES</h2> <hr>
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
                  <label for="">ANNEE SCOLAIRE </label><br>
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
                  <a href="eleve.php" class="btn btn-danger">ANNULER</a>
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
   </style>
