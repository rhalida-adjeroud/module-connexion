<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> ANIME MANGAS</title>
    </head>
    <body>
    <header>
            <!----navbar-->
           <nav>
               <ul class="liste-items">
                  <li class="items"><a class="lien", href="index.php">Mangas</a></li>
                  <?php
                       if(!isset($_SESSION['user'])){ 
                        echo ('<li class="items"><a class="lien", href="inscription.php">inscription</a></li>');
                      }else{ echo "";
                      }?>
                      <?php
                     if(!isset($_SESSION['user'])){ 
                       echo ('<li class="items"><a class="lien", href="connexion.php">connexion</a></li>');
                      }else{ echo "";}?>
                      <?php
                        if(isset($_SESSION['user'])){
                          echo ('<li class="items"><a class="lien", href="profil.php">profil</a></li>');
                        }else{ echo "";}?>
                      <?php
                      if (isset($_SESSION['user']) || isset($_SESSION['admin']))
                      {
                        echo (' 
                        <form action="" method="post"><input type="submit" name="logout" value="Déconnexion"></form>
                        ');

                        if (isset($_SESSION['admin']))
                        {
                          echo ('<li class="items"><a class="lien", href="admin.php">admin</a></li>');
                        }
                        }
                     
                        ?>
                  <li class="items">
                        animé
                      <span>&#9660;</span>
                      <ul class="sous-liste">
                         <li class="items-liste"><a class="lien", href="https://japonanime.com/">Japon Animé</a></li>
                      </ul>
                    </li>
                  <li class="items"> jeu vidéo
                    <span>&#9660;</span>
                    <ul class="sous-liste">
                      <li class="items-liste"><a class="lien", href="https://www.jeuxmangas.com/">Jeu video</a></li>
                    </ul>    
                  <li class="items">Artiste
                    <span>&#9660;</span>
                    <ul class="sous-liste">
                      <li class="items-liste"><a class="lien", href="https://www.superprof.fr/blog/personnage-manga-populaire/">personnages</a></li> 
                    </ul>    
                      <li class="items"><a class="lien", href="formulaire.html">Contact</a></li>
                      
               </ul>
           </nav>             
        </header>
   
</body>