   <?php 
   //_________________display header according to connection status_________________//
   session_start();

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
   
   if(isset($_SESSION['id'])){
      if($_SESSION['id']['id_droits']==42 || $_SESSION["id"]['id_droits']==1337){
         echo "<a href='creer-article.php'> Ecrire  </a>";
      } 
   }

   if(isset($_SESSION['login'])){
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

   if(isset($_SESSION['login'])){
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

   echo"
   <div> <a href='javascript:void(0);' class='icon' onclick='myFunction()'> <i class='fa fa-bars'></i></a> </div> </nav>
 ";

 // Connect to DB //
 include "db_link.php"; 
?>

