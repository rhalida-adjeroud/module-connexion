<?php
session_start();
// $bdd = mysqli_connect('localhost', 'root','',' rhalida-adjeroud_module-connexion');
// mysqli_set_charset($bdd ,'utf8');
include'connect.php';
if (isset($_POST['logout']))
{
  session_destroy();
  header('location:connexion.php');
} 

if(isset($_POST['submit'])){

   $id = $_SESSION['user']['id'];
   $login = htmlspecialchars($_POST['login']);
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $password = htmlspecialchars($_POST['password']);
   $hashed_password = password_hash($password, PASSWORD_BCRYPT);

   $query = mysqli_query($bdd, "UPDATE utilisateurs SET  login = '$login', prenom = '$prenom', nom = '$nom', password = '$hashed_password' WHERE id = $id");

   if($query == true){
      $sql = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");
      $new_result = mysqli_fetch_assoc($sql);

      $_SESSION['user'] = $new_result;
      header('location:profil.php');
      echo 'reussie';
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
   </head>
   <body>
      <?php require('header.php'); ?>
      <div class="je">
         <div align="center">       
            <h1>Profil</h1>
            <form method="POST" action="">
               <table>
                   <tr> 
                     <td><label for="login">pseudo</label></td>   
                     <td><input type="text" name="login" id="login" placeholder="login" value="<?= $_SESSION['user']['login']; ?>"></td>
                   </tr>
                   <tr> 
                      <td><label for="nom">nom</label></td>   
                      <td><input type="text" name="nom" id="nom" placeholder="nom" value="<?= $_SESSION['user']['nom']; ?>"></td>
                   </tr>
                   <tr> 
                      <td><label for="login">prenom</label></td>   
                      <td><input type="text" name="prenom" id="prenom" placeholder="prenom" value="<?= $_SESSION['user']['prenom']; ?>"></td>
                   </tr>
                    <tr>
                      <td><label for="password">Old password</label></td>   
                      <td><input type="password" name="password" id="password" placeholder="password"></td>
                    </tr>
                    <tr> 
                      <td><input type="submit" value="Modifier" name="submit"></td>
                    </tr> 
                    
               </table>
            </form>
         </div>
      </div>
      <?php require ('footer.php') ?>
   </body>
</html>