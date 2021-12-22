<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Article - The BLOG</title>
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
    $id = $_GET['id'];
    include 'db_link.php';
    $req=mysqli_query($conn,"SELECT * from articles  WHERE id = '$id' ");
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);
    

    /*  ///////// mes varriables   \\\\\\\\  */
    $artId= $res[0]['id'];
    $artDet = $res[0]['article'];  
    $artIdUser = $res[0]['id_utilisateur'];
    $artIdCat = $res[0]['id_categorie'];
    $artDate = $res[0]['date'];

    ?>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Modifier un article</h3></br>
        <div class= "articlescel">
        
        
            <table>      
            <form  method = "post" > 
            <textarea  name="article"  rows="" cols="" style="width: -moz-available; height:110px"><?php echo "$artDet" ?></textarea required><br />

            <tr>
                <th>Id</th>     
            </tr>

                <?php 
                          
                        /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
                    if(isset($_POST['envoyer'])){
                        $newartDet = $_POST['article'];
                        $newartDate = $_POST['date'];
                        if (isset($_POST['article'])){
                            if($newartDet != $POST['article']){
                                $reqArt = mysqli_query($conn,"UPDATE `articles` SET article = '$newartDet' WHERE `id`= $id" );
                                $reqDate = mysqli_query($conn,"UPDATE `date` SET date = '$newdate' WHERE `id`= '$id'" );
                                $_POST['article'] = $artDet;
                                header('location: admin.php');
                            }
                        }
                    }  

                echo '
                <tr>
                <td>'.$artId.'</td>
                </tr>'; 
                
                ?>   
                <tr>
                <th>Catégorie</th>
                </tr>
                <td><?php echo $artIdCat ?></td>
                
                <tr>
                <th>Date</th>
                </tr>
                <td><?php echo $artDate ?></td>
                
                <?php
                echo '<tr>
        
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