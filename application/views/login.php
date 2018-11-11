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
        <form action="https://www.keops-web1.herokuapp.com/Authentication" method='post' enctype="multipart/form-data">
          <div class="form-group">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>
          <input type="Submit" class= "btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
