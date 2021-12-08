<?php include('phpspe/inscription&connexion_back.php'); ?>
<?php
session_start();
// if(isset($user)){
// $_SESSION['login'] = "paul";
// $_SESSION['password'] = "12345";
// $_SESSION['email'] = "paul@abc.fr";}
 

/*  ///////// connexion base de donées et requètes  \\\\\\\\  */
$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$user'");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);

$user = $_SESSION['login'];

    /*  ///////// varriables   \\\\\\\\  */
$login = $result[0]['login'];  
$password = $result[0]['password'];
$password2 = $result[0]['password2'];
$mail = $result[0]['email'];
$mail2 = $result[0]['email2']; 

    /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
if(isset($_POST['envoyer'])){
    $newlogin = $_POST['login'];
    $newpassword = $_POST['password'];
    $newpassword2 = $_POST['password2'];
    $newemail = $_POST['email'];
    $neweamil2 = $_POST['email2'];

    if (isset($_POST['password']) && isset($_POST['password2'])){
        if($newpassword == $newpassword2 ){
            $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET password = '$newpassword' WHERE login = '$user'" );
        }
    }
    if (isset($_POST['email']) && isset($_POST['email2'])){
        if($newemail == $newemail2 ){
            $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET email = '$newemail' WHERE login = '$user'" );
        }
    }

   if (isset($_POST['login']) && $_POST['login'] != $result['login']){   
    $login = $_POST['login'];
    $newlogin = mysqli_query($bdd,"UPDATE `utilisateurs` SET login = '$login' WHERE login ='$user' ");
    $_SESSION['login'] = $login;
    header('location: profil.php');
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="index.css">
  <title>Pofil</title>
</head>
<body>
    <header>
        <?php //include('header.php'); ?>
    </header>

    <container class="mcontainer">
        <form class = "mformprofil" action="" method="post">
        <div>
            <label for="login">Login :</label></br>
            <input type="text" value= "<?php echo $user ;  ?>" name="login"/></br>
        </div>
        <div>
            <label for="password">Password :</label></br>
            <input type="password" value="<?php $_SESSION['login'] ?>" name="password"></br>
        </div>
        <div>
            <label for="password2">Password confirmation :</label></br>
            <input  placeholder="password confirmation" name="password2"/></br>
        </div>
        <div>
            <label for="email">e-mail :</label></br>
            <input type="text" value="<?php echo $_SESSION['email'] ?>" name="email"/></br>
        </div>
        <div>
            <label for="email2">e-mail confirmation :</label></br>
            <input  placeholder= "e-mail confirmation"name="email2"/></br>
        </div><br>
        <div class="button">
        <button type="submit" name= "envoyer">Soumettre</button>
    </div>

</form>

    
    </container>



    <footer>
        <?php include "footer.php";?> 
    </footer>

</body>
</html>


