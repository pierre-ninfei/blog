<div id='ham' class='ham_container'>
      <div class='ham'>
         <a href='index.php'>Accueil</a>
         <a href='articles.php'>Articles</a>
         <div class='submenu'>
          <a href='articles.php?Categorie=Projets'>&nbsp Projets</a>
          <a href='articles.php?Categorie=Veille'>&nbsp Veille</a>
          <a href='articles.php?Categorie=Design'>&nbsp Design</a>
         </div>
<?php
if(isset($_SESSION['id'])){
   if($_SESSION["id"]['id_droits']==42 || $_SESSION["id"]['id_droits']==1337){
      echo "<a href='creer-article.php'> Ecrire  </a>";
   } 
}

if(isset($_SESSION["login"])){
      if(isset($_SESSION['id'])){
      if($_SESSION["id"]['id_droits']==1337){
      echo "<a href='admin.php'> Admin </a>";
      }
      else{
      echo "<a href='profil.php'> Profil </a>";
      }
   }
} 
else{
   echo "<a href='inscription.php'> Inscription </a>";
}

if(isset($_SESSION["login"])){

} 
else{
echo "<a href='connexion.php'> Connexion </a>";
}
if(isset($_GET['deco'])){
session_destroy();
header("Location:index.php");
}
echo' </div>
</div>';
?>
