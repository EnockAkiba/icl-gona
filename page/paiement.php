<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter un paiement</button>
          <button type="submit" name="resultat" class="btn btn-warning">Liste de paiement</button>
          <?Php    if(isset($_POST['enregistrer_paie'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>

<div class="container tb">
     <div class="tt">
<h4> 
  <?php   
     $sql="SELECT * FROM Paiement";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> paiement deja effectués</h4>  
</div>
<hr>
     <table class="table table-striped">
            <thead>
                 <tr>
                     <th scope="col"> Id paiement</th>
                      <th scope="col"> Nom eleve</th>
                      <th scope="col"> Montant en Chiffre</th>
                      <th scope="col"> Montant en Lettre</th>
                      <th scope="col"> Motif de Paiement</th>
                      <th scope="col"> Date de Paiement</th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                     <?php 
                     $sql=" SELECT Paiement.* , Eleve.Nom, Eleve.PostNom from Eleve,Paiement, Inscrire where Paiement.IdInscrip=Inscrire.IdInscrip and Eleve.IdEleve=Inscrire.IdEl";
                     $requete=$pdo->prepare($sql);
                     $requete->execute();
                     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                      foreach($tab as $data){
                           $IdPaie=$data['IdPaie'];
                         $Nom=$data['Nom'];
                         $PostNom=$data['PostNom'];
                         $MontChiff=$data['MontChiff'];
                         $MontLett=$data['MontLett'];
                         $MotifPaie=$data['MotifPaie'];
                         $DatePaie=$data['DatePaie'];
                        
                     ?>
                    <td scope="row"> <?= $IdPaie ?></td>
                    <td scope="row"> <?= $Nom . "   ". $PostNom?></td>
                    <td scope="row"> <?= $MontChiff ?>$</td>
                    <td scope="row"> <?= $MontLett ?></td>
                    <td scope="row"> <?= $MotifPaie ?></td>
                    <td scope="row"> <?= $DatePaie ?></td>
                    <th> <a href="../page_modifier/paiement.php?id=<?= $IdPaie ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>
                          <form action="../page_supprimer/paiement.php" method="post">
                               <input type="hidden" name="IdPaie" value="<?= $IdPaie ?>">
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
                <h2 class="form-text"> PAIEMENT</h2>
                <a href="paiement.php" class="btn btn-danger"> X</a>
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
                            <option value="<?= $data['IdInscrip']?>"><?= $data['Nom'] . " ".$data['PostNom']." matricule: ".$data['IdInscrip']?></option>
                            <?php
                        }
                        ?>
                    </select>
            
                </div>
                 <div class="group-form">
                     <div class="item">
                 <label for="">Montant en Chiffre</label> <br>
                <input type="number" name="MontChiff" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for="">Montant en Lettre</label> <br>
                <input type="text" name="MontLett" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                </div>
                <div class="group-form">
                     <div class="item">
                 <label for=""> Motif de Paiement</label> <br>
                 <input type="text" name="MotifPaie" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for=""> Date de Paiement</label> <br>
                <input type="date" name="DatePaie" id="" class="form-control">
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group two -->

            <div class="col-6">
                <button type="submit" name="enregistrer_paie" class="btn btn-success bt">ENGERISTER</button>
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
             <form action="../etatSortie/listePaiement/pdf.php" method="post" class="form">
                 <h2 class="form-text"> IMPRIMER  LA LISTE DE PAIEMENT</h2> <hr>
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
                  <option value="2020-2021">2020-2021</option>
                       <option value="2021-2022">2021-2022</option>
                       <option value="2022-2023">2022-2023</option>
                  </select><br>
                  <button type="submit" name="resultat" class="btn btn-success">IMPRIMER</button> 
                  <a href="paiement.php" class="btn btn-danger">ANNULER</a>
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
