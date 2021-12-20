<?php
session_start();
$_SESSION['id']= 42;
if($_SESSION['id'] == 42){

$user = $_SESSION['login'];

$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM utilisateurs ORDER BY `id_droits` DESC");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);



     /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */


    
    if (isset($_POST['updateArticle'])){
            $req = mysqli_query($bdd,"UPDATE `articles` SET article ='hello', date = NOW() WHERE id = 4 ");
    }

    if(isset($_POST['deleteArticle'])){
        $req = mysqli_query($bdd,"DELETE FROM articles WHERE id = 4");
    }

    if(isset($_POST['createArticle'])){
        $req = mysqli_query($bdd,"INSERT INTO  articles (id,article, id_utilisateur, id_categorie, date) VALUES ('4','sfftzfs','3','3', NOW())");
    }

    if (isset($_POST['updateUtilisateur'])){
        
        $newname = $_POST['name'];
        $newpassword = $_POST['password'];
        $newemail = $_POST['email'];
        $req = mysqli_query($bdd,"UPDATE `utilisateurs` SET login = '$newname', password = '$newpassword', email = '$newemail'");
    }

    if(isset($_POST['deleteUtilisateur'])){
        $req = mysqli_query($bdd,"DELETE FROM utilisateurs WHERE id = 1");
        header("location:admin.php"); 
        
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>

        <h2 style="text-align: center; color: white;">PROFIL ADMIN</h2></br>

        </tr>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     
        <h3 style="text-align: center; color: white;">Utilisateurs</h3></br>
        <div class= "articlesInputs">
        <table>
            
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Droits</th>
                <th>Update</th>
                <th>Delete</th>
            
            </tr>
        
            <?php 

            foreach($result as $user => $value) {
            
                    echo'<tr>
                        <td>'.$value['id'].'</td>
                        <td>'.$value['login'].'</td>
                        <td>'.$value['password'].'</td>
                        <td>'.$value['email'].'</td>
                        <td>'.$value['id_droits'].'</td>
                        <td><a href="deleteUser.php?id='.$value['id'].'">Delete</a></td>
                        <td><a href="updateUser.php?id='.$value['id'].'">Update</a></td>
                        </tr>'; 
                } 
            ?></br>
            <tr><th></th><th></th><th></th>
            
            <td><a href="createUser.php">create user</a></td>
            </tr>
        </table>
        </div></br>


            <!-- //////////////////// gestion des Articles \\\\\\\\\\\\\\\\\ -->
        <h3 style="text-align: center; color: white;">Articles</h3></br>
        <form method="post" class= "articlesInputs">
            <input name="updateArticle" type="submit" value="update">
            <input name="deleteArticle" type="submit" value="delete">
            <input name="createArticle" type="submit" value="create">
        </form></br></br>

            <!-- //////////////////// gestion des Catégories \\\\\\\\\\\\\\\\\ -->

        <h3 style="text-align: center; color: white;">Catégories</h3></br>
        <div class= "articlesInputs">
            <input name="updateCategorie" type="button" value="update">
            <input name="deleteCategorie" type="button" value="delete">
            <input name="createCategorie" type="button" value="create">
        </div></br></br>

            

       

    

    <footer>
        <?php include "footer.php";?> 
    </footer>
</body>
</html>