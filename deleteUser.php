<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete User - The BLOG</title>
  <?php include "head.php";?> 
 </head>  

    <?php
    session_start();
        if($_SESSION['id']['id_droits'] == 1337){
        $user = $_SESSION['login'];

        $bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
        $requete = mysqli_query($bdd,"SELECT * FROM utilisateurs");
        $result = mysqli_fetch_all($requete,MYSQLI_ASSOC);
        
    ?>

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
                <td>'.substr($res[0]['password'],0,20).'..</td>
                <td>'.$res[0]['email'].'</td>
                <td>'.$res[0]['id_droits'].'</td>
                <td><input name="deleteUtilisateur" type="submit" value="delete"></td>
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