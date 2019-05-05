<?php 






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
  <h2>liste des pays par continents</h2>
<form class="form-group">
    <input class="from-control" name="ville1" placeholder="Entrez un nom">
     <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <button class="btn btn-primary">Ajouter 3 villes</button>
      
  </form>




  <table class="table">
    <thead>
      <tr>
        <th>nom pays</th>
        <th>superficie</th>
        <th>nombre de villes</th>
      </tr>
    </thead>
    <tbody>
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


                         
                       
                        


                    $statement=$conn->prepare('SELECT continents.nom, pays.nom,pays.superficie ,pays.id FROM pays LEFT JOIN continents ON continents.id=id_continent WHERE id_continent=? ') ;
                    $statement->execute(array($id));


                    $nombre=$conn->prepare('SELECT COUNT(*) FROM villes INNER JOIN pays ON pays.id=id_pays WHERE id_continent=1');
                    
                    $nombre->execute(array());
                    
                    while ($row=$statement->fetch()) {


                    echo'<tr>';
                     echo'<td>'.$row['nom'].'</td>';
                     echo' <td>'.$row['superficie'].'</td>';
                     echo' <td>'.$id.'</td>';
                echo'</tr>';





                     }


       ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
