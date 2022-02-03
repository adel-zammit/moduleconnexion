<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<?php
// SI JE CLIC SUR 'boutton' SUBMIT $_POST LES INFOS EN BDD
    if(isset($_POST['boutton'])){

        //JE DEFINIE LES VARIABLES EN FONCTION DES "name" DE MES INPUT
        $login=$_POST['login'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_password'];

        //SI LES INPUTS SON BIEN ENTREE
    if($login && $prenom && $nom && $password && $conf_password)
    {
        // ET SI LE MOT DE PASSE = CONFIRMATION MOT DE PASSE
    if($password == $conf_password){
        // ALORS, CONNEXION A LA BDD
        $db = mysqli_connect("localhost", "root", "", "moduleconnexion");
        // CREATION DE LA REQUETE QUI ENTRE LES INFOS EN BDD
        $request="INSERT INTO utilisateurs (login,prenom,nom,password) VALUES ('$login','$prenom','$nom','$password')";
        //CREATION & EXECUTION REQUEST
        $query=mysqli_query($db,$request);
        //REDIRECTION PAGE
        header('location: connexion.php');
    }
        //ELSE SINON
    else{
        echo 'Mot de Passe et Confirmation Mot de Passe ne correspondent pas.';}
    }
        //ELSE SINON
    else{
        echo 'Veuillez remplire correctement tout les champs.';}


    }



?>




<body>

<head>

</head>
<header>


</header>

<main>

        <h1>Inscription</h1>

    <form action="inscription.php" method="post">

    <label for="login">Login :</label>
    <input type="text" name="login" placeholder="Login">

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" placeholder="Prénom">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" placeholder="Nom">

    <label for="password">Password :</label>
    <input type="password" name="password" placeholder="password">

     <label for="conf_password">Confirmation Password</label>
        <input type="password" name="conf_password" placeholder="Confirmer Password">

    <button type="submit" value="inscription" name="boutton">Valider</button>

</form>
</main>

<footer></footer>
</body>
</html>