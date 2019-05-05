<?php 
if (isset($_POST['submit'])) {



          $superficie=$_POST['supreficie'];
            $ville=$_POST['ville'];
            if ($superficie&&$ville) 
            {
                $servername = "localhost";
                    $username = "root";
                    $password = "";
                    

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=compo", $username, $password);
                        
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                       
                                  
                                
                     }
                    catch(PDOException $e)
                        {
                        echo "Connection failed: " . $e->getMessage();
                        }



                $conn->query('UPDATE villes SET superficie="$superficie" WHERE  nom="$ville" ');

            }
            
}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table des habitants par continents</h2>
<form class="form-group" method="POST">
    <input class="form-control" name="supreficie" id="supreficie" placeholder="Entrez une Taille en km2">
    <div class="row">
        <div class="col-md-6">
            <select class="form-control" name="ville" id="ville">
            <option >Abidjan</option>
            <option >Bouake</option>
            <option >Yamoussoukro</option>
            </select>
        </div>
        <div class="col-md-6">
                <input type="submit" name="submit" id="submit" value="modifier la superficie" class="btn btn-primary"></input>

        </div>
    </div>
  </form>








  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ville</th>
        <th scope="col">superficie</th>
        <th scope="col">pays</th>
      </tr>
    </thead>
    <tbody >
      <?php


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=compo", $username, $password);
                        
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                       
                                  
                                
                     }
                    catch(PDOException $e)
                        {
                        echo "Connection failed: " . $e->getMessage();
                        }
                        
                        if (!empty($_GET['id'] )) {

                          $id=$_GET['id'];
                        }
                        
                       
                        


                    $statement=$conn->prepare('SELECT villes.nom,villes.superficie,pays.nom AS pays FROM `villes` INNER JOIN pays ON id_pays=pays.id WHERE id_continent=? ') ;
                    $statement->execute(array($id));


                    while ($row=$statement->fetch()) {


                    echo'<tr>';
                     echo'<td>'.$row['nom'].'</td>';
                     echo' <td>'.$row['superficie'].'</td>';
                     echo' <td>'.$row['pays'].'</td>';
                echo'</tr>';





                     }


       ?>
      
    </tbody>
  </table>
</div>



</body>
</html>
