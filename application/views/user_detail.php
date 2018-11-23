<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

    <style>a{color: black;text-decoration: none;}a:hover{text-decoration: none;color: black;}</style>
    <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">PhotoAlbum</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/User/logged/<?php echo $user_id; ?>">Profil  <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/Authentication/logout">Logout</a>
          </li>
          <li>
            <div class="box">
    <div class="notifications">
        <i class="fa fa-bell"></i>
        <span class="num">4</span>
        <ul>
            <li class="icon">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Someone Like Your Post</span>
            </li>
            <li class="icon">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Someone Like Your Photo</span>
            </li>
            <li class="icon">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Someone Dislike Your Post</span>
            </li>
            <li class="icon">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Someone Comment on Your Post</span>
            </li>
        </ul>
    </div>
</div>
          </li><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </ul>
        <form action="https://keops-web1.herokuapp.com/User/logged/<?php echo $user_id; ?>" method='POST' enctype="multipart/form-data" class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search" name="search" aria-describedby="basic-addon1">
        </form>
      </div>
    </nav>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <img style="width: 100%;height: auto;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Icon-round-Question_mark.svg/1024px-Icon-round-Question_mark.svg.png">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4" style="text-align: center;margin-top: 50px;">
              <h1><?php echo $name." ".$surname; ?></h1>
              <p class="text-muted">Albüm Sayfanıza Hoşgeldiniz!</p>
              <p><a style="width: 100%;background-color: coral;color: white;border: 0;" href="https://keops-web1.herokuapp.com/User/add_album/<?php echo $user_id; ?>" class="btn my-2">Add Album</a></p>
            </div>
            <div class="col-md-4" style="text-align: center;margin-top: 50px;">
              <p class="text-muted">N süreniz: <?php echo $n_times; ?></p>
              <p class="text-muted">Fotoğraflar isteğiniz üzerine belli bir süre sonra silinir. Bu süreyi değiştirebilirsiniz. </p>
              <form action="https://keops-web1.herokuapp.com/User/N/<?php echo $user_id; ?>" method='POST' enctype="multipart/form-data" style="text-align: center;">
                <input type="text" name="N" class="form-control" placeholder="Gün giriniz" aria-describedby="basic-addon1" required >
              </form>
            </div>
          </div>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php foreach ($albums as $album ){ ?>
            <div class="col-md-4">
              <a href="https://keops-web1.herokuapp.com/User/detail_album/<?php echo $album["album_id"]; ?>"><div class="card mb-4 shadow-sm">
                <img class="card-img-top" data-src="<?php echo $album["one_photo"]["photo_url"]; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="<?php echo $album["one_photo"]["photo_url"]; ?>" data-holder-rendered="true">
                <div class="card-body" style="text-align: center;">
                  <p class="card-text"><?php echo $album["name"]; ?></p>        
                  <small class="text-muted">Created at: <?php echo $album["album_date"]; ?></small>
                </div>
              </div></a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </main>
<svg xmlns="http://www.w3.org/2000/svg" width="347" height="225" viewBox="0 0 347 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
</html>