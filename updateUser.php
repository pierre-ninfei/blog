<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>

    <?php
    session_start();
    if($_SESSION['id']['id_droits'] == 1337){
    $user = $_SESSION['login'];
    $id = $_GET['id'];
    $bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
    $req=mysqli_query($bdd,"SELECT * from utilisateurs  WHERE id = '$id' ");
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);
    $asc=mysqli_query($bdd,"SELECT * FROM `utilisateurs` ORDER BY `utilisateurs`.`id` ASC");
    
    ?>

<body>
    <header>
        <?php include "header.php";?>
    </header>


        <H2></H2>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Saisir les modifications utilisateur</h3></br>
        <div class= "articlesInputs">
        <table> 
            <form  method = "post" > 
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>

                <?php 
                            /*  ///////// mes varriables   \\\\\\\\  */
                    $userId= $res[0]['id'];
                    $login = $res[0]['login'];  
                    $password = $res[0]['password'];
                    $email = $res[0]['email'];
                    $id_droits = $res[0]['id_droits'];
                    
                        /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
                    if(isset($_POST['envoyer'])){
                    $newusername = $_POST['username'];
                    $newpassword = $_POST['password'];
                    $confpassword = $_POST['confpassword'];
                    $newemail = $_POST['email'];
                    $confemail = $_POST['confemail'];
                    $newid_droits = $_POST['droits'];
                
                    if (isset($_POST['password']) && isset($_POST['confpassword'])){
                        if($newpassword == $confpassword){
                            $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET password = '$newpassword' WHERE `id`= '$id'" );
                        }
                    }

                    if (isset($_POST['email']) && isset($_POST['confemail'])){
                        if($newemail== $confemail){
                            $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET email = '$newemail' WHERE `id`= '$id'" );
                        }
                    }

                    if (isset($_POST['droits'])){
                            $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET id_droits = '$newid_droits' WHERE `id`= '$id'" );
                            $id_droits = $newid_droits;
                            header('location: admin.php');
                    }
                
                    if (isset($_POST['name']) && $_POST['name'] != $login){   
                    $login = $_POST['name'];
                    $newusername = mysqli_query($bdd,"UPDATE `utilisateurs` SET login = '$login' WHERE `id`= '$id' ");
                    $_SESSION['name'] = $login;
                    header('location: admin.php');
                    }
    }  
      
                echo '
                <tr>
                <td>'.$userId.'</td>
                <td><input type="text" value="'.$login.'" name = "name"></td>

                </tr>'; 
                
                ?>  
                <tr>
                <th>Password</th>
                <th>Password Confirmation </th>
                </tr>

                <?php
                echo'<tr>
                <td><input type="text" value="'.$password.'" name = "password"></td>
                <td><input type="text" placeholder="entrer un nouveau password" name = "confpassword"></td>
                </tr>';
                ?>
                <tr>
                <th>Email</th>
                <th>Email Confirmation</th>
                
                </tr>
                <?php
                echo'
                <tr>
                <td><input type="text" value="'.$email.'" name = "email"></td>
                <td><input type="text" placeholder="entrer un nouveau email" name = "confemail"></td>
                
                </tr>'; 
                ?>
                <tr>
                <th>Id Droits</th>
                <th>Update</th>
                </tr>
                <?php
                echo '<tr>
                <td><select name="droits">
                <option value="">'.$id_droits.'</option>
                <option value="1337">1337-administrateur</option>
                <option value="42">42-moderateur</option>
                <option value="1">1-utilisateur</option>
                </select></td>
                <td><input name="envoyer" type="submit" value="Update"></td></tr>
                ';
                ?>
                </form> 
        </table>
    </div>
    <a class="return" href="admin.php">⬅retour</a>
    <footer>
        <?php include "footer.php";?> 
    </footer>

<?php
}
else{
    echo"<h1 class= 'title'>Acces denied</h1>";
}
?>
    
</body>
</html>