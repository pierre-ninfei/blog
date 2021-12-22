
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Categorie - The BLOG</title>
  <?php include "head.php";?> 
 </head>  
<body>
    <header>
        <?php include "header.php";?>
    </header>
        <?php include "ham_menu.php"; ?>

    <?php
    if($_SESSION['id']['id_droits'] == 1337){
    $user = $_SESSION['login'];

    include 'db_link.php';
    $requete = mysqli_query($conn,"SELECT * FROM categories");
    $result = mysqli_fetch_all($requete,MYSQLI_ASSOC);   
   
    ?>




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
                $req=mysqli_query($conn,"SELECT * from categories  WHERE id = '$id' ");
                $res=mysqli_fetch_all($req,MYSQLI_ASSOC);


                if(isset($_POST['deleteCategorie'])){
                    $req = mysqli_query($conn,"DELETE FROM `categories` WHERE `id` = $id");
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

<?php
}
else{
    echo"<h1 class= 'title'>Acces denied</h1>";
}
?>

</body>
</html>