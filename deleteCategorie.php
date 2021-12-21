<?php
session_start();
$_SESSION['id']= 1337;
if($_SESSION['id'] == 1337){
$user = $_SESSION['login'];

$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM categories");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DeleteCategorie</title>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>


        <H2></H2>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Etes-vous sûr de vouloir supprimez cette catégorie ?</h3></br>
        <div class= "articlesInputs">
        <table>
            <tr>
                <th>Id</th>
                <th>nom</th>
            </tr>
                <form  method = "post" > 
                <?php 
                 
                $id = $_GET['id'];
                $req=mysqli_query($bdd,"SELECT * from categories  WHERE id = '$id' ");
                $res=mysqli_fetch_all($req,MYSQLI_ASSOC);


                if(isset($_POST['deleteCategorie'])){
                    $req = mysqli_query($bdd,"DELETE FROM `categories` WHERE `id` = $id");
                    header("location:admin.php"); // lien vers la page de suppression de l'utilisateur 
                }               
        
                echo '
                <tr>
                <td>'.$res[0]['id'].'</td>
                <td>'.$res[0]['nom'].'</td>
                <td><input name="deleteCategorie" type="submit" value="delete"></td>
                </tr>'; 
                ?>  
                </form> 
        </table>
    </div>
    
    <a class="return" href="admin.php">⬅retour</a>

    <footer>
        <?php include "footer.php";?> 
    </footer>
</body>
</html>