<?php
$message= "";
//connect base de donnée
include'connect.php';
if(isset($_POST['submit']))
{
   if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) &&  !empty($_POST['password']) &&  !empty($_POST['password_retype'])){
   $login =htmlspecialchars($_POST['login']);
   $nom =htmlspecialchars($_POST['nom']);
   $prenom =htmlspecialchars($_POST['prenom']);
   $password =htmlspecialchars($_POST['password']);
   $password_retype =htmlspecialchars($_POST['password_retype']);
   //   compte lengeur
   $login_len = strlen($login);
   $nom_len = strlen($nom);
   $prenom_len = strlen($prenom);
   $password_len = strlen($password);
   $password_retype_len = strlen($password_retype);
// rechercher pour s'avoir si il ya un utilisateur avec ce login existant
   $requete = mysqli_query($bdd,"SELECT * FROM  utilisateurs WHERE login = '$login'");
   $result = mysqli_fetch_all($requete);
// si la requete me retourne 1(une ligne) c'est que l'utilisateur existe déjà avec ce login
   if(count($result) == 1){
     $message='erreur compt existant';
   }elseif($password==$password_retype) {// si l'utilisateur n'existe pas  et que les mots de passe coresponde alors le nouvelle utilisateur peut s'inscrire
     $password=password_hash($password, PASSWORD_BCRYPT);
     $requete =mysqli_query ($bdd , "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')");//inser dans la base de donnée le nouvel utilisateur
     header('location: connexion.php');
   }else{
       $message= 'les mots de passe different';
   }

  }else {$message='remplir tous les champs'; 
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
<?php require('header.php') ?>
<div class="je">
  <div align="center">       
    <h1>Inscription</h1>
   <form method="POST" action="">
    <table>
        <tr> 
           <td><label for="login">pseudo</label></td>   
           <td><input type="text" name="login" id="login"></td>
        </tr>
        <tr> 
           <td><label for="nom">Nom</label></td>
           <td><input type="text" name="nom" id="nom"></td>
        </tr>
        <tr>
           <td><label for="prenom">Prenom</label></td>   
           <td><input type="text" name="prenom" id="prenom"></td>
        </tr>
        <tr>
           <td><label for="password">password</label></td>   
           <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>  
            <td><label for="password_retype">confirm password</label></td>    
            <td><input type="password" name="password_retype" id="password__retype"></td>     
        </tr>
        <tr>
           <td><input type="submit" value="S'inscrire" name="submit">
        </tr>
        <tr>
           
    </table>  
 </form>
 <?php echo '<p class="">'.$message.'</p>';?>
</div>
</div>
<?php require ('footer.php') ?>
</body>
</html>