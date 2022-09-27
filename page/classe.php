<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
      <form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter une classe</button>
          <?Php    if(isset($_POST['enregister_classe'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form> 
</div>

<div class="container tb">
<div class="tt">
<h4> 
  <?php   
     $sql="SELECT Classe.IdCl, Classe.Designation as nom_classe , Section.Designation as nom_section  FROM Classe , Section where Classe.IdSect=Section.IdSection";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> Classe</h4>  
</div>
     <table class="table table-striped ">
            <thead>
                 <tr>
                      <th scope="col"> Id Classe </th>
                      <th scope="col"> Designation Classe </th>
                      <th scope="col"> Nom section</th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                foreach($tab as $data){
                           $IdCl=$data['IdCl'];
                         $nom_classe=$data['nom_classe'];
                         $nom_section=$data['nom_section'];
                     ?>
                    <td scope="row"> <?= $IdCl ?></td>
                    <td scope="row"> <?= $nom_classe ?></td>
                    <td scope="row"> <?= $nom_section ?></td>
                    <th> <a href="../page_modifier/classe.php?id=<?= $IdCl ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>  <form action="../page_supprimer/classe.php" method="post">
                               <input type="hidden" name="idclasse" value="<?= $IdCl ?>">
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

                <div class="titre">
                <a href="classe.php" class="btn btn-danger"> X</a>
                <h2 class="form-text"> Ajouter une classe</h2>
                </div>
                
                 <div class="group-form">
                     <div class="item">
                 <label for=""> Designation de la classe</label> <br>
                 <input type="text" name="Designation" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                 <div class="item">
                 <label for="">Selectionner une section</label> <br>
                 <select name="IdSection" id="" class="form-control">
                     <option > </option>
                    <?php 
                    $sql="SELECT IdSection,designation from Section";
                    $requete=$pdo->prepare($sql);
                    $requete->execute();
                    $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tab as $data){
                        ?>
                        <option value="<?= $data['IdSection'] ?>"> <?= $data['designation'] ?></option>
                        <?php
                    }
                    ?>
                 </select> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->

              
                <button type="submit" name="enregister_classe" class="btn btn-success">ENGERISTER</button>
              
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
     .login{
         padding-bottom: 10px;
     }
</style>
  