<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete article - The BLOG</title>
  <?php include "head.php";?> 
 </head>  

<?php
session_start();
if($_SESSION['id']['id_droits'] == 1337){
$user = $_SESSION['login'];

$bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM articles");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);   

?>

<body>
    <header>
        <?php include "header.php";?>
    </header>


        <H2></H2>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Etes-vous sûr de vouloir supprimez cet article ?</h3></br>
        <div class= "articlesInputs">
        <table>
            <tr>
                <th>Id</th>
                <th>Article</th>
                <th>Id Utilisateur</th>
                <th>Id Catégorie</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
                <form  method = "post" > 
                <?php 
                 
                $id = $_GET['id'];
                $req=mysqli_query($bdd,"SELECT * from articles  WHERE id = '$id' ");
                $res=mysqli_fetch_all($req,MYSQLI_ASSOC);


                if(isset($_POST['deleteArticle'])){
                    $req = mysqli_query($bdd,"DELETE FROM `articles` WHERE `id` = $id");
                    header("location:admin.php"); // lien vers la page de suppression de l'utilisateur 
                }               
        
                echo '
                <tr>
                <td>'.$res[0]['id'].'</td>
                <td>'.substr($res[0]['article'],0 ,20).'..</td>
                <td>'.$res[0]['id_utilisateur'].'</td>
                <td>'.$res[0]['id_categorie'].'</td>
                <td>'.$res[0]['date'].'</td>
                <td><input name="deleteArticle" type="submit" value="delete"></td>
                </tr>'; 
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