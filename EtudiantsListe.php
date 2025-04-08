<?php 
    include_once "autoloader.php";
    $db = ConnexionBD::getInstance();
    $id=$_GET["id"];
    $query="select * from student where id =:id";
    $reponse=$db->prepare($query);
    $reponse->execute(["id"=>$id]);
    $etudiants=$reponse->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>dtail</title>
</head>
<body>
<table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">date de naissance</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($etudiants as $etudiant){ ?>
    <tr>
    <td><?= $etudiant->id ?></td>
      <td><?= $etudiant->name ?></td>
      <td><?= $etudiant->date_de_naissance ?></td>
    </tr>
    <?php }; ?>
  </tbody>
</table>
</body>