<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Categorie - The BLOG</title>
  <?php include "head.php";?> 
 </head>  

    <?php
    session_start();
    if($_SESSION['id']['id_droits'] == 1337){
    $user = $_SESSION['login'];
    $id = $_GET['id'];
    $bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
    $req=mysqli_query($bdd,"SELECT * from categories  WHERE id = '$id' ");
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);
    

    /*  ///////// mes varriables   \\\\\\\\  */
    $catId= $res[0]['id'];
    $catNom = $res[0]['nom'];  
    ?>

<body>
    <header>
        <?php include "header.php";?>
    </header>
        
            <!-- //////////////////// gestion de categorie \\\\\\\\\\\\\\\\\ -->

     

        <h3 style="text-align: center; color: white;">Modifier la catégorie</h3></br>
        <div class= "articlescel">
        
        
            <table>      
            <form  method = "post" > 
            <tr>
                <th>Id</th>
                <th>Nom</th>     
            </tr>

                <?php 
                          
                        /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
                    if(isset($_POST['envoyer'])){
                        $newCatNom = $_POST['name'];
                    
                        if (isset($_POST['name'])){
                            if($newCatNom != $POST['name']){
                                $reqArt = mysqli_query($bdd,"UPDATE `categories` SET nom = '$newCatNom' WHERE `id`= $id" );
                                $_POST['name'] = $catNom;
                                header('location: admin.php');
                            }
                        }
                    }  

                echo '
                <tr>
                <td>'.$catId.'</td>
                <td><input type="text" placeholder="'.$catNom.'" name = "name"></td>
                </tr>'; 
                
                ?>   
                
                <td><input name="envoyer" type="submit" value="Update"></td></tr>
                </form> 
        </table>
    </div>
    <a class="return"  href="admin.php">⬅retour</a>
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