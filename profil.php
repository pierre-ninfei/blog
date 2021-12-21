<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Profil</title>
</head>
<header>
    <?php include "header.php";?>     
</header>

<?php

// si l'utilisateur n'est pas connecté

if(!isset($_SESSION['login'])){
    header('location: connexion.php');
}

/*  ////////// définition des variables \\\\\\\\\ */
$errors = array();
$user = $_SESSION['login'];

/*  ///////// connexion base de donées et requètes  \\\\\\\\  */

include 'db_link.php';
$requete = mysqli_query($conn,"SELECT * FROM utilisateurs WHERE login = '$user'");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);

    /*  ///////// varriables   \\\\\\\\  */
$login = $result[0]['login'];  
$password = $result[0]['password'];
$mail = $result[0]['email'];

    /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
if(isset($_POST['envoyer'])){
    $newlogin = $_POST['login'];
    $newpassword = $_POST['password'];
    $newpassword2 = $_POST['password2'];
    $newemail = $_POST['email'];
    $neweamil2 = $_POST['email2'];

    if (isset($_POST['password']) && isset($_POST['password2'])){
        if($newpassword == $newpassword2 ){
            $npassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $req = mysqli_query($conn,"UPDATE `utilisateurs` SET password = '$npassword' WHERE login = '$user'" );
        }
        else{
            array_push($errors, "Veuillez saisir un mot de passe identique");
        }
    }
    if (isset($_POST['email']) && isset($_POST['email2'])){
        if($newemail == $newemail2 ){
            $req = mysqli_query($conn,"UPDATE `utilisateurs` SET email = '$newemail' WHERE login = '$user'" );
        }
        else{
            array_push($errors, "Veuillez saisir une adresse mail identique");
        }
    }

   if (isset($_POST['login']) && $_POST['login'] != $result[0]['login']){   
        $login = $_POST['login'];
        $newlogin = mysqli_query($conn,"UPDATE `utilisateurs` SET login = '$login' WHERE login ='$user' ");
        $_SESSION['login'] = $login;

        header('location: profil.php');
    }
}
?>
<body>
    <container class="mcontainer">
        <form class = "mformprofil" action="" method="post">
            <div>
                <label for="login">Login :</label></br>
                <input type="text" value= "<?php echo $user; ?>" name="login"/></br>
            </div>
            <div>
                <label for="password">Password :</label></br>
                <input type="password" value="<?php echo $password ?>" name="password"></br>
            </div>
            <div>
                <label for="password2">Password confirmation :</label></br>
                <input  type ="password" placeholder="password confirmation" name="password2"/></br>
            </div>
            <div>
                <label for="email">e-mail :</label></br>
                <input type="email" value="<?php echo $mail ?>" name="email"/></br>
            </div>
            <div>
                <label for="email2">e-mail confirmation :</label></br>
                <input type="email" placeholder= "e-mail confirmation" name="email2"/></br>
            </div><br>
            <div class="button">
                <button type="submit" name= "envoyer">Soumettre</button>
            </div>
            <?php if(count($errors) > 0) : ?>
                <div>
            <?php foreach($errors as $error) : ?>
                <p style="color:red;"> <?php echo $error; ?> </p>
            <?php endforeach ?>
                </div>
            <?php endif ?>
        </form>
    </container>
</body>

<footer>
    <?php include "footer.php";?> 
</footer>

</html>


