<?php session_start();

require_once('connect.php');

$sql = 'SELECT * FROM `liste`';

$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

require_once ('close.php');
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">



    <title>CRUD liste produits</title>
</head>
<body>
    <div class="container">

        <h1>CRUD janvier 2021</h1>
        <div class="row">
            <section class="col-12">

                <?php

                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert"> '. $_SESSION['erreur'] . ' </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>

                <h2>Liste des produits</h2>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Nombre</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $produit){
                        ?>
                                    <tr>
                                        <td><?= $produit['id']  ?></td>
                                        <td><?= $produit['produit']  ?></td>
                                        <td><?= $produit['prix']  ?></td>
                                        <td><?= $produit['nombre']  ?></td>
                                        <td><a href="detail.php?id=<?= $produit['id'] ?>">Voir produit</a></td>

                                    </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>

                <a href="add.php" class="btn btn-primary" >Ajouter u produit</a>

            </section>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>