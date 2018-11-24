<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>
<body>


    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Add Photograph</h1>
        </div>
      </section>
      <div class="album py-5 bg-light" style="text-align: center;">
        <div class="container">

          <div class="row">
            <form action="https://keops-web1.herokuapp.com/User/create_photo/<?php echo $album_id; ?>" method='POST' enctype="multipart/form-data" style="text-align: center; margin-left: 36%;">
              <input type="text" name="Url" class="form-control" placeholder="Enter photo url" aria-describedby="basic-addon1" required style="margin-left: 25%; text-align: center;">
              <input type="text" name="Key" class="form-control" placeholder="Enter photo key" aria-describedby="basic-addon1" required style="margin-left: 25%; text-align: center;">
              
              <div class="file-field">
                  
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload your file" name="file">
                  </div>
              </div>
   
              <input type="submit" name="Sepet" value="Add" class="button" style="padding: 3px 6px; font-size: 15px; margin-left: 50%;">
          </form>
          </div>
        </div>
      </div>

    </main>
<svg xmlns="http://www.w3.org/2000/svg" width="347" height="225" viewBox="0 0 347 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
</html>