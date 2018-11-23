<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/login.css">
  </head>
  <body id="LoginForm"><style>a{color: black;text-decoration: none;}a:hover{text-decoration: none;color: black;}</style>
  <div class="container">
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Admin Login</h2>
          <p>Please enter your email and password</p>
        </div>
        <form action="https://keops-web1.herokuapp.com/Authentication/log" method='POST' enctype="multipart/form-data" style="text-align: center;">
          <input type="text" name="Username" class="form-control" placeholder="Enter username" aria-describedby="basic-addon1" required >
          <input style="margin-top: 10px;" type="password" name="Password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon1" required >   
          <input type="submit" name="Sepet" value="Login" class="button" style="padding: 3px 6px; font-size: 20px;width: 100%;margin-top: 10px;background-color: coral;color: white;border: 0;">
        </form>
        <a class="text-muted" href="https://keops-web1.herokuapp.com/User/signup">Üye değilseniz hemen üye olun!</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
