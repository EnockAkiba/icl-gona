<?php  session_start();
error_reporting(0);
if(isset($_SESSION['utilisateur'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/css/bootstrap.min.css">
    <link rel="stylesheet" href="../include/style.css?t=<?= time() ?>">
    <link rel="stylesheet" href="../include/all.css?t=<?= time() ?>">
    <title>ICL Goma</title>
</head>
<body>
<header>
         <div class="container-fluid titre">
             <h1>ICL Goma</h1>
         </div>
         <div class="container">
             <nav>
                 <li> <a href="eleve.php" class="btn btn-secondary"> ELEVE</a> </li>
                 <li> <a href="cours.php" class="btn btn-primary">COURS</a> </li>
                 <li> <a href="section.php" class="btn btn-success">SECTION</a> </li>
                 <li> <a href="classe.php" class="btn btn-warning">CLASSE</a> </li>
                 <li> <a href="inscrire.php" class="btn btn-secondary">INSCIPTION</a> </li>
                 <li> <a href="paiement.php" class="btn btn-primary">PAIEMENT</a> </li>
                 <li> <a href="evaluation.php" class="btn btn-success">EVALUATION</a> </li>
                 <li> <a href="../deconnexion.php" class="btn btn-outline-danger">DECONNEXION</a> </li>
             </nav>
           <span>  user: <?= $_SESSION['utilisateur']?> en ligne </span>
         </div>
         <hr>
    </header>
<style>
    span{
        display: inline-block;
        margin-top: 20px;
        color:green;
    }
</style>
    
</body>
</html>
<?php
}else{
    header("location:../index.php");
    exit;
    die;
} ?>
