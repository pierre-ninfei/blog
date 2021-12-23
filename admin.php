<!DOCTYPE html>
<html>
<head>
  <title>Admin - The BLOG</title>
  <?php include "head.php";?> 
 </head>  
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <?php include "ham_menu.php";?>
    <main>
    <?php
    if($_SESSION['id']['id_droits'] == 1337){

    $user = $_SESSION['login'];
    $tronc = substr($article['article'],0 ,30);
    include 'db_link.php';
    
            ///////////////requetes uilisateurs\\\\\\\\\\\\\\\\

    $requete = mysqli_query($conn,"SELECT * FROM utilisateurs ORDER BY `id_droits` DESC");
    $result = mysqli_fetch_all($requete,MYSQLI_ASSOC);


            ///////////////requetes articles\\\\\\\\\\\\\\\\

    $reqArt = mysqli_query($conn,"SELECT * FROM articles");
    $resArt = mysqli_fetch_all($reqArt,MYSQLI_ASSOC);

            ///////////////requetes catégories\\\\\\\\\\\\\\\\

    $reqCat = mysqli_query($conn,"SELECT * FROM categories  ORDER BY `categories`.`id` ASC");
    $resCat = mysqli_fetch_all($reqCat,MYSQLI_ASSOC);
    
    ?>


        <h1 class="h1admin" style="text-align: center; color: white;">PROFIL ADMIN</h1>

        </tr>
        
            <!-- //////////////////// gestion des Utilisateurs \\\\\\\\\\\\\\\\\ -->

     
        <h2 style="text-align: center; color: white;">Utilisateurs</h3></br>
        <div class= "articlesInputs">
        <table>
            
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Droits</th>
                <th>Delete</th>
                <th>Update</th>
                
            
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
        <div class= "articlesInputs">
        <table>
            
            <tr>
                <th>Id</th>
                <th>Articles</th>
                <th>Catégories</th>
                <th>date</th>
                <th>Delete</th>
                <th>Update</th>
                
            </tr>
        
            <?php 

            foreach($resArt as $articles => $article) {
            
                    echo'<tr>
                        <td>'.$article['id'].'</td>
                        <td>'.substr($article['article'],0 ,20).'..</td>
                        <td>'.$article['id_categorie'].'</td>
                        <td>'.$article['date'].'</td>
                        <td><a href="deleteArticle.php?id='.$article['id'].'">Delete</a></td>
                        <td><a href="updateArticle.php?id='.$article['id'].'">Update</a></td>
                        </tr>'; 
                } 
            ?></br>
            <tr>
            <td><a href="creer-article.php">create article</a></td>
            </tr>
        </table>
        </div></br>
       

            <!-- //////////////////// gestion des Catégories \\\\\\\\\\\\\\\\\ -->
            <h3 style="text-align: center; color: white;">Catégories</h3></br>

        <div class= "articlesInputs">
        <table>
            
            <tr>
                <th>Id</th>
                <th>Name</th> 
                <th>Delete</th>
                <th>Update</th>
               
            </tr>
        
            <?php 

            foreach($resCat as $categories => $categorie) {
            
                    echo'<tr>
                        <td>'.$categorie['id'].'</td>
                        <td>'.$categorie['nom'].'</td>
                        <td><a href="deleteCategorie.php?id='.$categorie['id'].'">Delete</a></td>
                        <td><a href="updateCategorie.php?id='.$categorie['id'].'">Update</a></td>
                        </tr>'; 
                } 
            ?></br>
            <tr>
            <td><a href="createCategorie.php">create catégorie</a></td>
            </tr>
        </table>
        </div></br>
            </main>
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