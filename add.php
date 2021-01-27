<?php session_start();

require_once('connect.php');
if(isset($_POST)){
    if(     isset($_POST['produit']) && !empty($_POST['produit'])
        &&  isset($_POST['prix']) && !empty($_POST['prix'])
        &&  isset($_POST['nombre']) && !empty($_POST['nombre'])){


            $produit = strip_tags($_POST['produit']);
            $prix = strip_tags($_POST['prix']);
            $nombre = strip_tags($_POST['nombre']);

            $sql = "INSERT INTO `liste` ( `produit`, `prix`, `nombre` ) VALUES (:produit, :prix, :nombre);";

            $query = $db->prepare($sql);

            $query->bindValue(':produit', $produit, ':prix', PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

            $query->execute();

            $_SESSION['message'] = "Le produit à bien été rajouté";
            // header('Location: index.php');

    }
    // else{
    //     $_SESSION['erreur'] = "Le formulaire est incomplêt";
    // }
}
require_once ('close.php');

// require_once('connect.php');

// if(isset($_POST)){
//     if(      isset($_POST['produit']) && !empty($_POST['produit'])
//         &&   isset($_POST['prix']) && !empty($_POST['prix'])
//         &&   isset($_POST['nombre']) && !empty($_POST['nombre'])){

//             $produit = strip_tags($_POST['produit']);
//             $prix = strip_tags($_POST['prix']);
//             $nombre = strip_tags($_POST['nombre']);

//             $sql = "INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);";

//             $query = $db->prepare($sql);

//             $query->bindValue(':produit', $produit, PDO::PARAM_STR);
//             $query->bindValue(':prix', $prix, PDO::PARAM_STR);
//             $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

//             $query->execute();
//             $_SESSION['message'] = "Produit ajouté avec succès !";
//             header('Location: index.php');
//         }
// }

// require_once('close.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">



    <title>CRUD ajouter produits</title>
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

                <h2>Ajouter un produit</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="produit">Produit</label>
                        <input type="text" id="produit" name="produit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="number" id="nombre" name="nombre" class="form-control">
                    </div>

                    <button class="btn btn-primary">Envoyer</button>

                </form>
            </section>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>