<!DOCTYPE html>
<html>
<head>
  
    <title>Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading"><?php echo $album["name"]; ?></h1>
          <p class="lead text-muted">Take a look at my photographs</p>
          <p>
             <a href="https://keops-web1.herokuapp.com/User/add_album/<?php echo $user_id; ?>" class="btn btn-primary my-2">Add Photograph</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php foreach ($photos as $photo ){ ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" data-src="<?php echo $photo["photo_url"]; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="<?php echo $photo["photo_url"]; ?>" data-holder-rendered="true">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <form action="https://keops-web1.herokuapp.com/User/delete_photo/<?php echo $photo["photo_id"]; ?>">
                        <input type="submit" value="Delete" />
                      </form>
        
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
</html>