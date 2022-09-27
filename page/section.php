<?php 
 require 'header.php';
 require '../fonction/pdo.php';
?>
<div class="container titre">
<form action="" class="form fo" method="post">
          <button type="submit" name="show_formulaire" class="btn btn-primary">Ajouter la Section</button>
          <?Php    if(isset($_POST['enregister_section'])){
                    require '../fonction/insertion.php';
                     }
                   ?>
        </form>  <hr>
</div>
<div class="container tb">
    <?php
     $sql="SELECT * FROM Section";
     $requete=$pdo->prepare($sql);
     $requete->execute();
     $tab=$requete->fetchAll(PDO::FETCH_ASSOC);
     $nombre= count($tab);
?>
    <?= $nombre ?> Section</h4>  
     <table class="table table-striped">
            <thead>
                 <tr>
                      <th scope="col"> Id section </th>
                      <th scope="col"> Designation de la section </th>
                      <th>action 1</th>
                      <th>action 2</th>
                 </tr>
            </thead>
            <tbody>
                <tr> <?php
                foreach($tab as $data){
                           $IdSection=$data['IdSection'];
                         $DesigSection=$data['Designation'];
                     ?>
                    <td scope="row"> <?= $IdSection ?></td>
                    <td scope="row"> <?= $DesigSection ?></td>
                    <th> <a href="../page_modifier/section.php?id=<?= $IdSection ?>" class="btn btn-warning"> Modifier</a> </th>
                    <th>  <form action="../page_supprimer/section.php" method="post">
                               <input type="hidden" name="idsection" value="<?= $IdSection ?>">
                               <button type="submit" name="show" class="btn btn-danger"> Supprimer</button>
                          </form></th>
                </tr>
                <?php } ?>
            </tbody>
     </table>
</div>
<?php if(isset($_POST['show_formulaire'])): ?>
<div class="container login">
     <div class="row">
        <div class="col-12">
            <form action="" method="post" class="form eleve">
                <div class="titre">
                <h2 class="form-text"> ajouter une section</h2>
                <a href="section.php" class="btn btn-danger"> X</a>
                </div>
                
                 <div class="group-form">
                     <div class="item">
                 <label for=""> Designation de la section</label> <br>
                 <input type="text" name="DesigSection" id="" class="form-control" placeholder=""> 
                 </div>
                 <!-- fin item -->
                </div>
                <!-- group one -->
                <button type="submit" name="enregister_section" class="btn btn-success">ENGERISTER</button>
            </form>
        </div>
    </div>
    </div>
    <?php endif ?>
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