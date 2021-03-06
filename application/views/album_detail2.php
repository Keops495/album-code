<!DOCTYPE html>
<html>
<head>
  
    <title>Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
          <li class="nav-item active">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/User/all">Album <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/Authentication/out">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://keops-web1.herokuapp.com/Share/messages/<?php echo $user_id; ?>"><i class="fas fa-bell"></i></a>
          </li>
        </ul>
        <form action="https://keops-web1.herokuapp.com/User/search_key/<?php echo $album_id; ?>" method='POST' enctype="multipart/form-data" class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search" name="Key" aria-describedby="basic-addon1">
        </form>
      </div>
    </nav>
    </header>

    <main role="main">
      <style>a{color: black;text-decoration: none;}a:hover{text-decoration: none;color: black;}</style>
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading"><?php echo $album["name"]; ?></h1>
          <p class="lead text-muted">Take a look at my photographs</p>
          <p>
             <a href="https://keops-web1.herokuapp.com/User/add_photo/<?php echo $album_id; ?>" class="btn btn-primary my-2">Add Photograph</a>
             <a href="https://keops-web1.herokuapp.com/User/detail_album/<?php echo $album_id; ?>" class="btn btn-secondary my-2">Show All Photographs</a>
          </p>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php foreach ($photos as $photo ){ ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top popphoto" data-src="<?php echo $photo["photo_url"]; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="<?php echo $photo["photo_url"]; ?>" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text"><?php echo $photo["key"]["thekey"]; ?></p>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="https://keops-web1.herokuapp.com/Like/likes/<?php echo $user_id; ?>/<?php echo $photo["photo_id"]; ?>"><span><?php echo count($photo["likes"]); ?></span></a>
                      <a href="https://keops-web1.herokuapp.com/Like/send/<?php echo $user_id; ?>/<?php echo $photo["photo_id"]; ?>"><i style="color: red;" class="fas fa-heart"></i></a>
                    </div>
                    <small class="text-muted">Added at: <?php echo $photo["photo_date"]; ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </main>
<svg xmlns="http://www.w3.org/2000/svg" width="347" height="225" viewBox="0 0 347 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
</script>
</html>