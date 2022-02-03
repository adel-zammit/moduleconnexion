<?php
session_start();
//CONNEXION DB
$db = new PDO('mysql:host=localhost;dbname=moduleconnexion;', 'root','' );


// VAR $user_id = ID SESSION EN COURS
$user_id = $_SESSION['id'];
$login = $_SESSION['login'];
echo $user_id;

// SI $USER_ID IL Y A , ALORS ON CREER LA REQUÊTE
if(isset($user_id)){
    $requete = "SELECT * FROM utilisateurs WHERE id =  $user_id ";

    //PREPARATION DE LA REQUETE
    $query = $db->prepare($requete);
//EXECUTION DE LA REQUETE
    $query->execute(array($user_id));
    $resultat = $query ->fetch();

    echo 'Bienvenue ' .  $resultat['login'];
}

// SI LA SESSION EST INACTIVE (empty = vide) DIRIGE CONNEXION.PHP
if(empty($user_id)){
    header('Location : connexion.php');
    exit;
}


if($login == 'admin' ){

    ?>
    <button><a href="admin.php"> Espace Admin.</a></button>

    <?php
}

?>







<?php



$requete = "SELECT u.password FROM utilisateurs AS u WHERE id = ?";
$query = $db->prepare($requete);
$query->execute(array($user_id));
$passwordVerif = $query->rowCount();

$requete = "SELECT login FROM utilisateurs ";
$query = $db->prepare($requete);
$query->execute();
$login_existant = $query->fetchAll();









    if(isset($_SESSION['id'])){
    var_dump($_SESSION['id']);

    ?>

    <!DOCTYPE HTML>
    <html>
<body>

    <head>

    </head>

<header>
        <nav class="navbar">
    <button><a href="index.php">Accueil<a/></button>
    <button><a href="profil.php">Profil<a/></button>
    <button><a href="deco.php">Déconnexion<a/></button>

    <?php
    }else{

    ?>


    <button><a href="index.php">Accueil<a/></button>
    <button><a href="inscription.php">Inscription<a/></button>
    <button><a href="connexion.php">Connexion<a/></button>

    <?php
    }


    ?>
    </nav>

</header>

    <body>


    <form action="" method="post" style="text-align: center">

        <label for="newlog">Login :</label>
        <input type="text" name="newlogin" placeholder="<?php echo $resultat['login']?>"<br/>

        <label for="newprenom">Prénom :</label>
        <input type="text" name="prenom" placeholder="<?php echo $resultat['prenom']?> "

        <label for="newnom">Nom :</label>
        <input type="text" name="nom" placeholder=" <?php echo $resultat['nom']?> "><br/>

        <label for="password">Mot De Passe Actuel :</label>
        <input type="password" name="password" placeholder="Mot De Passe">

        <label for="new_pass">Nouveau Mot de Passe :</label>
        <input type="Rpassword" name="new_password" placeholder="Nouveau Mot De Passe">

        <label for="conf_password">Confirmer Mot de Passe :</label>
        <input type="password" name="conf_password" placeholder="Confirmer Mot De Passe">

        <button type="submit" name="valider">Valider</button>

    </form>


</body>
<footer>

</footer>
    </html>


<?php


    if(isset($_POST['valider'])){
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $newprenom = htmlspecialchars($_POST['prenom']);
        $newnom = htmlspecialchars($_POST['nom']);
        $passnow = htmlspecialchars($_POST['password']);
        $newpass = htmlspecialchars($_POST['new_password']);
        $confpass = htmlspecialchars($_POST['conf_password']);

var_dump($login_existant);
//$login_existant "login éxistant ": "ok ";

        if ($login_existant[0]["login"] != $newlogin  ) { // si le login existe on passe dans ce if





    if( !empty($newlogin)  &&  !empty($newprenom)  && !empty($newnom) && !empty($passnow)  && !empty($newpass)  && !empty($confpass)){



        $db = new PDO('mysql:host=localhost;dbname=moduleconnexion;', 'root','' );
        $reqUpdate = "UPDATE utilisateurs SET  login =  '" .$newlogin."' , prenom = '".$newprenom."' , nom = '".$newnom. "' , password = '" .$newpass."' WHERE id = '$user_id' "  ;


        $query = $db->prepare($reqUpdate);

        //EXECUTION DE LA REQUETE
        $query->execute();
        $resultat = $query ->fetch( PDO::FETCH_ASSOC);



    }

        else if($passwordVerif == 1 &&$newpass == $confpass){

            $requete = "UPDATE utilisateurs SET  password = ? WHERE id = ?";
            $query = $db->prepare($requete);
            $query->execute(array($newpass,$user_id));



        }






    }else{
            echo "login existant";
        }
    }

?>