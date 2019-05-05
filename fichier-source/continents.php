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
  <h2>Table des continents</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Action</th>
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

                    $statement=$conn->query('SELECT id, nom,superficie FROM continents') ;
                    

                    while ($row=$statement->fetch()) {


                          echo '<tr>' ;
                          echo'<td>'.$row['nom'].'</td>';
                          echo '<td>'.$row['superficie'].'</td>';
                          echo'<td>';
                          echo ' <a href="pays.php?id='.$row['id'].'"  class="btn btn-primary">Voir pays</a>';
                          echo'<a href="villes.php?id='.$row['id'].'"  class="btn btn-success">Voir villes</a>';
                          echo'<a href="habitants-'.$row['id'].'.php?id='.$row['id'].'"  class="btn btn-danger">Voir habitants</a>';
                          echo'</td>';
                          echo' </tr>';
                         



                       }   





       ?>


      
      
    </tbody>
  </table>
</div>

</body>
</html>
