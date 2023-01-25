 <?php 
    use App\Models\Joueur;
    use  App\Models\JeuBateau;
    include "autoload.php";
   
   $J1 = new Joueur (1,"J1","passJ1","user");
   $J1->lancerPartie();
   $J2 = new Joueur (2,"J2","passJ2","user");
   $unJeuBateau = new JeuBateau(false,false,false,false);

   $unJeuBateau->lancerDe();

   echo "<pre>";
   var_dump($unJeuBateau);

 
   
   ?>
