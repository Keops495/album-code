<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/login.css">
  </head>
  <body id="LoginForm">
  <div class="container">
    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Admin Login</h2>
          <p>Please enter your email and password</p>
        </div>
        <form action="https://keops-web1.herokuapp.com/Authentication/log" method='POST' enctype="multipart/form-data" style="text-align: left;">
                                              <input type="text" name="Username" class="form-control" placeholder="Adet Sayısını Giriniz" aria-describedby="basic-addon1" required >
                                              <input type="password" name="Password" class="form-control" placeholder="Adet Sayısını Giriniz" aria-describedby="basic-addon1" required >   
                                            <input type="submit" name="Sepet" value="Sepete Ekle" class="button" style="padding: 3px 6px; font-size: 30px;">
                                            </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
