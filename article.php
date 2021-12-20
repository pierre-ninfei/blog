<!DOCTYPE html>
<html>
 <head>
 <title>The BLOG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
  <header>
    <?php include "header.php";?> 
  </header>
  <main>  
  <h1 class="title"><i>The BLOG.  </i></h1> 
  <div class='index_articles'>
<?php 

//_________________connect to DB_________________//

include "db_link.php"; 

//_________________select DATA_________________//

// get DATA from articles
$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = $id";
$query = $conn->query($sql);
$articles = $query->fetch_all();

// get DATA from commentaires
$id = $_GET['id'];
$sql = "SELECT * FROM commentaires WHERE id_article = $id";
$query = $conn->query($sql);
$comments = $query->fetch_all();

// get LOGIN from utilisateurs and articles

$sql = "SELECT utilisateurs.id, utilisateurs.login FROM utilisateurs INNER JOIN articles ON articles.id_utilisateur = articles.id" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

//_________________display ARTICLE_________________//

$i = 0;
foreach(array_reverse($articles) as $article){
  echo "<div>
          <article>";
  foreach($users as $user){
    if ($article[2] == $user[0]){
      $uname = $user[1];
    }
  }
  $date = date_create($article[4]);
  $date = date_format($date, 'd/m/y');
  echo "
  <div class='articles_container'>
    <div class='info_article'>
      <div class='post_info'><i> Posté le $date par $uname</i></br>
      </div>
      <div class='read_more'> 
      
      </div>
    </div>
    <div > &nbsp&nbsp $article[1]
    </div>
  </div>
  </article>
  </div>
  ";
  $i++;
  if ($i >2){
    break;
  }
}

//_________________display COMMENTS_________________//

$i = 0;

  foreach(array_reverse($comments) as $comment){
    echo "<div class ='comments'>
            <article class ='comment'>";
    foreach($users as $user){
      if ($comment[3] == $user[0]){
        $uname = $user[1];
      }
    }
    $date = date_create($comment[4]);
    $date = date_format($date, 'd/m/y');
    echo "<div class='com_info'>Posté le ".$date." par ".$uname."</br></div>";
    echo "<div class='com'>";
    echo "&nbsp&nbsp".$comment[1];
    echo "</div>";
    echo "</article></div>";
  } 

  if(isset($_SESSION['login'])){ // add COMMENTS if connected
?>

<div class ="commentsA">
  <article class ="commentA">
    <form method = "post">
      <input size = 50 placeholder="Your comment here" type="text" name="comment"> </input>
      <input name ="addComment" type ="submit"class ="addComment" value= "Ajouter un commentaire"></input>
    </form>
  </article>
</div>


<?php

//_________________add COMMENT_________________//

$comment = $_POST["comment"];
$id_user = 1;

$toDate = date_format(date_create($toDate),'Y-m-d  H:i');
$toDate =strftime('%Y-%m-%dT%H:%M', strtotime($toDate));

if(isset($_POST["addComment"])){

  if ($_POST["comment"]== NULL){
    echo "<p id='update'>Veuillez entrer un commentaire.</p>";
  } 
  else{
    $sql = "INSERT INTO `commentaires` (`commentaire`, `id_article`,`id_utilisateur`, `date`) VALUES ('$comment', '$id','$id_user', '$toDate')";
    $query = $conn->query($sql);
    header("Location:article.php?id=".$id);
}
}
}
?>
</div>
</main>

  <footer>
    <?php include "footer.php";?> 
  </footer>
</body>
</html>