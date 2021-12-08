   <?php 
   //_________________display header according to connection status_________________//

   echo "<div class='sitemap'>";
   session_start();
   echo "<a href='index.php'> Accueil </a>";
   echo "
      <a class='navA' href='articles.php'> Articles </a> 
   ";

   if(isset($_SESSION["login"])){
      echo "<a href='profil.php'> Profil </a>";
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
   echo "</div>";
   echo " 
   <div class ='social'>

      </div>
   "
//    <a class = 'github' href='https://github.com/pierre-ninfei/blog'> Github </a> //

?>

