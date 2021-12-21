<!DOCTYPE html>
<html>
<head>
  <title>Articles - The BLOG</title>
  <?php include "head.php";?> 
 </head>  
 <body>
  <header>
    <?php include "header.php";?> 
  </header>
  <?php include "ham_menu.php";?>
  <main>  
  <h1 class="title"><i>The BLOG.  </i></h1> 
  <form method="get" class="art_cat"> 
    <input class ="All" type="submit" name = "All" value="All"></input>
    <input class ="Projets" type="submit" name = "Categorie" value="Projets"></input>
    <input class ="Veille" type="submit" name = "Categorie" value="Veille"></input>
    <input class ="Design" type="submit" name = "Categorie" value="Design"></input>
  </form>
  <div class='index_articles'>
<?php 

//_________________connect to DB_________________//

include "db_link.php"; 

//_________________select DATA_________________//

// get DATA from articles depending on categories

if(isset($_GET["Categorie"])){
  if($_GET["Categorie"]=="Projets"){
    $sql = "SELECT * FROM articles WHERE id_categorie = 1";
    ?><style>.Projets{background-color : rgb(217, 206, 255);}</style> <?php
  }
  if($_GET["Categorie"]=="Veille"){
    $sql = "SELECT * FROM articles WHERE id_categorie = 2";
    ?><style>.Veille{background-color : rgb(217, 206, 255);}</style> <?php
  }
  if($_GET["Categorie"]=="Design"){
    $sql = "SELECT * FROM articles WHERE id_categorie = 3";
    ?><style>.Design{background-color : rgb(217, 206, 255);}</style> <?php
  }
}
elseif(isset($_GET["All"])){
  $sql = "SELECT * FROM articles ";
  ?><style>.All{background-color : rgb(217, 206, 255);}</style> <?php
}
else{
  $sql = "SELECT * FROM articles ";
  ?><style>.All{background-color : rgb(217, 206, 255);}</style> <?php
}

$query = $conn->query($sql);
$comments = $query->fetch_all();

// get LOGIN from utilisateurs and commentaires

$sql = "SELECT utilisateurs.id, utilisateurs.login FROM utilisateurs INNER JOIN articles ON articles.id_utilisateur = articles.id" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

//_________________navigation pages ARTICLES_________________//

if ($_GET["Categorie"]=="Design"){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Design";
}

if ($_GET["Categorie"]=="Design" && $_SESSION["reset"] != 1 ){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Design";
  $_SESSION["reset"] = 1;
  $_SESSION['page'] = 0;
}

if ($_GET["Categorie"]=="Veille"){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Veille";
}

if ($_GET["Categorie"]=="Veille" && $_SESSION["reset"] != 1){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Veille";
  $_SESSION["reset"] = 1;
  $_SESSION['page'] = 0;
}

if ($_GET["Categorie"]=="Projets"){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Projets";
}

if ($_GET["Categorie"]=="Projets" && $_SESSION["reset"] != 1){
  unset($_SESSION["cat"]);
  $_SESSION["cat"] = "Projets";
  $_SESSION["reset"] = 1;
  $_SESSION['page'] = 0;
}
if ($_GET["Categorie"]=="All"){
  $_SESSION["cat"] = "All";
}

if (isset($_SESSION["cat"])){
  if($_GET["page"] == ($_SESSION['page']+1)){
    $_SESSION["page"] ++;
      header('Location:articles.php?Categorie='.$_SESSION["cat"]."&page=".$_SESSION['page']); 
  }
  if($_GET["page"] == ($_SESSION['page']-1)){
    $_SESSION["page"] --;
    header('Location:articles.php?Categorie='.$_SESSION["cat"]."&page=".$_SESSION['page']); 
  }
}
else{
  if($_GET["page"] == ($_SESSION['page']+1)){
    $_SESSION["page"] ++;
    header('Location:articles.php?&page='.$_SESSION['page']); 
  }
  if($_GET["page"] == ($_SESSION['page']-1)){
    $_SESSION["page"] --;
    header('Location:articles.php?&page='.$_SESSION['page']); 
  }
}

if(!isset($_SESSION["page"])){
  $_SESSION["page"] = 0;
}

//_________________display ARTICLES_________________//

if(isset($_GET["All"])){
  $_SESSION['page']=0;
  unset($_SESSION["cat"]);
  header('Location:articles.php');
  $_SESSION["reset"] = 0;

}

$i = 0;
$u = 0;
$arts = array();

foreach(array_reverse($comments) as $comment){
  $arts[$u][] = $comment;
  $i++;
  if ($i == 5){
    $i = 0;
    $u ++;
  }
}

$i = 0;

foreach($arts[$_SESSION["page"]] as $article){
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
} 

//_________________nav ARROWS_________________//

if(count($comments)>4){
  echo "
    <form method='get'>
    <div class = 'art_arr'>
    <button id ='left' name = 'page' type = 'submit' value='".($_SESSION['page']-1)."'> <</button>
    <button id ='right' name = 'page' type = 'submit' value='".($_SESSION['page']+1)."'> ></button>
    </div>
    </form>";
  if($_SESSION['page']==0){
    ?><style>#left{color : rgb(177, 177, 252);border:none;background-color:rgb(177, 177, 252)}</style> <?php
  }
  if($_SESSION['page']==(count($arts)-1)){
    ?><style>#right{color : rgb(177, 177, 252);border:none;background-color:rgb(177, 177, 252)}</style> <?php
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