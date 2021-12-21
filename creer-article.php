<!DOCTYPE html>
<html>
<head>
  <title>Nouvel article - The BLOG</title>
  <?php include "head.php";?> 
 </head>  

 <body>

 <?php 
 // DISPLAY PAGE IF CONNECTED
 session_start();
 if($_SESSION['id']['id_droits']=="42" || $_SESSION['id']['id_droits']=="1337" ){
?>

  <header>
    <?php include "header.php";?> 
  </header>
  <?php include "ham_menu.php";?>
  <main>  
    <h1 class="title"><i>The BLOG.  </i></h1> 

    <div class='new_articles'>
      <article> 
      <div class ="booking_container">
        <form method = "GET">
          <label> Article </label>
          <textarea size = 50 placeholder="Votre article" type="text" name="article" class="desc"><?php echo $_GET["description"] ?></textarea>
          <label> Catégorie </label>
          <select name="categories">
            <option value=""> Choisir une catégorie</option>
            <option value="1">Projets</option>
            <option value="2">Veille</option>
            <option value="3">Design</option>
          </select>      
          <input name ="submit" type ="submit"class ="book" value= "Publier"></input>
        </form>
  <?php 

// debug
$_SESSION['login'] = "c";

//_________________connect to DB_________________//

include "db_link.php"; 

//_________________ user ID _________________//

$co_user = $_SESSION['login'];
$sql = "SELECT id FROM `utilisateurs` WHERE `login` = '$co_user'" ;
$query = $conn->query($sql);
$id_user = $query->fetch_all();

//_________________set variables_________________//

$id_categorie = $_GET["categories"];
$id_user = $id_user[0][0];
$article = $_GET["article"];
$toDate = date_format(date_create($toDate),'Y-m-d  H:i');

//_________________save ARTICLE_________________//

if(isset($_GET['submit'])){
  if($_GET['article']!=NULL && $_GET['categories']!=NULL){
    $err = false;
    if(strlen($titre) > 20){
      echo "La taille du titre est limitée à 20 charactères.</br>";
      $err = true;
    }
    elseif($err ==false){
      $sql = "INSERT INTO `articles` (`article`,`id_utilisateur`,`id_categorie`,`date`) VALUES('$article', '$id_user','$id_categorie','$toDate')";
      $query = $conn->query($sql);    
      echo "ok";
      header("Location:articles.php");
    }
  }
  else{
    echo '<p id="update">Tous les champs doivent être remplis..</p>';
  }
}

?>

</div>
      </article>
    </div>

  </main>

<?php } else{ echo "<h1 class='title'>Acces denied</h1>"; } ?>

<footer>
    <?php include "footer.php";?> 
  </footer>

</body>

</html>