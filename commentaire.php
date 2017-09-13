<?php

$bdd =  new PDO ('mysql:host=localhost;dbname=tp_openclassroom', 'root', 'zekri59100');
$reponse = $bdd->prepare('SELECT * FROM billets WHERE id = ?' );
$reponse->execute([$_GET['id']]);
$billet = $reponse->fetch();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <meta charset="utf-8">
    <title>blog</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded mb-5">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">BLOG</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">



      </ul>
    </div>
  </nav>
    </header>

<div class='card mx-auto ' style='width: 50rem;' id='billetscom'>
<div class='card-block '>
<p> <?php echo  $billet['date_creation'] ?> </p>
<h4 class="card-title"><?php echo $billet['titre'] ?> </h4>
<p class="card-text"><?php echo $billet['contenu'] ?> </p>
<a href="index.php" class="btn btn-primary">retour</a>
</div>
</div>

<?php
$reponse_com = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= :id ' );

 $reponse_com->execute(array(
   'id' =>$_GET['id'],
 ));


while ($donnée = $reponse_com->fetch())
{ ?>

  <div class='card mx-auto m-2' style='width: 50rem;' id='billetscom'>
  <div class='card-block '>
  <p> <?php echo  $donnée['date_commentaire'] ?> </p>
  <h6 class="card-title"><?php echo $donnée['auteur'] ?> </h6>
  <p class="card-text"><?php echo $donnée['commentaire'] ?> </p>

  </div>
  </div>
<?php
}


?>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>
