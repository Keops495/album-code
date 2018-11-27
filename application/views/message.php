<!DOCTYPE html>
<html>
<head>
  
    <title>Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">PhotoAlbum</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/User/logged">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/User/all/<?php echo $user_id; ?>">Album</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/Authentication/logout/<?php echo $user_id; ?>">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/Share/messages/<?php echo $user_id; ?>"><i class="fas fa-bell"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    </header>


    <main role="main">
      <style>a{color: black;text-decoration: none;}a:hover{text-decoration: none;color: black;}</style>
      <section class="jumbotron text-center">
        <div class="container">
         
          <p class="lead text-muted" style="font-size: 40px; color: black;">Messages</p>

        </div>
      </section>
        <ul class="list-group" style="padding: 0px 20px 20px 20px;">
          <?php $counter=0; foreach($messages as $key) { ?>
            <?php if($counter==0){ ?>
            <li class="list-group-item list-group-item-primary" style="padding: 0px 10px 10px 10px;">
              <div class="row">
                <div class="col-md-6">
                  <img style="width: 100%;" src="<?php echo $key['message']; ?>">
                </div>
                <div class="col-md-6" style="text-align: center;">
                  <h1 style="margin-top: 150px;"><?php echo $key['user']['name']." ".$key['user']['surname']; ?></h1>
                </div>
              </div>
            </li>
            <?php  $counter++; } ?>
            <?php elseif($counter%2==0 && $counter!=0) { ?>
            <li class="list-group-item list-group-item-primary" style="padding: 10px 10px 10px 10px;">
              <div class="row">
                <div class="col-md-6">
                  <img style="width: 100%;" src="<?php echo $key['message']; ?>">
                </div>
                <div class="col-md-6" style="text-align: center;">
                  <h1 style="margin-top: 150px;"><?php echo $key['user']['name']." ".$key['user']['surname']; ?></h1>
                </div>
              </div>
            </li>
            <?php $counter++; } else if($counter%2==1) { ?>
            <li class="list-group-item list-group-item-warning" style="padding: 10px 10px 10px 10px;">
              <div class="row">
                <div class="col-md-6">
                  <img style="width: 100%;" src="<?php echo $key['message']; ?>">
                </div>
                <div class="col-md-6" style="text-align: center;">
                  <h1 style="margin-top: 150px;"><?php echo $key['user']['name']." ".$key['user']['surname']; ?></h1>
                </div>
              </div>
            </li>
          <?php $counter++; }} ?>
        </ul>

    </main>
</body>
</html>