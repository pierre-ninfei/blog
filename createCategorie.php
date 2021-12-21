<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CreateCatégorie</title>
</head>

    <?php
    session_start();
    if($_SESSION['id']['id_droits'] == 1337){
    $users = $_SESSION['login'];
    $bdd = mysqli_connect("localhost","root","root","blog");mysqli_set_charset($bdd,"UTF8");
    $req=mysqli_query($bdd,"SELECT * from categories");
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);

    ?>
    
<body>
    <header>
        <?php include "header.php";?>
    </header>
 
            <!-- //////////////////// gestion des Catégorie \\\\\\\\\\\\\\\\\ -->

    <h3 style="text-align: center; color: white;">Saisir le nom de la catégorie</h3></br>
    <div class= "articlesInputs">
        <table> 
            <form  method = "post" > 
                <tr>
                    <th>Name</th>
                    <th>submit</th>
                </tr>

                <!-- ///////// conditions  infos catégorie  \\\\\\\\   -->

                <?php 
                    if(isset($_POST['envoyer'])){
                        $name=  $_POST['name'];
                       
                        if (isset($name)){
                          
                            foreach($res as $cat){ 
                                if (isset($_POST["name"]) && $name == $cat['nom'] ){ 
                                    $taken = true;
                                    //header('Location: createCategorie.php');
                                }
                            }  
                            echo "error la catégorie existe déja";
                
                    ///////////// requete pour envoyer les infos dans la bdd\\\\\\\\\\\ -->

                                if($taken == false){
                                    $req = mysqli_query($bdd,"INSERT INTO categories(nom) VALUES ('$name')");
                                    //header('Location: admin.php');
                                     
                            }               
                        }
                    }  
        
                echo '
                <tr>
                <td><input type="text" placeholder="Entrer un nom de catégorie" name = "name"></td>
                <td><input name="envoyer" type="submit" value="submit"></td></tr>
                </tr>'; 
                
                ?>          
            </form> 
        </table>
    </div>
    <a class="return" href="admin.php">⬅retour</a>
    <footer>
        <?php include "footer.php"?> 
    </footer>

<?php
}
else{
    echo"<h1 class= 'title'>Acces denied</h1>";
}
?>
</body>
</html>