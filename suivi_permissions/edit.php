
<?php



include('connection.php');


if(isset($_GET['edit'])){

$numMatricule = $_GET['edit'];


$sqlu="SELECT * FROM permissions WHERE numMatricule='$numMatricule' limit 0,1";
$result = mysqli_query($connection,$sqlu);
$row = mysqli_fetch_array($result);



}

if(isset($_POST['numMatricule2'])){



  $id=$_POST['id'];
  $numMatricule= $_POST['numMatricule2'];
  $nom=$_POST['nom2'];
  $prenoms=$_POST['prenoms2'];
  $type=$_POST['type2'];
  $dateDepart=$_POST['dateDepart2'];
  $nombreDeJour=$_POST['nombreDeJour2'];
  $justification=$_POST['justification2'];
  $cause=$_POST['cause2'];
  $dateDemande=$_POST['dateDemande2'];


  //$sql = "UPDATE permissions SET numMatricule='$numMatricule' WHERE id = $id";
$sql ="UPDATE permissions SET numMatricule='$numMatricule', nom='$nom', prenoms='$prenoms', type='$type', dateDepart='$dateDepart', nombreDeJour='$nombreDeJour', justification='$justification', cause='$cause', dateDemande='$dateDemande' WHERE id='$id'";
  $result=mysqli_query($connection,$sql);
  mysqli_fetch_assoc($result);

  echo "<meta http-equiv='refresh' content='0;url=index.php'>";

 if($result){

 }else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
 }


}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Suivi de permission</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

    <style media="screen">

    </style>

  </head>
  <body>
    <div class="container">

      <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="index.php"><h5>BIENVENUE</h5></a></li>
      <li><a href="guidedutilisateur.html"><h5>GUIDE D'UTILISATEUR</h5></a></li>


    </ul>

    </div>

    <div class="jumbotron jumbotron-fluid headerStyle text-center">
           <span><h2 >SUIVI DES PERMISSIONS DES EMPLOYE(E)S</h2></span>

         </div>




    <div class="container">



      <form  method="POST" action="edit.php">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
          <label >Numéro matricule</label>
          <input type="varchar" class="form-control" aria-describedby="emailHelp" name="numMatricule2" value="<?php echo $row['numMatricule'] ?>">

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" name="nom2" value="<?php echo $row['nom'] ?>">

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">prenoms</label>
          <input type="text" class="form-control"   aria-describedby="emailHelp" name="prenoms2" value="<?php echo $row['prenoms'] ?>">

        </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
          <label >Type (Absence/congé)</label>
          <!--<input type="text" class="form-control"  name="type2" value="> -->
          <select class="form-control" id="type" name="type2" value="<?php echo $row['type'] ?>" >
            <option>Absence</option>
            <option>congé</option>
          </select>

        </div>

        <div class="form-group">
          <label> Date de départ </label>
          <input type="date" class="form-control"  name="dateDepart2" value="<?php echo $row['dateDepart'] ?>">

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nombre de jours sollicités</label>
          <input type="number" class="form-control"  name="nombreDeJour2" value="<?php echo $row['nombreDeJour'] ?>">

        </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">
          <label for="exampleInputEmail1">Justification / N° de décision</label>
          <input type="text" class="form-control"  name="justification2" value="<?php echo $row['justification'] ?>">

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Causes</label>
          <input type="text" class="form-control"  name="cause2" value="<?php echo $row['cause'] ?>">

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Date de la demande</label>
          <input type="date" class="form-control"  name="dateDemande2" value="<?php echo $row['dateDemande'] ?>">

        </div>

          </div>
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        </div>
        <br>

        <input class="btn btn-primary btn-lg" type="submit" name="enregistrer" value="ENREGISTRER" style="margin-left:40%;">


      </form>



    </div>


  </body>
</html>
