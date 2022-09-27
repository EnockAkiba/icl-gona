<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter un Cours</button>
          <?Php    if(isset($_POST['enregister_cours'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>
<div class="container tb">
<div class="tt">
<h4> 
  <?php   
     $sql="SELECT * FROM Cours";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> Cours</h4>  
</div>
     <table class="table table-striped ">
            <thead>
                 <tr>
                      <th scope="col"> Id Cours </th>
                      <th scope="col"> Designation du Cours </th>
                      <!-- <th scope="col"> Maximum du Cours</th> -->
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                foreach($tab as $data){
                           $IdCours=$data['IdCours'];
                         $DesigCours=$data['DesigCours'];
                        //  $MaxCours=$data['MaxCours'];
                     ?>
                    <td scope="row"> <?= $IdCours ?></td>
                    <td scope="row"> <?= $DesigCours ?></td>
                    <!-- <td scope="row"> <?= $MaxCours ?></td> -->
                    <th> <a href="../page_modifier/cours.php?id=<?= $IdCours ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>  <form action="../page_supprimer/cours.php" method="post">
                               <input type="hidden" name="idcours" value="<?= $IdCours ?>">
                               <button type="submit" name="show" class="btn btn-danger"> Supprimer</button>
                          </form></th>
                </tr>
                <?php }?>
            </tbody>
     </table>
</div>
<?php 
   if(isset($_POST['show_formulaire'])):
   ?>
    
<div class="container login">
     <div class="row">
        <div class="col-12">
            <form action="" method="post" class="form eleve">
            <a href="cours.php" class="btn btn-danger"> X</a>
                <div class="titre">
                <h2 class="form-text"> ajouter un Cours</h2>
                </div>
                
                 <div class="group-form">
                     <!-- <div class="item"> -->
                 <label for=""> Designation du cours</label> <br>
                 <input type="text" name="DesigCours" id="" class="form-control" placeholder=""> 
                 <!-- </div> -->
                 <!-- fin item -->
                 <!-- <div class="item">
                 <label for=""> maximum du cours</label> <br>
                 <input type="number" name="MaxCours" id="" class="form-control" placeholder=""> 
                 </div> -->
                 <!-- fin item -->
                </div>
                <!-- group one -->

              
                <button type="submit" name="enregister_cours" class="btn btn-success">ENGERISTER</button>
              <br>
              <br>
            </form>
        </div>
    </div>
    </div>
     <?php
     endif
?>
<style>
    .tb{
        width:700px;
    }  
        .bt{
             margin:10px;
        }

</style>
  