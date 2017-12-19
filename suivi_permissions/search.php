
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recherche</title>

    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">


  </head>
  <body>
     <h1 class="container" margin-left="40"> Resultat de votre recherche</h1>



  </body>
</html>
<script type="text/javascript">

function myFunction(){

  window.print();
}




</script>



<?php

$search_value=$_POST["search"];
include('connection.php');

if($connection->connect_error){
    echo 'Connection Failed: '.$connection->connect_error;
    }else{
        $sql="SELECT * FROM permissions WHERE numMatricule like '$search_value'";

        $res=$connection->query($sql);

        echo "<table border='2px solid black' class='container rounded table-hover table-bordered table-striped'>";
        echo "<tr> <td> Numéro matricule</td> <td>Nom</td> <td>Prénoms</td> <td>Type (Absence/congé)</td> <td>Date de départ</td> <td>Nombre de jours sollicités</td> <td>justification</td> <td>Cause</td> <td>Date de la Demande</td></tr>";

        while($row=$res->fetch_assoc()){
          //  echo 'Numero Matricule:  '.$row["numMatricule"];
        echo "<tr><td>{$row['numMatricule']}</td><td>{$row['nom']}</td><td>{$row['prenoms']}</td><td>{$row['type']}</td><td>{$row['dateDepart']}</td><td>{$row['nombreDeJour']}</td><td>{$row['justification']}</td> <td>{$row['cause']}</td><td>{$row['dateDemande']}</td> </tr>";


            }

        echo"</table>";

        }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
    <br><br>

    <button class="printStyle btn btn-primary btn-lg" type="button" onclick="myFunction()" name="print" id="print">Imprimer</button>

  </body>
</html>
