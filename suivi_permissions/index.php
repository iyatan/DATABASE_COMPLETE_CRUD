
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
   <body >

    <script src="jquery.min.js"></script>
     <script src="bootstrap.js"></script>
     <script src="jquery.confirm.js"></script>


     <script type="text/javascript">

     function ConfirmDelete()
        {
            var x = confirm("Voulez vous vraiment supprimer?");
            if (x)
            return true;
             else
             return false;
}

     </script>

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


  <br>

          <form method="post" id="mainForm" >

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
              <label >Numéro matricule</label>
              <input type="varchar" class="form-control" id="numMatricule" aria-describedby="emailHelp" name="numMatricule">

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nom</label>
              <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom">

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">prenoms</label>
              <input type="text" class="form-control" id="prenoms"  aria-describedby="emailHelp" name="prenoms">

            </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
              <label >Type (Absence/congé)</label>
              <!--<input type="text" class="form-control" id="type" name="type" > -->
              <select class="form-control" id="type" name="type">
                <option>Absence</option>
                <option>congé</option>
              </select>

            </div>

            <div class="form-group">
              <label> Date de départ </label>
              <input type="date" class="form-control" id="dateDepart" name="dateDepart">

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nombre de jours sollicités</label>
              <input type="number" class="form-control" id="nombreDeJour" name="nombreDeJour">

            </div>

              </div>

              <div class="col-md-4">

                <div class="form-group">
              <label for="exampleInputEmail1">Justification / N° de décision</label>
              <input type="text" class="form-control" id="justification" name="justification">

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Causes</label>
              <input type="text" class="form-control" id="cause" name="cause">

            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Date de la demande</label>
              <input type="date" class="form-control" id="dateDemande" name="dateDemande" >

            </div>

              </div>
            </div>


          </form>
 <br>


 <button name="ajouter" id="addbtn" type="button submit" form="mainForm" class="btn btn-primary btn-lg">Ajouter</button>

 <br><br>

 <form class="" action="search.php" method="post">
   <input class="" type="text" name="search" />
    <input class="btn btn-primary btn-sm"  type="submit" value="Chercher" placeholder="Entrez un Numbero matricule" />

 </form>

 <br><br>


</div>


   </body>
 </html>



 <?php

 //$connection = mysqli_connect("localhost","root","misericorde","Permisssions");

 include('connection.php');

 //echo mysqli_connect_error();
 //or die('Error connecting to MySQL server.');
 $sql = "SELECT * FROM permissions";// issues
 $result = mysqli_query($connection,$sql);// issues

 $add = "INSERT INTO permissions (numMatricule, nom, prenoms, type, dateDepart, nombreDeJour,justification ,cause, dateDemande)
 VALUES('$_POST[numMatricule]','$_POST[nom]','$_POST[prenoms]','$_POST[type]','$_POST[dateDepart]','$_POST[nombreDeJour]','$_POST[justification]','$_POST[cause]','$_POST[dateDemande]')";

 if (mysqli_query($connection, $add)) {

 }


 if(isset($_POST['ajouter'])){

   echo "<meta http-equiv='refresh' content='0;url=index.php'>";

 }





echo "<table border='2px solid black' class='container rounded table-hover table-bordered table-striped'>";
echo " <tr> <td><b>Numéro matricule<b/></td> <td><b>Nom<b/></td> <td><b>Prénoms<b/></td> <td><b>Type(Absence ou congé)<b/></td> <td><b>Date de départ<b/></td> <td><b>Nombre de jours sollicités<b/></td> <td><b>justification<b/></td> <td><b>Cause<b/></td>
 <td><b>Date de la Demande<b/></td><td><b>Modifier</b></td><td><b>Supprimer</d></td></tr>";

while ($row=mysqli_fetch_assoc($result)) {

  echo  "<tr><td>{$row['numMatricule']}</td><td>{$row['nom']}</td><td>{$row['prenoms']}</td><td>{$row['type']}</td><td>{$row['dateDepart']}</td><td>{$row['nombreDeJour']}</td><td>{$row['justification']}</td> <td>{$row['cause']}</td><td>{$row['dateDemande']}</td><td>

  <a class=\"btn btn-primary btn-md\" href=edit.php?edit=".$row['numMatricule'].">Modifier</a>


   </td><td><a class=\"btn btn-primary btn-md\" href=index.php?id=".$row['numMatricule']." Onclick=\"return ConfirmDelete();\">Supprimer</a></td> </tr>";
?>


<?php
}


 ?>


 </table>

 <?php
 $delTask = "DELETE FROM permissions WHERE numMatricule='$_GET[id]'";


 if(mysqli_query($connection,$delTask)){

}

if(isset($_GET['id'])){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";



}

 ?>
