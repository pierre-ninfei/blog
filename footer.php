   <?php 
   //_________________display header according to connection status_________________//
   echo "
   <div class='footer_container'>
      <div class='sitemap'>
         <a href='index.php'> Accueil </a>
         <a class='navA' href='articles.php'> Articles </a> ";

   if($_SESSION["id"]==42){
      echo "<a href='cree-article.php'> Ecrire  </a>";
   } 

   if(isset($_SESSION["connected"])){
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

   if(isset($_SESSION["connected"])){
   echo "
   <form  class ='decoform_footer'method='get'>  
         <input class='deco_footer'  type='submit' name='deco' value='Se déconnecter'></input>
         </form>";
   } 
   else{
   echo "<a href='connexion.php'> Connexion </a>";
   }
   if(isset($_GET['deco'])){
   session_destroy();
   header("Location:index.php");
   }
   echo "
         </div>
      <div class ='social'>
      </div>
   </div>
   <p id='copyright'>Copyright 2021 - The Blog. - Tous droits réservés<p>

   "
//    <a class = 'github' href='https://github.com/pierre-ninfei/blog'> Github </a> //

?>

