<?php
session_start();

// $bdd = mysqli_connect('localhost', 'root','','rhalida-adjeroud_moduleconnexion');
// mysqli_set_charset($bdd ,'utf8');
include'connect.php';
if (isset($_POST['logout']))
{
  session_destroy();
  header('location:connexion.php');
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrateur</title>
</head>
<body>
<?php require('header.php') ?>
<div class="je">
  <div align="center">       
    <h1>espace admin</h1>
      <form method="POST" action="">
         <?php
            $requete = mysqli_query($bdd,"SELECT * FROM utilisateurs");
            $result = $requete->fetch_array(MYSQLI_ASSOC);
            while( $result = $requete->fetch_array(MYSQLI_ASSOC)){
         ?>
           <table>
             <th>
                 <tr><?php echo"<b>" . $result['login']. "</b>" ?> <tr> 
             </th>
                  <td>
                     <tr><?php echo $result['nom'] ?> </tr>
                     <tr><?php echo $result['prenom'] ?> </tr>
                     <tr><?php echo $result['password'] ?>  </tr>
                  </td>
               </table>
            <?php
        }
        ?>
      </form> 
   </div>
  </div> 
  <?php require ('footer.php') ?>  
 </body>
</html>

