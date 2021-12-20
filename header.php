   <?php 
   //_________________display header according to connection status_________________//
   session_start();
   $_SESSION["id"]=42;
   $_SESSION["login"]='n';

   echo 
   "<nav><a href='index.php'> Accueil </a>
   <div class='dropdownArticles'>
      <a class='navA' href='articles.php'> Articles <i class='fa fa-angle-down'></i> 
      <div class='dropdown_content'>
       <a href='articles.php?Categorie=Projets'> Projets</a>
       <a href='articles.php?Categorie=Veille'> Veille</a>
       <a href='articles.php?Categorie=Design'> Design</a>
      </div>
   </div>
   ";
   
   if($_SESSION["id"]==42 || $_SESSION["id"]==1337){
      echo "<a href='creer-article.php'> Ecrire  </a>";
   } 

   if(isset($_SESSION["login"])){
      if($_SESSION["id"]==1337){
      echo "<a href='admin.php'> Admin </a>";
      }
      else{
      echo "<a href='profil.php'> Profil </a>";
      }
   } 
   else{
      echo "<a href='inscription.php'> Inscription </a>";
   }

   if(isset($_SESSION["login"])){
   echo "
   <form  class ='decoform'method='get'>  
         <input class='deco'  type='submit' name='deco' value='Se déconnecter'></input>
         </form>";
   } 
   else{
   echo "<a href='connexion.php'> Connexion </a>";
   }
   if(isset($_GET['deco'])){
   session_destroy();
   header("Location:index.php");
   }
?>

