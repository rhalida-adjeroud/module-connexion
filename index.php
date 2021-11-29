<?php
session_start();
include'connect.php';
if (isset($_POST['logout']))
{
  session_destroy();
  header('location:connexion.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title> ANIME MANGAS</title>
    </head>
    <body>
      <?php require ('header.php') ?>
        <main>
            <!--animation cadre-->
            <div class="container">
             <div id="flip">
                <div><div>Mangas</div></div>
                <div><div> actus</div></div>
                <div><div>animé</div></div>
             </div>
            </div>
            <h1>Bienvennue dans le monde réel des manga</h1>
        </main>
        <?php require ('footer.php') ?>
    </body>
</html>

