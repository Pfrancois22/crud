<?php session_start();

if(isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('connect.php');
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $produit = $query->fetch();


    if(!$produit){
        $_SESSION['erreur'] = "Ce produit n'existe pas";
        header('Location: index.php');
    }

}else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Détail du produit</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détail du produit <?= $produit['produit'] ?> </h1>
                <p>ID. <?= $produit['id'] ?></p>
                <p>Produit. <?= $produit['produit'] ?></p>
                <p>Prix. <?= $produit['prix'] ?></p>
                <p>Nombre disponible. <?= $produit['nombre'] ?></p>
                <p><a href="index.php">Retour Liste produit </a> <a href="edit.php?id=<?= $produit['id'] ?>"> Modifier le produit</a> </p>
            </section>
        </div>
    </main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>