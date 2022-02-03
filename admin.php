<?php
// DEBUT DE LA SESSION
session_start();

// Si $login & $password strictement = 'admin'
if($_SESSION['login']!= 'admin'){
    header('location: profil.php');
}



// CONNEXION DB EN PDO
$db = new PDO('mysql:host=localhost;dbname=moduleconnexion;', 'root','' );

$membre = "SELECT * FROM utilisateurs";
$request = $db->prepare($membre);
$request->execute();
$resultat = $request ->fetchAll(PDO::FETCH_ASSOC);


?>




<!DOCTYPE html>
<html>
<head>
    <title>Admin. Panel</title>
    <meta charset="utf-8">
</head>

<header>
    <button><a href="index.php">Accueil<a/></button>
    <button><a href="profil.php">Profil<a/></button>
    <button><a href="deco.php">Déconnexion<a/></button>
</header>

<body>

<tbody>
<table>

        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>

        </tr>

    <?php foreach ($resultat as $resultas){ ?>

        <tr>
            <td><?php echo $resultas['id']?></td>
            <td><?php echo $resultas['login']?></td>
            <td><?php echo $resultas['prenom']?></td>
            <td><?php echo $resultas['nom']?></td>



        </tr>
   <?php } ?>

</table>
</tbody>



</body>
</html>



