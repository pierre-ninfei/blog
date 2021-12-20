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

// get DATA from commentaires

$sql = "SELECT * FROM articles";
$query = $conn->query($sql);
$articles = $query->fetch_all();

// get LOGIN from utilisateurs and commentaires

$sql = "SELECT utilisateurs.id, utilisateurs.login FROM utilisateurs INNER JOIN articles ON articles.id_utilisateur = articles.id" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

//_________________display ARTICLES_________________//

$i = 0;
foreach(array_reverse($articles) as $article){
  echo "<div >
          <article >";
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
      <div class='post_info'> Posté le $date par $uname</br>
      </div>
      <div class='read_more'> 
        <form action = 'article.php' method = 'get'> <button name ='id' type='submit' value ='$article[0]'> Details </button>
          </form>
      </div>
    </div>
    <div > &nbsp&nbsp $article[1]
    </div>
  </div>
  </div>
  </article>
  ";
  $i++;
  if ($i >2){
    break;
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