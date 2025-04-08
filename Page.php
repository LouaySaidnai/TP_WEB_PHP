<?php 
include_once "autoloader.php";
$etudiant_1=new Etudiant("aymen",array(11, 13, 18, 7,10,13,2,5,1));
$etudiant_2=new Etudiant("skander",array(15, 9, 8, 16));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<style>
    .table-container {
        display: flex; 
        gap: 20px; 
    }
    table {
        width: 200px;
        height: 150px; 
        table-layout: fixed;
        text-align: center;
    }

    td, th {
        border: 1px solid black;
        padding: 10px;
    }
</style>
<div class="table-container">
<body>
    <?php
    $etudiant_1->affichetable();
    $etudiant_2->affichetable();
    ?>
</body>
</div>
</html>