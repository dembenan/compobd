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
  <h2>Table des habitants de l'Afrique</h2>

  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>commune</th>
        <th>solde</th>
        <th>numéro</th>
        <td>action</td>
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
                        
                       
                        


                    $statement=$conn->prepare('SELECT quartiers.id,villes.id,pays.id,continents.id, habitants.nom,habitants.prenom,communes.nom AS commune,habitants.solde,habitants.numero FROM habitants,communes,quartiers,villes,pays,continents
                                    WHERE id_quartier=quartiers.id 
                                    AND id_commune=communes.id
                                    AND id_ville=villes.id
                                    AND id_pays=pays.id
                                    AND id_continent=continents.id
                                    AND id_continent=?  GROUP BY habitants.nom') ;
                    $statement->execute(array($id));


                    while ($row=$statement->fetch()) {


                      echo'<tr>';
                     echo'<td>'.$row['nom'].'</td>';
                     echo'<td>'.$row['prenom'].'</td>';
                     echo' <td>'.$row['commune'].'</td>';
                     echo' <td>'.$row['solde'].'</td>';
                     echo'<td>'.$row['numero'].'</td>';
                     echo'<td><a class="btn btn-danger"> supprimer</a>  </td>';
                echo'</tr>';



                    }








        



       ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
