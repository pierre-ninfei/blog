<?php
session_start();
$_SESSION['id']= 42;
if($_SESSION['id'] == 42){
$user = $_SESSION['login'];

$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM utilisateurs");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);



     /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */


    
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delte</title>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>


        <H2></H2>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Etes-vous sûr de vouloir supprimez l'utilisateur</h3></br>
        <div class= "articlesInputs">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Droits</th>
                <th>Delete</th>
            </tr>
                <form  method = "post" > 
                <?php 
                 
                $id = $_GET['id'];
                $req=mysqli_query($bdd,"SELECT * from utilisateurs  WHERE id = '$id' ");
                $res=mysqli_fetch_all($req,MYSQLI_ASSOC);
                    $asc=mysqli_query($bdd,"SELECT * FROM `utilisateurs` ORDER BY `utilisateurs`.`id` ASC");


                if(isset($_POST['deleteUtilisateur'])){
                    $req = mysqli_query($bdd,"DELETE FROM `utilisateurs` WHERE `id` = $id");
                    header("location:admin.php"); // lien vers ta page de suppression de l'utilisateur 
                    echo "mpmp";
                }               
        
                echo '
                <tr>
                <td>'.$res[0]['id'].'</td>
                <td>'.$res[0]['login'].'</td>
                <td>'.$res[0]['password'].'</td>
                <td>'.$res[0]['email'].'</td>
                <td>'.$res[0]['id_droits'].'</td>
                <td><input name="deleteUtilisateur" type="submit" value="delete"></td>
                </tr>'; 
                ?>  
                </form> 
        </table>
    </div>
    

    <footer>
        <?php include "footer.php";?> 
    </footer>
</body>
</html>