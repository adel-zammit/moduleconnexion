<?php
session_start();

//SI $_POST DIFFERENT DE VIDE ALORS,
if(!empty($_POST)){
    // htmlspecialchars
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    // SELECT (all) * (de) FROM utilisateurs (condition) WHERE  'colonne' login = variables $login et $password
    $request = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'";
    // CONNEXION BDD
    $db = mysqli_connect("localhost", "root", "", "moduleconnexion");
    // CREATION REQUETE CONNEXION DB + SELECT *
    $query = mysqli_query($db,$request);

    // mysqli_fetch_assoc — Récupère une ligne de résultat sous forme de tableau associatif
    $users = mysqli_fetch_assoc($query);

    // Si, tant que, dans le tableau assoc, l'id de session = id du tableau assoc
    if(isset($users)){
        $_SESSION['id'] = $users['id'];
        $_SESSION['login'] = $users['login'];
        $_SESSION['prenom'] = $users['prenom'];




        //Alors redirection vers
        header('location: index.php');
    }
    // Si $login & $password strictement = 'admin'
    if($login == 'admin' && $password =='admin'){
        header('location: admin.php');
    }
// Sinon afficher :
    else{
        echo 'Indentifiant ou mot de pass incorrect.';
    }
}
// Si la $_SESSION est différent de vide (si quelqu'un est connecté) redirection vers son profil
if(!empty($_SESSION['id'])){
    header('location: profil.php');
}






// CREATION DE LA REQUETE QUI ENTRE LES INFOS EN BDD

?>

<!DOCTYPE HTML>
<html>


<head>

</head>

<header>



</header>


<body>



<form action="connexion.php" method="POST">

            <h1>Connexion</h1>

    <label for="login">Login :</label>
    <input type="text" name="login">

    <label for="mdp">Password :</label>
    <input type="password" name="password">

    <button type="submit" name="boutton">Connexion</button>


</form>

</body>

<footer>
    Copyright all rights reserved.
</footer>


</body>
</html>