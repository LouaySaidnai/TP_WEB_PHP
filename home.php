<?php 
    include_once "autoloader.php";
    $db = ConnexionBD::getInstance();
    $query="select * from student";
    $reponse=$db->query($query);
    $etudiants=$reponse->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>La liste</title>
</head>
<body>
<table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">date de naissance</th>
      <th>details</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($etudiants as $etudiant){ ?>
    <tr>
    <td><?= $etudiant->id ?></td>
      <td><?= $etudiant->name ?></td>
      <td><?= $etudiant->date_de_naissance ?></td>
      <td><a href="etudiantsListe.php?id=<?= $etudiant->id ?>">details</a></td>
    </tr>
    <?php }; ?>
  </tbody>
</table>
</body>