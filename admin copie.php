
<?php
session_start();
$_SESSION['id']= 42;
if($_SESSION['id'] == 42){
$users = $_SESSION['login'];
$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$req=mysqli_query($bdd,"SELECT * from utilisateurs");
$res=mysqli_fetch_all($req,MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create</title>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>
 
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

    <h3 style="text-align: center; color: white;">Saisir les informations utilisateur</h3></br>
    <div class= "articlesInputs">
        <table> 
            <form  method = "post" > 
                <tr>
                    <th>Name</th>
                    <th>Name Confirmation</th>
                </tr>

                <!-- ///////// conditions  infos utilisateurs  \\\\\\\\   -->

                <?php 
                    if(isset($_POST['envoyer'])){

                        $login = $_POST['login'];
                        $confname=  $_POST['confname'];

                        $password = $_POST['password'];
                        $confpassword=  $_POST['confpassword'];

                        $email = $_POST['email'];
                        $confemail=  $_POST['confemail'];

                        $id_droits = $_POST['droits'];
                        
                
                    if (isset($login)  && isset($confname)  && isset($password)  && isset($confpassword)  && isset($email)  && isset($confemail)  && isset($id_droits)){
                        
                
                            // comparaison login et BDD entré par user 
                            foreach($res as $user){ 
                                if (isset($_POST["login"]) && $login == $user[1] ){
                                    $taken = true;
                                    header('Location: createUser.php');
                                }
                            }
                
                    ///////////// requete pour envoyer les infos dans la bdd\\\\\\\\\\\ -->

                                if($login == $confname && $password == $confpassword && $email == $confemail && $taken == false){
                                    $req = mysqli_query($bdd,"INSERT INTO utilisateurs(login, password, email, id_droits) VALUES ('$login','$password','$email','$id_droits')");
                                    header('Location: admin.php');
                                    
                            }               
                        }
                    }  
        
                echo '
                <tr>
                <td><input type="text" placeholder="Entrer un nom" name = "login"></td>
                <td><input type="text" placeholder="Confirmer nom" name = "confname"></td>
                </tr>'; 
                
                ?>  
                <tr>
                <th>Password</th>
                <th>Password Confirmation </th>
                </tr>
                <?php
                
                echo'
                <tr>
                <td><input type="text" placeholder="Definir password" name = "password"></td>
                <td><input type="text" placeholder="Confirmer password" name = "confpassword"></td>
                </tr>';
                ?>
                <tr>
                <th>Email</th>
                <th>Email Confirmation</th>
                
                </tr>
                <?php
                echo'
                <tr>
                <td><input type="text" placeholder="Definir un email" name = "email"></td>
                <td><input type="text" placeholder="Confirmer email" name = "confemail"></td>
                </tr>'; 

                ?>
                <tr>
                <th>Droits</th>
                <th>Create</th>
                </tr>

                <?php
                echo '<tr>
                <td><select name="droits">
                <option value="">droits</option>
                <option value="1337">1337-administateur</option>
                <option value="42">42-moderateur</option>
                <option value="1">1-user</option>
                </select></td>
                <td><input name="envoyer" type="submit" value="submit"></td></tr>
                ';
                ?>
            </form> 
        </table>
    </div>
    
    <footer>
        <?php include "footer.php";?> 
    </footer>

</body>
</html>