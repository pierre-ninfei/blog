   <?php 
   //_________________display header according to connection status_________________//
   session_start();
   $_SESSION["connected"] = "set";
   $_SESSION["id"]=null;
   $_SESSION["id"]=42;


   echo 
   "<nav><a href='index.php'> Accueil </a>
   <div class='dropdownArticles'>
      <a class='navA' href='articles.php'> Articles <i class='fa fa-angle-down'></i> 
      <div class='dropdown_content'>
       <a href='categorie1.php'> Projets</a>
       <a href='categorie2.php'> Veille</a>
       <a href='categorie3.php'> Design</a>
      </div>
   </div>
   ";
   
   if($_SESSION["id"]==42){
      echo "<a href='cree-article.php'> Ecrire  </a>";
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

