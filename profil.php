<!DOCTYPE html>
<html>
<head>
<title>Profil - The BLOG</title>
  <?php include "head.php";?> 
</head>
<body>
<header>
    <?php include "header.php";?>     
</header>
<?php include "ham_menu.php";?>
  <main>  
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
$password_old = $result[0]['password'];
$mail = $result[0]['email'];

    /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
if(isset($_POST['envoyer'])){
    $newlogin = $_POST['login'];
    $old_password = $_POST['password_old'];
    $newpassword = $_POST['password'];
    $newpassword2 = $_POST['password2'];
    $newemail = $_POST['email'];
    $newemail2 = $_POST['email2'];


    if (isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['password_old'])){
        if(password_verify($old_password, $password_old) == true){
            if($newpassword == $newpassword2 ){
                $npassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $req = mysqli_query($conn,"UPDATE `utilisateurs` SET password = '$npassword' WHERE login = '$user'" );
            }
            else{
                array_push($errors, "Veuillez saisir un mot de passe identique");
            }
        }
        else{
            array_push($errors, "Veuillez saisir l'ancien mot de passe");
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
        
        
    }

    if(count($errors) == 0 && isset($_POST['envoyer'])){

        $_SESSION['login'] = $login;
        header('location: index.php');
    }
}
?>

<h1 class="sm_title"><i>The BLOG.  </i></h1> 
	<h3 class="p_i_intro_txt"> Veuillez remplir les champs suivants pour modifier votre profil </h3>
    <container class="p_i_container2">
        <form class = "p_i_form" action="" method="post">
                <label for="login">Login :</label>
                <input type="text" value= "<?php echo $user; ?>" name="login"/></br>
                <label for="email">e-mail :</label>
                <input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}; ?>" name="email"/></br>
                <label for="email2">e-mail confirmation :</label>
                <input type="email" placeholder= "e-mail confirmation" name="email2"/></br>
          <br>
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
        <form class = "p_i_form" action="" method="post">
                <label for="password">Ancien Password:</label>
                <input type="password" value="<?php if(isset($_POST['password_old'])){echo $_POST['password_old'];}; ?>" name="password_old"></br>
                <label for="password">Password :</label>
                <input type="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}; ?>" name="password"></br>
                <label for="password2">Password confirmation :</label>
                <input  type ="password" placeholder="password confirmation" name="password2"/></br>
          <br>
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
            </main>

<footer>
    <?php include "footer.php";?> 
</footer>
</html>