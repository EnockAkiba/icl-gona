<?php   session_start();
   require 'fonction/pdo.php';
   if(isset($_POST['connexion'])){
   $username=$_POST['username'];
   $password=md5($_POST['password']);
   $sql="SELECT idutilisateur from utilisateur where nom_utilisateur=:nom_utilisateur and motdepasse=:motdepasse limit 1";
   $query=$pdo->prepare($sql);
   $query->execute([':nom_utilisateur'=>$username, ':motdepasse'=>$password]);
   $tab=$query->fetchAll(PDO::FETCH_ASSOC);
   if(count($tab)==1){
       $_SESSION['utilisateur']=$username;
       header("location:page/eleve.php");
   }else{ ?>
       <script>
           alert("mouvaise logni")
       </script>

    <?php
        //    header("location:index.php");
   }
   }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css?t=<?= time()?>">
    <title>ICL Goma</title>
</head>
<body>
    <header>
         <div class="container-fluid titre">
             <h1>ICL Goma</h1>
         </div>
         <div class="container col-xm-12 cont">
             <nav class="col-xm-12 nav">
                 <li> <a href="index.php" class="btn btn-secondary"> ACCUEIL</a> </li>
                 <li> <a href="#propos" class="btn btn-secondary"> A PROPOS</a> </li>
                 <form action="" method="post" class="fo">
                 <li>  <button type="submit" name="resultat" class="btn btn-secondary">RESULTAT</button> </li>
                 <li>
                     <button type="submit" name="show_form" class="btn btn-secondary">SE CONNECTER </button> 
                 </form>
             </nav>
         </div>
         <hr>
    </header>
    <div class="container main">
            <h2>INSTITUT COMMUNAUTAIRE DU LAC</h2>
            <h5>BIENVENUE SUR NOTRE SITE</h5>
    </div>
    <div class="container propos">
         <h1> A PROPOS DE NOUS</h1>
         <p>
         L’Institut Communautaire du Lac est un établissement privé ; une association sans but lucratif, créée par l’initiative des parents dans les années 90.
              l'école c'est toute institution visant à produire un citoyen, jouissant d'une autonomie intellectuelle en le formant à travers de la présentation d'un enseignement.
              L'école nous apprend aussi à être moins timides. C'est aussi là que nous apprenons à jouer avec d'autres, à faire d'autres sports, à avoir des amies.
              J'aime l'école car c'est là que nous apprenons à travailler et que nous rencontrons les amies.
            </p>
    </div>
    <div class="container content" id="propos">
      <div class="col-6 left">
      <h4> 2022 BEST ICL/GOMA </h4>
      <h2>ICL/Goma</h2>
         <p> 
L’éducation de base pour tous est l’ensemble de connaissances acquises par l’enfant dès le niveau primaire jusqu’au secondaire général. Bonne ambiance de travail ou d'équipe choix varié de sports,Relations elèves-professeur,la fraternité qui regne au sein de notre établissement,la valeur humaine de l'établissement,la qualité de l'éducation et du nouveau d'étude. la limite entre qualité et defaut n'est pas toujours très nette et certaines faiblesse deviennent parfois des points forts.
        </p> 
          <h4>LA RENTREE SCOLAIRE</h4>
          <p> <strong> La toute première chose à faire pour vous assurer que la rentrée scolaire a l'ICL aura bien lieu pour votre enfant, c’est d’assurer son inscription.</strong>
          </p>
          <h4>PROCLAMMATION </h4>
          <p>
          Il vaut mieux inscrire son enfant à l’école privée si on veut lui donner toutes les chances de pouvoir rédiger un court texte dans un français acceptable à la fin de ses études secondaire. <strong> Au par avant dans notre Institut Commmunautaire du Lac la proclamation des eleves c'étais par les voix respiratoire en difficulté mais grace à la nouvelle technologie informatique les parents ou les responsables des nos eleves seront capable de voir chacun(e) les resultats de son enfant a partir de chez lui grace a notre site.</strong>
          </p>
      </div>
      <div class="col-6 right">
          
          <img src="include/images/icl.jpg" alt=""class="img">
      </div>
      
    </div>
     <div class="container history" id="history">
     <h1> NOTRE HISTOIRE</h1>
         <p class="p">Historique de l’entreprise
L’Institut Communautaire du Lac est un établissement privé ; une association sans but lucratif, créée par l’initiative des parents dans les années 90 ; d’où surnommée aujourd’hui école des parents. 
Les hommes passent mais les institutions restent ; quelques années plus tard, l’école fut présidée par Monsieur Paul MUTAKA actuel Président du Conseil de Gestion, dirigée Monsieur Alexis BYAMUNGU, actuel Préfet des études.
Jadis l’Institut Communautaire du Lac organisait deux options, la pédagogie générale et la technique commerciale, mais aujourd’hui, elle en organise quatre sections qui sont :
•	La pédagogie, option Pédagogie générale
•	La commerciale ; Option Technique commerciale
•	La sociale, option Technique sociale.  
L’Institut Communautaire du Lac implantée dans la ville de Goma, commune de Goma, quartier Le Volcans en face de l’Institut Supérieur de Commerce.	Elle et une école voisine à celle du Complexe Scolaire de la Concorde. Domaines d’intervention
L’Institut Communautaire du Lac intervient dans le domaine éducatif qui a comme objectif de :
-	Formation des futurs intellectuels et cadres de notre pays ;
-	Contribuer à l’éducation des enfants de la ville de Goma en général mais aussi à résoudre le problème de scolarisation et de l’éducation des enfants des parents de cette école
-	 Créations des emplois 
 Organisation administrative 
L’Institut Communautaire du Lac est une association créée conformément aux textes légaux ci-après :
-	Décret-loi du 17 août 1959, relatif à la liberté des associations ;
-	Décret-loi du 18 septembre 1965, relatif aux associations sans but lucratif ;
-	Ordonnance loi n°79-051 du 06 mars 1979 portant création du Haut-Commissariat général au plan, telle que modifiée et complétée par l’ordonnance loi n°83 du 18 mars 1983.
Arrêté ministériel n° CABMIN/AFFSO/06/06/95 fixant les conditions de service et centre privé sociale.
</p>
         <div class="row bas">
          <div class="col-6 left">
              <img src="include/images/pencil.jpg" alt="" class="img" width="600px">
          </div>
         <div class="col-6 right">
         <ul>
             <li>2022</li>
             <p>Emploi du temps, progressions et programmations, plannings, organisation de la classe, questions administratives,
             Les éditions La Classe dévoilent leur programmation éditoriale pour l'année scolaire 2022-2023. Au programme : des fichiers et dossiers pratiques pensés par des enseignants, des lectures suivies et rallyes lectures pour stimuler les élèves,... 
             </p>
             <li>2021</li>
             <p>faire l’inventaire des notions à travailler sur la période en Français et Mathématiques (jusque là, rien d’exceptionnel), évaluer le nombre de séances à attribuer à chaque notion..</p>
             <li>2019</li>
             <p>Ce grand jour est le reflet d’une année scolaire entière partagée. On joue, les élèves écrivent des mots gentils, font des dessins et barbouillent le tableau de toutes les couleurs pour dire combien je suis une maîtresse géniale. Hihi, pendant l’année, ils n’ont pas toujours dit ça.</p>
             <li>2018   </li>
             <p>Le rapport d’évaluation permet au comité d’expertise ou à l’organe décisionnaire de fonder son appréciation. Il doit présenter les rubriques suivantes: 1) La page de présentation précisant: L’intitulé de la chose évaluée. Les noms et qualité des personnes ayant contribué à la rédaction</p>
         </ul>
         </div>
         </div>
     </div>
     <?php if(isset($_POST['show_form'])): ?>
     <div class="container login">
     <div class="row">
        <div class="col-12">
            <form action="" method="post" class="form">
                <h2 class="form-text"> Se connecter</h2>
                 <label for=""> NOM UTILISATEUR</label><br>
                 <input type="text" name="username" id="" class="form-control" placeholder="Entrer le nom d'utilisateur"> 
                 <label for=""> MOT DE PASSE</label><br>
                 <input type="password" name="password" id="" class="form-control" placeholder="Entrer le mot de passe"> <br>
                 <button type="submit" name="connexion" class="btn btn-success">CONNEXION</button>
                 <p>Se Connecter pour voir plus de fonctionnalités</p>
            </form>
        </div>
    </div>
    </div>
    <!-- resultat -->

 <?php endif;
  if(isset($_POST['resultat'])): ?>
     <div class="container login resultat">
     <div class="row">
        <div class="col-12">
            <form action="etatSortie/resultat/pdf.php" method="post" class="form">
                <h2 class="form-text"> RESULTAT DE FIN DE L'ANNEE</h2> <hr>
                <p>Pour voir le resultat d'eleve, Vous devez taper son Matrcule scolaire</p>
                <br>
                 <label for="">MATRICULE D'ELEVE</label><br>
                 <input type="text" name="IdInscrip" id="" class="form-control" placeholder="ENTRER LE MATRICULE D'ELEVE "> <br>
                 <button type="submit" name="resultat" class="btn btn-success">RECHERCHER</button>
                 <p> Pour la raison de securité de nos resultats, l'id scolaire doit etre cachez et confidentiel</p>
            </form>
        </div>
    </div>
    </div>
 <?php endif;
 ?>

     <footer>
        <h6> copy right by pseudo Ir Tomatala WOTONO Nixon 2022</h6>
     </footer>
    
</body>
</html>
<style>
    ul p{
        width: 500px;
        text-align: justify;
        word-break: break-all;
    }
    .resultat{
        right: 35%;
    }
    @media screen and (max-width:500px) {
        .cont{
            width: 100%;
        }
        .cont .nav{
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .cont .nav li a{
            width: 100%;
        }
        .cont .nav .fo{
            display: flex;
            flex-direction: column;
        }
        .cont .nav .fo li button{
            width: 100%;
        }
        .main h2{
           font-size: 1.3em;
        }
        .main h5{
           font-size: 1.2em;
        }
        #propos{
            display: flex;
            flex-direction: column;
        }
        #propos  .left{
            width: 100%;
        }
        #propos  .right .img{
            width: 350px;
            height: 300px;
        }
        .bas{
            display: flex;
            width: 400px;
            flex-direction: column;
        }
        .bas .left .img{
            width: 350px;
        }
        .bas .right{
            width: 400px;
            margin: auto;
        }
        .bas .right ul{
            width: 99%;
            margin: auto;
        }
        .bas .right ul p{
            width:90%;
        }
        .login{
            width: 90%;
        }
        .login{
    background:rgb(255, 255, 255);
    position: absolute;
    top: 15%;
    right: 10px;
    width: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 1px 2px 5px black;
    }
    .login .form{
    width: 100%;
    }
    .login .form h2{
    text-align: center;
    font-size: 1.4em;
    }
    .login .form label{
    color: darkblue;
    }
    footer{
    background: rgba(0, 0, 0, 0.311);
    width: 400px;
    }
    footer h6{
    text-align: center;
    color: white;
    font-size: 15px;
        }
    }
</style>